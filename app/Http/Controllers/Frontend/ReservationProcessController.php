<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Reservation;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReservationItem;
use Illuminate\Support\Facades\Auth;

class ReservationProcessController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cartItemCount = Cart::where('user_id', Auth::id())->count();

        if ($cartItemCount > 0) {
            return view('frontend.reservation_process.index');
        } else {
            // Redirect to home if cart is empty
            return redirect()->route('collection');
        }
    }


    public function thankyou(Request $request, $reference)
    {

        if (!empty($reference) || $reference != "") {

            $reservation = Reservation::where('reference_num', 'like', '%' . $reference . '%')
                ->orderByDesc('id')
                ->first();


            if ($reservation) {
                $reference = $reservation->reference_num;
                $referenceNumber = substr($reference, 7);

                // dd($referenceNumber);
                $users = UserDetails::where('users_id', $reservation->users_id)->first();
                $item = ReservationItem::where('reservation_id', $reservation->id)->get();
                $itemCount = ReservationItem::where('reservation_id', $reservation->id)->count();

                return view('frontend.reservation_process.thankyou', ['referenceNumber' => $referenceNumber, 'itemCount' => $itemCount, 'item' => $item, 'details' => $reservation, 'users' => $users]);
            } else {
                return redirect()->route('cart');
            }
        } else {
             return redirect()->route('cart');
        }
    }
}
