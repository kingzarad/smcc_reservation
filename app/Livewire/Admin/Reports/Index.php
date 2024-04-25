<?php

namespace App\Livewire\Admin\Reports;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ReservationItem;

class Index extends Component
{

    public $filter_month;
    public $filter_year = [];
    public $filter_status;

    public function mount()
    {


        $reservations = Reservation::all();

        // Extract years from dates
        $years = $reservations->map(function ($reservation) {
            return Carbon::parse($reservation->date_filled)->year;
        });

        // Determine the minimum and maximum years
        $minYear = $years->min();
        $maxYear = $years->max();

        // Generate range of available years
        $this->filter_year = range($minYear, $maxYear);
    }

    public function render()
    {
        $reservations = ReservationItem::get();
        $reservationsList = [];

        foreach ($reservations as $reservationItem) {
            // Retrieve the corresponding reservation for each reservation item
            $reservation = Reservation::find($reservationItem->reservation_id);

            if ($reservation) {
                if($reservation->status != 0){
                    $reservationData = [
                        'reservation_id' => $reservation->id,
                        'reference_num' => $reservation->reference_num,
                        'product_name' => $reservationItem->product->name,
                        'status' => $reservation->status,
                        'qty' => $reservationItem->quantity,
                        'date' => Carbon::parse($reservation->date_filled)->format('F d, Y'),
                    ];


                    $reservationsList[] = (object) $reservationData;
                }
            }
        }


        return view('livewire.admin.reports.index', ['reserv' => $reservationsList]);
    }
}
