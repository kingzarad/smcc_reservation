<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Venue;
use App\Models\Reservation;
use App\Models\UserDetails;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use App\Helpers\ImageConverter;

class PDFController extends Controller
{
    public $content = [];
    public $details, $users;

    public function generatePDF($reference)
    {
        $reservation = Reservation::where('reference_num', 'like', '%' . $reference . '%')
            ->orderByDesc('id')
            ->first();

        if ($reservation) {

            $this->details = $reservation;

            $itemsString = $this->formatItems();
            $venueString = $this->formatVenues();

            $users = UserDetails::where('users_id', $reservation->users_id)->first();
            $signature =  ImageConverter::toBase64Dynamic($reservation->signature);
            $logo =  ImageConverter::toBase64Local('assets/images/smcc-logo.png');

            $this->content = [
                'itemsString' =>  $itemsString,
                'venueString' =>  $venueString,
                'logo' => $logo,
                'signature' => $signature,
                'users' =>  $users,
                'details' => $reservation
            ];
        }


        // $pdf = Pdf::loadView('permit.layout', $this->content);
        // return $pdf->download('invoice.pdf');

        $pdf = App::make('dompdf.wrapper');
        // $htmlContent = view('permit.layout', $this->content)->render();

        $htmlContent = view('permit.layout')->render();
         $pdf->loadHTML($htmlContent);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    private function formatItems()
    {
        $itemsString = '';
        if (!is_null($this->details->item)) {
            foreach ($this->details->item as $value) {
                $item = Item::find($value->item_id);
                if ($item) {
                    $itemName = $item->name;
                    $qty = $value->quantity;
                    $itemWithQty = "$itemName   [$qty]";
                    if (!empty($itemsString)) {
                        $itemsString .= ', ';
                    }
                    $itemsString .= $itemWithQty;
                }
            }
        }
        return $itemsString;
    }

    private function formatVenues()
    {
        $venueString = '';
        if (!is_null($this->details->venue)) {
            foreach ($this->details->venue as $value) {
                $venue = Venue::find($value->venue_id);
                if ($venue) {
                    $venueName = $venue->name;
                    $qty = $value->quantity;
                    $venueWithQty = "$venueName   [$qty]";
                    if (!empty($venueString)) {
                        $venueString .= ', ';
                    }
                    $venueString .= $venueWithQty;
                }
            }
        }
        return $venueString;
    }
}
