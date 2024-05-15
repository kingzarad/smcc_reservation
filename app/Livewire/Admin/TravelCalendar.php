<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Vehicle;
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


            if (!is_null($event->vehicle)) {
                $vehicleString = '';
                $vehicleCount = 0;

                foreach ($event->vehicle as $value) {

                    $vehicle = Vehicle::find($value->vehicle_id);

                    if ($vehicle) {

                        $itemName = ucfirst($vehicle->name);

                        if (!empty($itemsString)) {
                            $itemsString .= ', ';
                        }

                        $vehicleString .= $itemName;
                        $vehicleCount++;
                        if ($vehicleCount >= 3) {
                            break;
                        }
                    }
                }
                if (count($event->vehicle) > 3) {
                    $vehicleString .= '...';
                }
            }


            $userDetails = UserDetails::where('users_id', $event->user_id)->first();
            $name = ucfirst($userDetails->firstname);
            if (!empty($userDetails->middlename)) {
                $name .= " " . ucfirst($userDetails->middlename);
            }
            $name .= " " . ucfirst($userDetails->lastname);
            return [
                'classNames' => 'a',
                'title' =>  "<div class='text-wrap'>Name:$name <br> Travel Date: $date <br> Travel Time: $time<br> Travel Unit: <strong> $vehicleString</strong></div>",
                'start' => $startDateTime,
                'end' => $endDateTime,


            ];
        })->toArray();
    }
}
