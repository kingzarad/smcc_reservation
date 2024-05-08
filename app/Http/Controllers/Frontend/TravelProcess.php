<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TravelProcess extends Controller
{
    public function index()
    {
        if (auth()->user()->status == "incompleted") {
            if (auth()->user()->status == "incompleted") {
                Session::flash('status', 'warning');
                Session::flash('message', 'Please complete your details before adding items or property under the profile page');
                return redirect('/myaccount/profile');
            }
        }
        return view('frontend.travelprocess.index');
    }
}
