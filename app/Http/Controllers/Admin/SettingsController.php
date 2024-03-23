<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function position()
    {

        return view('admin.settings.position');
    }
    public function department()
    {

        return view('admin.settings.department');
    }


}
