<?php

namespace App\Livewire\Admin\TravelOrder;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Department;
use App\Models\TravelOrder;
use App\Models\UserDetails;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Index extends Component
{
    public $date, $time, $details = [], $users = [], $reservation_id, $users_id, $status, $expire_status = false, $image;

    public function render()
    {
        $reservationsList = [];
        $reservationlists = TravelOrder::orderBy('created_at', 'desc')
            ->get();

        foreach ($reservationlists as $reservation) {
            if ($reservation) {
                if (isset($reservationsList[$reservation->reference_num])) {
                    continue;
                }

                //
                $users = UserDetails::where('users_id', $reservation->user_id)->first();


                $departname = Department::where('id', $users->department)->first();
                $name = ucwords($users->firstname . " " . ($users->middlename ?? '') . " " . $users->lastname);

                $reservationData = [
                    'id' => $reservation->id,
                    'departname' => $departname->department_name,
                    'date_filled' => $reservation->created_at,
                    'status' => $reservation->status,

                    'name' =>  $name
                ];


                $reservationsList[$reservation->reference_num] = (object) $reservationData;
            }
        }


        return view('livewire.admin.travel-order.index', ['reservationsList' => $reservationsList]);
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }

    public function showSingle($id)
    {
        $currentDate = Carbon::now();

        $reservation = TravelOrder::where('id', $id)
            ->orderByDesc('id')
            ->first();


        if ($reservation) {

            $users = UserDetails::where('users_id', $reservation->user_id)->first();

            $date = Carbon::parse($reservation->date)->format('F j, Y');
            $time = Carbon::parse($reservation->time)->format('g:i A');

            // dd( $reservation->item);
            $this->reservation_id = $reservation->id;
            $this->users_id = $reservation->user_id;
            $this->details = $reservation;
            $this->date = $date;
            $this->time = $time;
            $this->users = $users;
            $this->image = $reservation->image;
            $this->status = $reservation->status;
        }
    }

    public function cancelReservation()
    {
        $reserv = TravelOrder::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reserv->user_id)->first();

        $reservation = TravelOrder::findOrFail($this->reservation_id);
        $reservation->update([
            'status' => 1,
        ]);

        $details = [
            'greeting' => "Travel Order Cancelled",
            'body' => "The travel order has been cancelled by the administrator. For more information, please visit the office. . <br> Sorry for the inconvenience.",
            'lastline' => '',
            'regards' => ""
        ];

        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Travel order canceleed successfully.', modal: '#showModal');
    }

    public function doneReservation()
    {
        $reservation = TravelOrder::where('id', $this->reservation_id)->first();
        $users = User::where('id', $reservation->user_id)->first();


        $reservation->update([
            'status' => 2,
        ]);

        $details = [
            'greeting' => "Travel Order Completed",
            'body' => "The travel order has been successfully completed. Thank you for choosing us! <br> If you have any questions, feel free to contact us. <br> We look forward to serving you again.",
            'lastline' => '',
            'regards' => ""
        ];
        Notification::send($users, new CustomerNotification($details));

        $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Travel order mark as done successfully.', modal: '#showModal');
    }
}
