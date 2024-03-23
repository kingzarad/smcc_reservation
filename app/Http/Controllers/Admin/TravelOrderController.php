<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelOrderController extends Controller
{
    public function pending()
    {
        return view('admin.reservation.pending');
    }

    public function history()
    {
        return view('admin.reservation.history');
    }

}
