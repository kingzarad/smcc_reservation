<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function stockin()
    {
        return view('admin.stocks.stockin');
    }
    public function stockhistory()
    {
        return view('admin.stocks.stockhistory');
    }
}
