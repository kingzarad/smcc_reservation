<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpirationChecker;

class FrontendController extends Controller
{
    public function __construct()
    {
        $expirationChecker = new ExpirationChecker();
        $expirationChecker->checkReservation();
        $expirationChecker->checkTravelOrder();
    }

    public function index()
    {

        return view('frontend.index');
    }


}
