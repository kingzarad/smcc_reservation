<?php

namespace App\Livewire\Admin\Reservation;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\UserDetails;
use App\Models\ReservationItem;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class History extends Component
{
    public $item = [], $details = [], $users = [], $itemCount, $reservation_id, $referenceNumber, $status, $expire_status = false;

    public function render()
    {
        $reservationlists = Reservation::where('status', '!=', 0)->get();
        return view('livewire.admin.reservation.history', ['reservationlists' => $reservationlists]);
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }

    public function showSingle($id)
    {
        $currentDate = Carbon::now();

        $reservation = Reservation::where('id', $id)
            ->orderByDesc('id')
            ->first();


        if ($reservation) {
            $returnDate = Carbon::parse($reservation->date_from);

            $reference = $reservation->reference_num;
            $referenceNumber = substr($reference, 7);

            $users = UserDetails::where('users_id', $reservation->users_id)->first();
            $item = ReservationItem::where('reservation_id', $reservation->id)->get();
            $itemCount = ReservationItem::where('reservation_id', $reservation->id)->count();

            if ($currentDate->isSameDay($returnDate)) {
                $this->expire_status = true;
            }

            $this->reservation_id = $reservation->id;
            $this->details = $reservation;
            $this->item = $item;
            $this->users = $users;
            $this->itemCount = $itemCount;
            $this->referenceNumber = $referenceNumber;
            $this->status = $reservation->status;
        }
    }

    public function cancelReservation()
    {
        $items = ReservationItem::where('reservation_id', $this->reservation_id)->get();
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->users_id)->first();

        foreach ($items as $item) {

            $product = Product::findOrFail($item->product_id);
            $existingQuantity = $product->quantity;

            $newQuantity = $existingQuantity + $item->quantity;


            if ($existingQuantity == 0) {
                $product->update(['product_status' => 0]);
            }
            $product->update(['quantity' => max(0, $newQuantity)]);

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
        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Reservation canceleed successfully.', modal: '#showHistory');
    }
}
