<?php

namespace App\Livewire\Admin\Reservation;

use App\Models\Item;
use App\Models\User;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\UserDetails;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Pending extends Component
{

    public $item = [], $details = [], $users = [], $itemCount, $reservation_id, $image;
    public $venue_list = [];
    public $item_list = [];

    public function render()
    {
        $reservationlists = Reservation::where('status', 0)->get();

        return view('livewire.admin.reservation.pending', ['reservationlists' => $reservationlists]);
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }

    public function showSingle($id)
    {
        $reservation = Reservation::where('id', $id)
            ->orderByDesc('id')
            ->first();


        if ($reservation) {

            $users = UserDetails::where('users_id', $reservation->users_id)->first();
            $item = ReservationItem::where('reservation_id', $reservation->id)->get();
            $itemCount = ReservationItem::where('reservation_id', $reservation->id)->count();

            $items = ReservationItem::where('reservation_id', $reservation->id)->get();
            $venue = ReservationVenue::where('reservation_id', $reservation->id)->get();

            $this->venue_list = $venue;
            $this->item_list = $items;


            $this->reservation_id = $reservation->id;
            $this->details = $reservation;
            $this->item = $item;
            $this->users = $users;
            $this->image = $reservation->signature;
            $this->itemCount = $itemCount;
        }
    }

    public function approvedReservation()
    {
        $items = ReservationItem::where('reservation_id', $this->reservation_id)->get();
        $venues = ReservationVenue::where('reservation_id', $this->reservation_id)->get();
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->users_id)->first();

        $reference = $reserv->reference_num;
        $referenceNumber = substr($reference, 7);


        foreach ($items as $item) {

            $item_list = Item::findOrFail($item->item_id);
            $existingQuantity = $item_list->quantity;

            $newQuantity = $existingQuantity - $item->quantity;


            if ($newQuantity <= 0) {
                $item_list->update(['status' => 1]);
            }
            $item_list->update(['quantity' => max(0, $newQuantity)]);
        }

        foreach ($venues as $venue) {

            $venue_list = Venue::findOrFail($venue->venue_id);
            $existingQuantity = $venue_list->quantity;

            $newQuantity = $existingQuantity - $venue->quantity;

            if ($newQuantity <= 0) {
                $venue_list->update(['status' => 1]);
            }
            $venue_list->update(['quantity' => max(0, $newQuantity)]);
        }


        $reservation = Reservation::findOrFail($this->reservation_id);
        $reservation->update([
            'status' => 1,
        ]);

        $link = route('place_reservation', ['reference' => $reserv->reference_num]);
        $details = [
            'greeting' => "Congratulation🎊",
            'body' => "REFERENCE NUMBER: <strong>$reserv->reference_num</strong> <br>
             The reservation has been successfully approved. Here is your verification code: <strong>$referenceNumber </strong>
            <br> Thank You!",
            'lastline' => '',
            'regards' => "Visit for information: $link"
        ];
        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Reservation approved successfully.', modal: '#showPending');
    }

    public function cancelReservation()
    {
        $items = ReservationItem::where('reservation_id', $this->reservation_id)->get();
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->users_id)->first();

        foreach ($items as $item) {
            $reservation = Reservation::findOrFail($item->reservation_id);

            $reservation->update([
                'status' => 2,
            ]);
        }

        $link = route('place_reservation', ['reference' => $reserv->reference_num]);
        $details = [
            'greeting' => "Reservation Cancelled",
            'body' => "REFERENCE NUMBER: <strong>$reserv->reference_num</strong> <br>
            The reservation has been cancelled by the administrator. For more information, please visit the office. . <br> Sorry for the inconvenience.",
            'lastline' => '',
            'regards' => "Visit: $link"
        ];

        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Reservation canceleed successfully.', modal: '#showPending');
    }
}
