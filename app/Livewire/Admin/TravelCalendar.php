<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TravelOrder;
use App\Models\UserDetails;

class TravelCalendar extends Component
{
    public  $events;

    public function mount()
    {
        $this->loadEvents();
    }


    public function render()
    {
        return view('livewire.admin.travel-calendar');
    }

    public function loadEvents()
    {
        $this->events = TravelOrder::where('status', 0)->get()->map(function ($event) {


            $startDateTime = Carbon::parse($event->date)->format('Y-m-d');
            $endDateTime = Carbon::parse($event->date)->format('Y-m-d');

            $date = Carbon::parse($event->date)->format('F j, Y');
            $time = Carbon::parse($event->time)->format('g:i A');



            $userDetails = UserDetails::where('users_id', $event->user_id)->first();
            $name = ucfirst($userDetails->firstname);
            if (!empty($userDetails->middlename)) {
                $name .= " " . ucfirst($userDetails->middlename);
            }
            $name .= " " . ucfirst($userDetails->lastname);
            return [
                'classNames' => 'a',
                'title' =>  "<div class='text-wrap'>Name:$name <br> Travel Date: $date <br> Travel Time: $time</div>",
                'start' => $startDateTime,
                'end' => $endDateTime,


            ];
        })->toArray();
    }
}
