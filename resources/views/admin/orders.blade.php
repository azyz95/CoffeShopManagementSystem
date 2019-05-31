@extends('layouts.auth')
@section('pageTitle', 'Orders')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Current orders</h1>
                <p></p>
            </div>
        </div>
    </div>
</div>

@if(Session::has('msg'))
<div class="container">
    <div class="alert alert-warning" role="alert">{{ Session::get('msg') }}</div>
</div>
@endif

<div class="conteiner-fluid">
    <div class="row">
        <div class="col-lg-10" style="padding:8em">
            @if(count($orders) > 0)
                <ul class="list-group">
                @foreach($orders as $order)
                    <li class="list-group-item" @if($order->status == 1) style="border:2px solid #44bd32;" @endif>
                        <div class="row">
                        <div class="col-lg-5">
                            <h3><b>Table - {{$order->table}}</b></h3>
                            {{$order->firstname . ' ' . $order->lastname}}
                            <br>
                            {{$order->street . ', ' . $order->city}}<br>
                            <b>{{Carbon\Carbon::createFromTimeStamp(strtotime($order->created_at))->diffForHumans()}}</b>
                        </div>
                        <div class="col-lg-5">
                            <h3>Order - #{{$order->id}}</h3>
                            <b>Total: {{$order->price}}$</b><br>
                            <b>Quantity: {{$order->quantity}}</b><br>
                            <b>Payment: @if($order->type = 1) Customer will pay to waitress @else Customer will pay with card @endif</b>
                            @if($order->worker != '')<br><b>Worker: {{$order->worker}} </b>@endif
                        </div>
                        <div class="col-lg-1">
                            @if($order->status == 0)
                            <a href="{{route('admin.order.approve',$order->id)}}" class="btn btn-sm btn-primary">Accept Order</a>
                            @else 
                            <a href="{{route('admin.order.approve',$order->id)}}" class="btn btn-sm btn-success">Order accepted</a>
                            @endif
                            <p class="help-block">You can accept order or you can revert it for some reason.</p>      
                        
                        </div>
                        <div class="col-lg-1">
                                <a href="{{route('admin.order.remove',$order->id)}}" class="btn btn-sm btn-danger">Remove order</a>
                                <p class="help-block">You can remove order if your guest left the table.</p><br>    
                        </div>
                        <hr><br>
                        @php $cart = unserialize($order->data); @endphp
                        <div class="col-lg-12">
                            @foreach($cart as $item)
                                <p>- {{$item->name}}</p>
                            @endforeach
                        </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>    
@endsection
