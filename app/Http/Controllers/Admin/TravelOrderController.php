<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TravelOrder;
use Illuminate\Http\Request;

class TravelOrderController extends Controller
{
    public function pending()
    {

        return view('admin.travel.pending');
    }

    public function history()
    {
        $travelList = TravelOrder::where('status', '!=', 1)->get();
        return view('admin.travel.history',compact('travelList'));
    }

}
