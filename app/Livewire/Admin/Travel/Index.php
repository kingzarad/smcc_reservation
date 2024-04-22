<?php

namespace App\Livewire\Admin\Travel;

use App\Models\User;
use Livewire\Component;
use App\Models\TravelOrder;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class Index extends Component
{
    public $id;

    public function render()
    {
        $travelPendingList = TravelOrder::where('status', '1')->get();
        return view('livewire..admin.travel.index', ['travelPendingList' => $travelPendingList]);
    }

    public function travelID($id)
    {
        $this->id = $id;
    }

    public function travelApproved()
    {
        $travelOrder = TravelOrder::findOrFail($this->id);
        $travel = TravelOrder::where(['id' => $this->id])->first();
        if ($travelOrder) {

            $users = User::where('id', $travel->user_id)->first();


            $link = route('myaccount.travel');
            $details = [
                'greeting' => "Travel Order Approved",
                'body' => "Username: $users->username. .",
                'lastline' => '',
                'regards' => "Visit here: $link"
            ];
            $travelOrder->update(['status' => 0]);

            Notification::send($users, new CustomerNotification($details));

            $this->dispatch('destroyModal', status: 'success', position: 'top', message: 'Travel Order approved successfully.', modal: '#travelAModal');
        }
    }

    public function travelDeclined()
    {
        $travelOrder = TravelOrder::findOrFail($this->id);
        $travel = TravelOrder::where(['id' => $this->id])->first();
        if ($travelOrder) {

            $users = User::where('id', $travel->user_id)->first();


            $link = route('myaccount.travel');
            $details = [
                'greeting' => "Travel Order Cancelled",
                'body' => "Username: $users->username. .",
                'lastline' => '',
                'regards' => "Visit here: $link"
            ];
            $travelOrder->update(['status' => 2]);

            Notification::send($users, new CustomerNotification($details));

            $this->dispatch('destroyModal', status: 'warning', position: 'top', message: 'Travel Order declined successfully.', modal: '#travelDModal');
        }
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }
}
