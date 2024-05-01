<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Venue;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationItem;
use App\Models\ReservationVenue;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class ExpirationChecker extends Controller
{
    public  $reservation_id;

    public function checkReservation()
    {

        $reservation = Reservation::all();
        $currentDate = Carbon::now();
        $currentTime = Carbon::now()->second(0);

        foreach ($reservation as $value) {
            $items = ReservationItem::where('reservation_id', $value->id)->get();
            $venues = ReservationVenue::where('reservation_id', $value->id)->get();

            $scheduleDate = Carbon::parse($value->date_return);
            $scheduleTime = Carbon::parse($value->time_return)->second(0);

            if ($currentDate->isSameDay($scheduleDate) &&  $value->status == 1 && $currentTime->gte($scheduleTime)) {
                $users = User::where('id', $value->users_id)->first();

                foreach ($items as $item) {
                    $item_list = Item::findOrFail($item->item_id);
                    $existingQuantity = $item_list->quantity;

                    $newQuantity = $existingQuantity + $item->quantity;

                    if ($newQuantity <= 0) {
                        $item_list->update(['status' => 0]);
                    }
                    $item_list->update(['quantity' => max(0, $newQuantity)]);
                }

                foreach ($venues as $venue) {

                    $venue_list = Venue::findOrFail($venue->venue_id);
                    $existingQuantity = $venue_list->quantity;

                    $newQuantity = $existingQuantity + $venue->quantity;


                    if ($newQuantity <= 0) {
                        $venue_list->update(['status' => 0]);
                    }
                    $venue_list->update(['quantity' => max(0, $newQuantity)]);
                }

                $reservation = Reservation::findOrFail($item->reservation_id);
                $reservation->update([
                    'status' => 3,
                ]);

                $link = route('place_reservation', ['reference' => $value->reference_num]);
                $details = [
                    'greeting' => "Reservation Completed",
                    'body' => "REFERENCE NUMBER: <strong>$value->reference_num</strong> <br>
                            The reservation has been successfully completed. Thank you for choosing us! <br> If you have any questions, feel free to contact us. <br> We look forward to serving you again.",
                    'lastline' => '',
                    'regards' => "Visit: $link"
                ];

                Notification::send($users, new CustomerNotification($details));
            }
        }
    }
}
