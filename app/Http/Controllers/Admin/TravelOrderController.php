<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelOrderController extends Controller
{
    public function index()
    {
        return view('frontend.travel.index');
    }
}
