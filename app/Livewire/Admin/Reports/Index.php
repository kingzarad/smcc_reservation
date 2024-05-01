<?php

namespace App\Livewire\Admin\Reports;

use App\Models\Department;
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

        $department = Department::get();


        foreach ($reservations as $reservation) {
            // Retrieve the corresponding reservation for each reservation item

            if ($reservation) {
                if ($reservation->status != 0) {

                    if (isset($reservationsList[$reservation->reference_num])) {
                        continue; // Skip this one as its reference number is already processed
                    }

                    $itemsString = '';

                    if (!is_null($reservation->item)) {
                        foreach ($reservation->item as $value) {
                            $item = Item::find($value->item_id);
                            if ($item) {
                                $itemName = $item->name;
                                $qty = $value->quantity;
                                $itemWithQty = "$itemName   [$qty]";
                                if (!empty($itemsString)) {
                                    $itemsString .= ', ';
                                }
                                $itemsString .= $itemWithQty;
                            }
                        }
                    }

                    $venueString = '';
                    if (!is_null($reservation->venue)) {
                        foreach ($reservation->venue as $value) {
                            $venue = Venue::find($value->venue_id);
                            if ($venue) {
                                $venueName = $venue->name;
                                $qty = $value->quantity;
                                $venueWithQty = "$venueName   [$qty]";
                                if (!empty($venueString)) {
                                    $venueString .= ', ';
                                }
                                $venueString .= $venueWithQty;
                            }
                        }
                    }
                    $startTime = Carbon::parse($reservation->time_from);
                    $endTime = Carbon::parse($reservation->time_to);

                    // Calculate total hours and minutes
                    $diff = $endTime->diff($startTime);
                    $totalHours = $diff->h;
                    $remainingMinutes = $diff->i;

                    // Prepare the output string
                    $output = "";

                    if ($totalHours > 0 || $remainingMinutes > 0) {
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
                    } else {
                        $output = "No time.";
                    }


                    $reservationData = [
                        'reservation_id' => $reservation->id,
                        'reference_num' => $reservation->reference_num,
                        'name' => "Items: $itemsString, Venue/Rooms: $venueString",
                        'status' => $reservation->status,
                        'qty' => $output,
                        'depart' => $reservation->department_id,
                        'date' => Carbon::parse($reservation->date_filled)->format('F d, Y'),
                    ];


                    $reservationsList[$reservation->reference_num] = (object) $reservationData;
                }
            }
        }


        return view('livewire.admin.reports.index', ['department' =>  $department, 'reserv' => $reservationsList]);
    }
}
