@extends('admin.layouts.layouts')
@section('title')
All Orders
@endsection
<style>
    .orderDetail .container {
    margin-top: 50px;
    margin-bottom: 50px;
}
.orderDetail .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.1rem;
}
.orderDetail .card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
}
.orderDetail .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.orderDetail .track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px;
}
.orderDetail .track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative;
}
.orderDetail .track .step.active:before {
    background: #ff5722;
}
.orderDetail .track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px;
}
.orderDetail .track .step.active .icon {
    background: #ee5435;
    color: #fff;
}
.orderDetail .track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd;
}
.orderDetail .track .step.active .text {
    font-weight: 400;
    color: #000;
}

.orderDetail .track .text {
    display: block;
    margin-top: 7px;
}
.orderDetail .track .icon .zmdi {
    font-size: 21px;
    margin-top: 10px;
    margin-left: 1px;
}
.orderDetail .itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%;
}
.orderDetail .itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0;
}
.orderDetail .img-sm {
    width: 80px;
    height: 80px;
    padding: 7px;
}
.orderDetail ul.row,
.orderDetail ul.row-sm {
    list-style: none;
    padding: 0;
}
.orderDetail .itemside .info {
    padding-left: 15px;
    padding-right: 7px;
}
.orderDetail .itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529;
}
.orderDetail p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.orderDetail .btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px;
}
.orderDetail .btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px;
}

</style>
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Orders</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Receiver Name</th>
                                            <th>Receiver Address</th>
                                            <th>Total Amount</th>
                                            <th>Order Status</th>
                                            <th>View Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $order)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$order->order_id}}</td>
                                            <td style="vertical-align: middle;">{{$order->receiver_name}}</td>
                                            <td style="vertical-align: middle;">{{$order->receiver_address}}</a></td>
                                            <td style="vertical-align: middle;">${{$order->totalAmount}}</td>
                                            <td style="vertical-align: middle;">
                                                @if($order->order_status == 'Placed')
                                                <span class="badge badge-warning">{{$order->order_status}}</span>
                                                @elseif($order->order_status == 'Prepared')
                                                <span class="badge badge-primary">{{$order->order_status}}</span>
                                                @elseif($order->order_status == 'Dispatched')
                                                <span class="badge badge-info">{{$order->order_status}}</span>
                                                @elseif($order->order_status == 'Delivered')
                                                <span class="badge badge-success">{{$order->order_status}}</span>
                                                @elseif($order->order_status == 'Completed')
                                                <span class="badge badge-success">{{$order->order_status}}</span>
                                                @else
                                                <span class="badge badge-danger">{{$order->order_status}}</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-primary align-end" data-toggle="modal" data-target="#viewDetail{{$order->id}}">
                                                  <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="viewDetail{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                      <!--<div class="modal-header">-->
                                                      <!--  <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>-->
                                                      <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                                                      <!--    <span aria-hidden="true">&times;</span>-->
                                                      <!--  </button>-->
                                                      <!--</div>-->
                                                      <div class="modal-body orderDetail">
                                                          
                                                          <div class="container">
                                                            <article class="card">
                                                                <header class="card-header"> Order Detail </header>
                                                                <div class="card-body">
                                                                    <h6>Order ID: {{$order->order_id}}</h6>
                                                                    <article class="card">
                                                                        <header class="card-header"> Schedule For Delivery </header>
                                                                        <div class="card-body row">
                                                                            <div class="col-md-3"> <strong>Delivery From:</strong> <br> {{$order->time_from}} </div>
                                                                            <div class="col-md-3"> <strong>Delivery To:</strong> <br>  {{$order->time_to}} </div>
                                                                            <div class="col-md-3"> <strong>Status:</strong> <br> {{$order->order_status}} </div>
                                                                            <div class="col-md-3"> <strong>Payment Type:</strong> <br> {{$order->payment}} </div>
                                                                            <div class="col-md-12"> <strong>Notes:</strong> <br> {{$order->comment}} </div>
                                                                        </div>
                                                                    </article>
                                                                    @if($order->order_status == 'Cancelled')
                                                                        <h5 style="text-align: center; color: red;">Order Cancelled</h5>
                                                                    @else
                                                                        <div class="track">
                                                                            <div class="step @if($order->order_status == 'Placed' || $order->order_status == 'Prepared' || $order->order_status == 'Dispatched' || $order->order_status == 'Delivered' || $order->order_status == 'Completed') active @endif"> <span class="icon"> <i class="zmdi zmdi-check"></i> </span> <span class="text">Order Placed</span> </div>
                                                                            <div class="step @if($order->order_status == 'Prepared' || $order->order_status == 'Dispatched' || $order->order_status == 'Delivered' || $order->order_status == 'Completed') active @endif"> <span class="icon"> <i class="zmdi zmdi-shopping-cart-plus"></i> </span> <span class="text">Order Prepared</span> </div>
                                                                            <div class="step @if($order->order_status == 'Dispatched' || $order->order_status == 'Delivered' || $order->order_status == 'Completed') active @endif"> <span class="icon"> <i class="zmdi zmdi-account"></i> </span> <span class="text"> Order Dispatched</span> </div>
                                                                            <div class="step @if($order->order_status == 'Delivered' || $order->order_status == 'Completed') active @endif"> <span class="icon"> <i class="zmdi zmdi-truck"></i> </span> <span class="text"> Order Delivered </span> </div>
                                                                            <div class="step @if($order->order_status == 'Completed') active @endif"> <span class="icon"> <i class="zmdi zmdi-check-all"></i> </span> <span class="text">Order Completed</span> </div>
                                                                        </div>
                                                                    @endif
                                                                    <hr>
                                                                    <ul class="row">
                                                                        @foreach($order->orderdetail as $orderDetail)
                                                                        <li class="col-md-4">
                                                                            <figure class="itemside mb-3">
                                                                                <div class="aside"><img src="{{$orderDetail->product->images[0]->image}}" class="img-sm border"></div>
                                                                                <figcaption class="info align-self-center">
                                                                                    <p class="title">{{$orderDetail->product->name}} <br> Qty: {{$orderDetail->quantity}}</p> <span class="text-muted">$ {{$orderDetail->price}} </span>
                                                                                </figcaption>
                                                                            </figure>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-3" >
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <p class="title">Item Total:</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span class="text-muted">${{$order->amount}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3" >
                                                                            <div class="row">
                                                                                <div class="col-md-7">
                                                                                    <p class="title">Sale Tax (13%):</p>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <span class="text-muted">${{$order->sales_tax}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3" >
                                                                            <div class="row">
                                                                                <div class="col-md-7">
                                                                                    <p class="title">Delivery Fees:</p>
                                                                                </div>
                                                                                <div class="col-md-5">
                                                                                    <span class="text-muted">${{$order->all_delivery_fees}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3" >
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <p class="title">Tip:</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span class="text-muted">$@if($order->tip) {{$order->tip}} @else 0 @endif</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <hr>
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-md-3" >
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <p class="title">Total Price:</p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <span class="text-muted">${{$order->totalAmount}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($order->order_status == 'Placed')
                                                <a href="{{url('admin/prepared_order')}}/{{$order->id}}" class="btn btn-primary">Prepared</a>
                                                @elseif($order->order_status == 'Prepared')
                                                <a href="{{url('admin/dispatch_order')}}/{{$order->id}}" class="btn btn-warning">Dispatched</a>
                                                @elseif($order->order_status == 'Dispatched')
                                                <a href="{{url('admin/deliver_order')}}/{{$order->id}}" class="btn btn-info">Delivered</a>
                                                @elseif($order->order_status == 'Delivered')
                                                <a href="{{url('admin/complete_order')}}/{{$order->id}}" class="btn btn-success">Completed</a>
                                                @elseif($order->order_status == 'Completed')
                                                <button class="btn btn-success" style="cursor: auto;">Completed</button>
                                                @else
                                                <button class="btn btn-danger">Cancelled</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('admin.pages.toastr')
@endsection