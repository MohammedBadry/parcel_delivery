@extends('dashboard.layouts.master')
@section('content')

                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm">
                                        <div class="nk-block-head-content">
											&nbsp;
										</div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">{{!empty($title)?$title:''}}</h4>
                                            </div>
                                        </div>
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="table-responsive">
                                                    <table class="table table-orders nowrap nk-tb-list is-separate">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Parcel description</th>
                                                                <th>Pickup Address</th>
                                                                <th>Dropoff Address</th>
                                                                <th>Pickup Time</th>
                                                                <th>Dropoff Time</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Created at</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->parcel_description}}</td>
                                                                <td>{{$order->pickup_address}}</td>
                                                                <td>{{$order->drop_address}}</td>
                                                                <td>{{$order->pickup_time}}</td>
                                                                <td>{{$order->drop_time}}</td>
                                                                <td>{{$order->user->name ?? '-'}}</td>
                                                                <td>{{$order->status}}</td>
                                                                <td>{{$order->created_at}}</td>
                                                                <td class="tb-odr-action">
                                                                    @include('dashboard.biker.orders.buttons.actions', ['order' => $order])
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>{{ $orders->links() }}</div>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div> <!-- nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>

@endsection
