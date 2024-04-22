<?php

namespace App\Livewire\Frontend\ReservationProcess;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ReservationItem;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Thankyou extends Component
{
    public $reservation_id, $expire_status = false;
    public $details;

    public function mount($details)
    {
        $currentDate = Carbon::now();

        if ($details) {
            $this->details =  $details;

            $returnDate = Carbon::parse($this->details->date_from);
            $this->reservation_id = $this->details->id;

            if ($currentDate->isSameDay($returnDate)) {
                $this->expire_status = true;
            }
        }
    }

    public function render()
    {

        return view('livewire.frontend.reservation-process.thankyou', ['expire_status'=> $this->expire_status]);
    }


    public function cancelReservation()
    {

        $items = ReservationItem::where('reservation_id', $this->reservation_id)->get();
        $reserv = Reservation::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->users_id)->first();
        $admin = User::where('role_as', 1)->first();

        foreach ($items as $item) {
            $reservation = Reservation::findOrFail($item->reservation_id);

            $reservation->update([
                'status' => 2,
            ]);
        }

        $link = route('reservation.pending');
        $details = [
            'greeting' => "Reservation Cancelled",
            'body' => "REFERENCE NUMBER: <strong>$reserv->reference_num</strong> <br>
            The reservation has been cancelled by the $users->username. .",
            'lastline' => '',
            'regards' => "Login to admin panel now?: $link"
        ];

        Notification::send($admin, new CustomerNotification($details));
        $this->dispatch('messageModal', status: 'success', position: 'top', message: 'Reservation canceleed successfully.');
        return redirect()->route('place_reservation', ['reference' => $reserv->reference_num]);
    }
}
