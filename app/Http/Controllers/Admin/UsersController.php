<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function pending()
    {
        $usersList = User::where('role_as', '0')->where('user_status', '1')->get();
        return view('admin.users.pending', compact('usersList'));
    }

    public function management()
    {
        $usersList = User::where('role_as', '0')->get();
        return view('admin.users.management', compact('usersList'));
    }
}
