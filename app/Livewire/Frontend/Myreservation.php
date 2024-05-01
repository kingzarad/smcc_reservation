<?php

namespace App\Livewire\Frontend;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Reservation;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Myreservation extends Component
{
    use WithPagination, WithoutUrlPagination;

    public function render()
    {
        $reserv = Reservation::where('users_id', auth()->user()->id)->where('status', 1)
            ->get()
            ->map(function ($event) {
                $startDate = Carbon::parse($event->date_from)->format('F j, Y');
                $endDate = Carbon::parse($event->date_to)->format('F j, Y');
                $startTime = Carbon::parse($event->time_from)->format('g:i A');
                $endTime = Carbon::parse($event->time_to)->format('g:i A');

                $itemsString = '';
                $itemCount = 0;

                if (!is_null($event->item)) {
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

                $venueString = '';
                $venueCount = 0;

                if (!is_null($event->venue)) {
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

                return (object) [
                    'venue' => "Venue/Rooms: $venueString",
                    'item' => "Item: $itemsString",
                    'date' => "Date: $startDate - $endDate",
                    'time' => "Time: $startTime - $endTime",
                    'ref' => $event->reference_num,
                    'status' => $event->status,
                ];
            });


        return view('livewire.frontend.myreservation', ['reserv' => $reserv]);
    }
}
