<?php

namespace App\Livewire\Frontend;

use App\Models\TravelOrder;
use App\Models\User;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\UserDetails;
use Livewire\WithFileUploads;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class TravelProcess extends Component
{
    use WithFileUploads;

    public $date, $time, $vehicle_id, $upload;

    public function render()
    {
        $users = UserDetails::where('users_id', auth()->user()->id)->first();
        $vehicle = Vehicle::all();
        return view('livewire.frontend.travel-process', ['users' => $users, 'vehicle' => $vehicle]);
    }

    public function goBack()
    {
        return redirect()->route('travel');
    }

    public function processReserv()
    {
        $this->validate([
            'date' => 'required|date',
            'time' => 'required',
            'vehicle_id' => 'required',
            'upload' => 'required|image'

        ], [
            'date.required' => 'The date  field is required.',
            'time.required' => 'The time  field is required.',
            'vehicle_id.required' => 'The vehicle field is required.',
            'upload.required' => 'The upload field is required.',
        ]);

        $data = [
            'date' =>  $this->date,
            'time' => $this->time,
            'user_id' =>  auth()->user()->idt,
            'image' =>  $this->upload,
        ];
        $reserv = TravelOrder::create($data);

        $users = User::where('id', auth()->user()->id)->first();

        $link = route('permit.download', );
        $details = [
            'greeting' => "Congratulation🎊",
            'body' => "
             The travel order has been successfully approved.
            <br> Thank You!",
            'lastline' => '',
            'regards' => "Visit Link: $link"
        ];
        Notification::send($users, new CustomerNotification($details));
        $this->dispatch('messageModal', status: 'success',  position: 'top', message: 'The reservation was successfully placed. Please wait for the administrators confirmation via email.');

    }
}
