<?php

namespace App\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\ReservationItem;

class Index extends Component
{


    public function render()
    {
        $reservations = ReservationItem::get();
        $reservationsList = [];

        foreach ($reservations as $reservationItem) {
            // Retrieve the corresponding reservation for each reservation item
            $reservation = Reservation::find($reservationItem->reservation_id);

            // If a reservation is found, create a new object and add it to the list
            if ($reservation) {
                $reservationData = [
                    'reservation_id' => $reservation->id,
                    'reference_num' => $reservation->reference_num,
                    'product_name' => $reservationItem->product->name,
                    'status' => $reservation->status,
                    'date' => $reservation->date_filled,
                ];


                $reservationsList[] = (object) $reservationData;
            }
        }


        return view('livewire.admin.reports.index', ['reserv' => $reservationsList]);
    }
}
