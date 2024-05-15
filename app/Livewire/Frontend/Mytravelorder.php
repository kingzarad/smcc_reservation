<?php

namespace App\Livewire\Frontend;

use Carbon\Carbon;
use App\Models\Vehicle;
use Livewire\Component;
use App\Models\TravelOrder;

class Mytravelorder extends Component
{
    public function render()
    {
        // $travel = TravelOrder::where('status', 0)->get();
        $travel = TravelOrder::where('user_id', auth()->user()->id)->where('status', 0)
            ->get()
            ->map(function ($event) {


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


                return (object) [
                    'unit' => $vehicleString,
                    'date' =>  $date,
                    'time' =>  $time,
                    'image' => $event->image,
                    'status' => $event->status,
                ];
            });




        return view('livewire.frontend.mytravelorder', ['travel' => $travel]);
    }
}
