<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class Dashboard extends Controller
{
    public function index() {
        //new orders for biker to pickup [only shown for biker]
        $suggeted_orders = Order::where('status', 'Pending')->count();

        //previous completed orders for both sender & biker
        $my_orders = Order::where('user_id', Auth::user()->id)->count();

        return view('dashboard.home', compact('suggeted_orders', 'my_orders'));
    }
}
