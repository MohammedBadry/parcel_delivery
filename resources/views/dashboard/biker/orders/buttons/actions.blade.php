
<div class="dropdown">
	<a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
	<div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
		<ul class="link-list-plain">
			@if($order->status=='Pending')
			<li><a href="#" data-toggle="modal" data-target="#pickup_order{{$order->id}}" class="text-info">Pickup</a></li>
			@endif
			@if($order->status=='Pickedup')
			<li><a href="#" data-toggle="modal" data-target="#deliver_order{{$order->id}}" class="text-info">Delivered</a></li>
			@endif
		</ul>
	</div>
</div>
<div class="modal fade" id="pickup_order{{$order->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
            <form action="{{route('biker.orders.pickup', ['id' => $order->id])}}" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Pickup this order</h4>
                    <button class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-exclamation-triangle"></i> Choose pickup and delivery time for the order number: ({{$order->id}})
                    <div class="row gy-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pickup_address" class="control-label">Pickup time</label>
                                <div class="form-control-wrap">
                                    <input type="datetime-local" name="pickup_time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="drop_address" class="control-label">Delivery time</label>
                                <div class="form-control-wrap">
                                    <input type="datetime-local" name="drop_time" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-primary btn-flat">Pickup</button>
                        <a class="btn btn-default btn-flat" data-dismiss="modal">Cancel</a>
                </div>
            </form>
		</div>
	</div>
</div>

<div class="modal fade" id="deliver_order{{$order->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change order status</h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<i class="fa fa-exclamation-triangle"></i> Change order status to be delivered for order number: ({{$order->id}})
			</div>
			<div class="modal-footer">
				<form action="{{route('biker.orders.change-status', ['id' => $order->id])}}" method="post">
					@csrf
					@method('patch')
					<button type="submit" class="btn btn-primary btn-flat">Deliver</button>
					<a class="btn btn-default btn-flat" data-dismiss="modal">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>

