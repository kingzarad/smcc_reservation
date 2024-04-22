<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TravelOrder;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $reservTotal = Reservation::where('status', 1)->count();
        $reservPending = Reservation::where('status', 0)->count();
        $reservCancel = Reservation::where('status', 2)->count();
        $userPending = User::where('user_status', 1)->count();
        $travelPending = TravelOrder::where('status', 1)->count();
        return view('admin.dashboard', [
            'reservTotal' => $reservTotal,
            'reservPending' => $reservPending,
            'reservCancel' => $reservCancel,
            'userPending' => $userPending,
            'travelPending' => $travelPending
        ]);
    }
}
