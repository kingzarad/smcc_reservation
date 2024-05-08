<?php

namespace App\Livewire\Admin\Reports;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Venue;
use Livewire\Component;
use App\Models\Department;
use App\Models\Reservation;
use App\Models\UserDetails;
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

                    $userDetails = UserDetails::where('users_id', $reservation->users_id)->first();
                    $name = ucfirst($userDetails->firstname);
                    if (!empty($userDetails->middlename)) {
                        $name .= " " . ucfirst($userDetails->middlename);
                    }
                    $name .= " " . ucfirst($userDetails->lastname);

                    $dateFrom = Carbon::parse($reservation->date_from);
                    $dateTo = Carbon::parse($reservation->date_to);

                    $startTime = Carbon::parse($reservation->time_from);
                    $endTime = Carbon::parse($reservation->time_to);

                    // Calculate total hours, minutes, and days
                    $diffInDays = $dateTo->diffInDays($dateFrom) + 1;
                    $diffInMinutesOneDay = $endTime->diffInMinutes($startTime);
                    $totalMinutes = $diffInMinutesOneDay * $diffInDays;
                    $hours = intdiv($totalMinutes, 60);
                    $remainingMinutes = $totalMinutes % 60;
                    // Prepare the output string
                    $output = "$hours hours and $remainingMinutes minutes";


                    $departname = Department::where('id', $reservation->department_id)->first();
                    $reservationData = [
                        'reservation_id' => $reservation->id,
                        'name' => $name,
                        'Items' => "Items: $itemsString",
                        'Venue' => "Venue/Rooms: $venueString",
                        'status' => $reservation->status,
                        'usagetime' => Carbon::parse($reservation->time_from)->format('g:i A') . " - " . Carbon::parse($reservation->time_to)->format('g:i A'),
                        'usagedate' => Carbon::parse($reservation->date_from)->format('F d, Y') . " - " . Carbon::parse($reservation->date_to)->format('F d, Y'),
                        'hours' => $output,
                        'depart' => $reservation->department_id,
                        'departname' => $departname,
                        'date' => Carbon::parse($reservation->date_filled)->format('F d, Y'),
                    ];


                    $reservationsList[$reservation->reference_num] = (object) $reservationData;
                }
            }
        }


        return view('livewire.admin.reports.index', ['department' =>  $department, 'reserv' => $reservationsList]);
    }
}
