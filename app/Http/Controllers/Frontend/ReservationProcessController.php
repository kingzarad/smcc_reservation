<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('frontend.reservation_process.index');
    }


    public function thankyou()
    {
        return view('frontend.reservation_process.thankyou');
    }
}
