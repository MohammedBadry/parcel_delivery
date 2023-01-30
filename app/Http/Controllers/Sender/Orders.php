<?php

namespace App\Http\Controllers\Sender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrdersRequest;
use App\Models\Order;
use Auth;

class Orders extends Controller
{
    public $path = 'dashboard.sender.orders.';

    public function index() {

        $orders = Order::with('biker')->where('user_id', Auth::user()->id)->paginate();
        return view($this->path.'index', compact('orders'));
    }

    public function create() {
        return view($this->path.'create');
    }

    public function store(OrdersRequest $request) {

        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        Order::create($data);
        return redirect()->back()->withSuccess('Order created successfully');
    }
}
