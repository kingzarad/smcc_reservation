<?php

namespace App\Livewire\Frontend\ReservationProcess;

use Livewire\Component;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Thankyou1 extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $reservationID;

    public function mount($reservationID)
    {

        $this->reservationID = $reservationID;
    }
    public function render()
    {
        $item = ReservationItem::where('reservation_id', $this->reservationID)->paginate(5, pageName: 'Item-page');
        $venue = ReservationVenue::where('reservation_id', $this->reservationID)->paginate(5, pageName: 'Venue-page');
        return view('livewire.frontend.reservation-process.thankyou1', ['item'=>$item, 'venue'=>$venue]);
    }
}
