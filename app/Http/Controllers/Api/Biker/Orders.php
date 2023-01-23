<?php

namespace App\Http\Controllers\API\Biker;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrdersResource;
use Validator;

class Orders extends BaseController
{

    public function index() {
        $orders = Order::where('biker_id', Auth::user()->id)->paginate();
        return OrdersResource::collection($orders);
    }

    public function suggested() {
        $orders = Order::where('status', 'Pending')->paginate();
        return OrdersResource::collection($orders);
    }

    public function pickupOrder(Request $request, $id) {
        $order = Order::findOrFail($id);
        if($order->status!='Pending') {
            return $this->sendError('Unauthorised.', ['error'=>'Not allowed']);
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
        return $this->sendResponse('', 'Order pickedup successfully.');
    }

    public function changeStatus($id) {
        $order = Order::findOrFail($id);
        if($order->biker_id != Auth::user()->id || $order->status!='Pickedup') {
            return $this->sendError('Unauthorised.', ['error'=>'Not allowed']);
        }
        $order->status = 'Delivered';
        $order->save();
        return $this->sendResponse('', 'Order status updated successfully.');
    }
}
