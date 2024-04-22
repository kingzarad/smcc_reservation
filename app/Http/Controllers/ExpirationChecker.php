<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\ReservationItem;
use Carbon\Carbon;
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;

class ExpirationChecker extends Controller
{
    public  $reservation_id;

    public function checkReservation()
    {
        $items = ReservationItem::get();
        $currentDate = Carbon::now();
        $currentTime = Carbon::now()->second(0);

        foreach ($items as $item) {
            $reserv = Reservation::where('id', $item->reservation_id)->first();
            $scheduleDate = Carbon::parse($reserv->date_return);
            $scheduleTime = Carbon::parse($reserv->time_return)->second(0);


            if ($currentDate->isSameDay($scheduleDate) &&  $reserv->status == 1 && $currentTime->gte($scheduleTime)) {

                $users = User::where('id', $reserv->users_id)->first();

                $product = Product::findOrFail($item->product_id);
                $existingQuantity = $product->quantity;

                $newQuantity = $existingQuantity + $item->quantity;


                if ($existingQuantity == 0) {
                    $product->update(['product_status' => 0]);
                }
                $product->update(['quantity' => max(0, $newQuantity)]);

                $reservation = Reservation::findOrFail($item->reservation_id);

                $reservation->update([
                    'status' => 3,
                ]);

                $link = route('place_reservation', ['reference' => $reserv->reference_num]);
                $details = [
                    'greeting' => "Reservation Completed",
                    'body' => "REFERENCE NUMBER: <strong>$reserv->reference_num</strong> <br>
                    The reservation has been successfully completed. Thank you for choosing us! <br> If you have any questions, feel free to contact us. <br> We look forward to serving you again.",
                    'lastline' => '',
                    'regards' => "Visit: $link"
                ];

                Notification::send($users, new CustomerNotification($details));
            }
        }
    }
}
