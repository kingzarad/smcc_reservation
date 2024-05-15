<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\UserDetails;

class Calendar extends Component
{
    public $date_from, $date_to, $events;

    public function mount()
    {
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = Reservation::where('status', 1)->get()->map(function ($event) {


            $startDateTime = Carbon::parse($event->date_from)->format('Y-m-d');
            $endDateTime = Carbon::parse($event->date_to)->format('Y-m-d');

            $startDate = Carbon::parse($event->date_from)->format('F j, Y');
            $endDate = Carbon::parse($event->date_to)->format('F j, Y');
            $startTime = Carbon::parse($event->time_from)->format('g:i A');
            $endTime = Carbon::parse($event->time_to)->format('g:i A');

            if (!is_null($event->item)) {
                $itemsString = '';
                $itemCount = 0;

                foreach ($event->item as $value) {
                    $item = Item::find($value->item_id);

                    if ($item) {
                        $itemName = $item->name;

                        if (!empty($itemsString)) {
                            $itemsString .= ', ';
                        }

                        $itemsString .= $itemName;
                        $itemCount++;
                        if ($itemCount >= 3) {
                            break;
                        }
                    }
                }
                if (count($event->item) > 3) {
                    $itemsString .= '...';
                }
            }

            if (!is_null($event->venue)) {
                $venueString = '';
                $venueCount = 0;

                foreach ($event->venue as $value) {
                    $venue = Venue::find($value->venue_id);

                    if ($venue) {
                        $venueName = $venue->name;

                        if (!empty($venueString)) {
                            $venueString .= ', ';
                        }

                        $venueString .= $venueName;
                        $venueCount++;
                        if ($venueCount >= 3) {
                            break;
                        }
                    }
                }

                if (count($event->venue) > 3) {
                    $venueString .= '...';
                }
            }


            $userDetails = UserDetails::where('users_id', $event->users_id)->first();
            $name = ucfirst($userDetails->firstname);
            if (!empty($userDetails->middlename)) {
                $name .= " " . ucfirst($userDetails->middlename);
            }
            $name .= " " . ucfirst($userDetails->lastname);
            return [
                'classNames' => 'a',
                'title' =>  "<div class=' text-wrap'>Reserved By: $name <br>Venue/Rooms: <strong>$venueString</strong> <br>Item: <strong>$itemsString</strong> <br>Date: $startDate - $endDate <br>Time: $startTime - $endTime</div>",
                'start' => $startDateTime,
                'end' => $endDateTime,


            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.admin.calendar');
    }
}
