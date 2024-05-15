<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpirationChecker;

class TravelOrderController extends Controller
{
    public function index()
    {
        $expirationChecker = new ExpirationChecker();
        $expirationChecker->checkReservation();
        $expirationChecker->checkTravelOrder();
        return view('frontend.travel.index');
    }
}
