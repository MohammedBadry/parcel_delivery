<?php

namespace App\Http\Controllers\API\Sender;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Order;
use Carbon\Carbon;
use App\Http\Requests\OrdersRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrdersResource;
use Validator;

class Orders extends BaseController
{

    public function index() {
        $orders = Order::where('user_id', Auth::user()->id)->paginate();
        return OrdersResource::collection($orders);
    }

    public function store(OrdersRequest $request) {

        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

        Order::create($data);
        return $this->sendResponse('', 'Order created successfully.');
    }
}
