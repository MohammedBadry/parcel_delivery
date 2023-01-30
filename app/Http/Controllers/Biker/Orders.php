<?php

namespace App\Http\Controllers\Biker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Auth;

class Orders extends Controller
{
    public $path = 'dashboard.biker.orders.';

    public function index() {
        $orders = Order::with('user')->where('biker_id', Auth::user()->id)->paginate();
        return view($this->path.'index', compact('orders'));
    }

    public function suggested() {
        $orders = Order::with('user')->where('status', 'Pending')->paginate();
        return view($this->path.'index', compact('orders'));
    }

    public function pickupOrder(Request $request, $id) {

        $order = Order::findOrFail($id);
        if($order->status!='Pending') {
            return redirect()->back()->withErrors(['error'=>'Not allowed']);
        }

        $request->validate([
            'pickup_time' => 'required|after:' . date('Y-m-d'),
            'drop_time' => 'required|after_or_equal:pickup_time',
        ]);

        $order->status = 'Pickedup';
        $order->biker_id = Auth::user()->id;
        $order->pickup_time = $request->pickup_time;
        $order->drop_time = $request->drop_time;
        $order->save();
        return redirect()->back()->withSuccess('Order pickedup successfully');
    }

    public function changeStatus($id) {
        $order = Order::findOrFail($id);
        if($order->biker_id != Auth::user()->id || $order->status!='Pickedup') {
            return redirect()->back()->withErrors(['error'=>'Not allowed']);
        }
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back()->withSuccess('Order status updated successfully');
    }
}
