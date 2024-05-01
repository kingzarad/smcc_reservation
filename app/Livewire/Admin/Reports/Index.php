<?php

namespace App\Livewire\Admin\Reports;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\ReservationItem;

class Index extends Component
{

    public $filter_month;
    public $filter_year = [];
    public $filter_status;

    public function mount()
    {


        $reservations = Reservation::all();

        // Extract years from dates
        $years = $reservations->map(function ($reservation) {
            return Carbon::parse($reservation->date_filled)->year;
        });

        // Determine the minimum and maximum years
        $minYear = $years->min();
        $maxYear = $years->max();

        // Generate range of available years
        $this->filter_year = range($minYear, $maxYear);
    }

    public function render()
    {
        $reservations = Reservation::where('status', 3)->get();
        $reservationsList = [];

        foreach ($reservations as $reservation) {
            // Retrieve the corresponding reservation for each reservation item

            if ($reservation) {
                if ($reservation->status != 0) {

                    if (isset($reservationsList[$reservation->reference_num])) {
                        continue; // Skip this one as its reference number is already processed
                    }

                    $itemsString = '';
                    $itemCount = 0;

                    if (!is_null($reservation->item)) {
                        foreach ($reservation->item as $value) {
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

                        if (count($reservation->item) > 3) {
                            $itemsString .= '...';
                        }
                    }

                    $venueString = '';
                    $venueCount = 0;

                    if (!is_null($reservation->venue)) {
                        foreach ($reservation->venue as $value) {
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

                        if (count($reservation->venue) > 3) {
                            $venueString .= '...';
                        }
                    }

                    $startTime = Carbon::createFromTimeString('08:00:00');
                    $endTime = Carbon::createFromTimeString('11:00:00');
                    // Calculate total hours and minutes
                    $totalHours = intval($endTime->diffInHours($startTime));
                    $remainingMinutes = $endTime->diffInMinutes($startTime) % 60;

                    // Prepare the output string
                    $output = "The total time difference is ";
                    if ($totalHours > 0) {
                        $output .= $totalHours . " hour" . ($totalHours > 1 ? "s" : "");
                    }
                    if ($remainingMinutes > 0) {
                        if ($totalHours > 0) {
                            $output .= " and ";
                        }
                        $output .= $remainingMinutes . " minute" . ($remainingMinutes > 1 ? "s" : "");
                    }
                    $output .= ".";

                    $reservationData = [
                        'reservation_id' => $reservation->id,
                        'reference_num' => $reservation->reference_num,
                        'name' => "Items: $itemsString, Venue/Rooms: $venueString",
                        'status' => $reservation->status,
                        'qty' => $output,
                        'date' => Carbon::parse($reservation->date_filled)->format('F d, Y'),
                    ];


                    $reservationsList[$reservation->reference_num] = (object) $reservationData;
                }
            }
        }


        return view('livewire.admin.reports.index', ['reserv' => $reservationsList]);
    }
}
