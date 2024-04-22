<?php

namespace App\Livewire\Admin\Reservation;

use App\Models\Product;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\UserDetails;
use App\Models\ReservationItem;
use App\Models\User;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Pending extends Component
{
    public $item = [], $details = [], $users = [], $itemCount, $reservation_id;
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
            $this->reservation_id = $reservation->id;
            $this->details = $reservation;
            $this->item = $item;
            $this->users = $users;
            $this->itemCount = $itemCount;
        }
    }

    public function approvedReservation()
    {
        $items = ReservationItem::where('reservation_id', $this->reservation_id)->get();
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->users_id)->first();

        $reference = $reserv->reference_num;
        $referenceNumber = substr($reference, 7);

        // dd($users ->email);
        foreach ($items as $item) {

            $product = Product::findOrFail($item->product_id);
            $existingQuantity = $product->quantity;

            $newQuantity = $existingQuantity - $item->quantity;

            // Check if the new quantity is zero or less
            if ($newQuantity <= 0) {
                $product->update(['product_status' => 1]);
            }
            $product->update(['quantity' => max(0, $newQuantity)]);

            $reservation = Reservation::findOrFail($item->reservation_id);

            $reservation->update([
                'status' => 1,
            ]);
        }

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
