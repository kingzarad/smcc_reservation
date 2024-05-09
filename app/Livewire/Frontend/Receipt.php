<?php

namespace App\Livewire\Frontend;

use App\Models\Item;
use App\Models\Venue;
use Livewire\Component;

class Receipt extends Component
{
    public $details, $users;

    public function mount($details, $users)
    {
        // dd($details);
        $this->details = $details;
        $this->users = $users;
    }
    public function render()
    {

        $itemsString = $this->formatItems();
        $venueString = $this->formatVenues();

        return view('livewire.frontend.receipt', ['venueString' => $venueString, 'itemsString' => $itemsString, 'details' => $this->details, 'users' => $this->users]);
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
                    $venueWithQty = "$venueName ";
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
