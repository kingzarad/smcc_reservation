<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('frontend.account.dashboard');
    }

    public function reservation()
    {
        return view('frontend.account.reservation');
    }

    public function profile()
    {
        return view('frontend.account.profile');
    }

    public function travel()
    {
        return view('frontend.account.travel');
    }

    public function security()
    {
        return view('frontend.account.security');
    }
}
