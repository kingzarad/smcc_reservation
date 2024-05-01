<?php

namespace App\Http\Controllers\frontend;

use App\Models\Reservation;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class ReservationProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->status == "incompleted") {
            if (auth()->user()->status == "incompleted") {
                Session::flash('status', 'warning');
                Session::flash('message', 'Please complete your details before adding items or property under the profile page');
                return redirect('/myaccount/profile');
            }
        }
        return view('frontend.reservation_process.index');
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
                $reservationID = $reservation->id;
                $users = UserDetails::where('users_id', $reservation->users_id)->first();

                return view('frontend.reservation_process.thankyou', ['referenceNumber' => $referenceNumber, 'reservationID' => $reservationID, 'details' => $reservation, 'users' => $users]);
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('home');
        }
    }
}
