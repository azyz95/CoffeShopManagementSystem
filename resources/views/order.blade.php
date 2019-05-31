@php $cart = Cart::getContent(); $count = $cart->count(); @endphp
@extends('layouts.app')
@section('pageTitle', 'Order')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1><strong>Proccess order</strong></h1>
            
        </div>

       <div class="conteiner-fluid">
    <div class="row">
        <div class="col-lg-7" style="padding:4em">
            <form action="{{route('cart.order')}}" method="POST" enctype="multipart/form-data">
                <p>First name</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Your first name" name="firstname" aria-describedby="sizing-addon2" required>
                </div>
                <br>
                <p>Last name</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Your last name" name="lastname" aria-describedby="sizing-addon2" required>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                            <p>Street</p>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"></span>
                            <input type="text" class="form-control" placeholder="Short description of item" name="street" aria-describedby="sizing-addon2" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <p>City</p>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"></span>
                            <input type="text" class="form-control" placeholder="Short description of item" name="city" aria-describedby="sizing-addon2" required>
                        </div>
                    </div>
                </div>
                <br>
                <p>Pay</p>
                <select name="type" class="form-control">
                    <option value="1">To waitress</option>
                    <option value="2">By card</option>
                </select>
                <br>
                <p>Table</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="number" class="form-control" placeholder="Table number" name="table" aria-describedby="sizing-addon2" min="1" max="12" required>
                </div>
                <br>
                @csrf
                <br><br>
                <button type="submit" class="btn btn-primary">Order</button>
                <hr>
                <p class="help-block"><i class="fas fa-fingerprint"></i> This data is secured and will only be used to process this order.</p>
            </form>
        </div>
        <div class="col-lg-5" style="padding:4em">,
            @if(Cart::getTotal() > 0)
            <h4>INFO ABOUT ORDER</h4>
            <hr>
            <h5>Subtotal: <b>{{Cart::getTotal()}}$</b></h5>
            <h5>Quantity: <b>{{Cart::getTotalQuantity()}}</b></h5>
            <a href="{{route('cart.clear')}}"><i class="fas fa-trash-alt"></i> Clear orders</a>
            <hr>
            <h5 class="total">Total(with TAX): <b>{{Cart::getTotal()}}$</b> </h5>
            <hr>
            @else
               <center> <i style="font-size:3em" class="far fa-smile"></i><br><br><h4><b>ORDER SOMETHING FROM OUR WEBSITE</b></h4></center>
            @endif
        </div>
    </div>
</div>
        
</div>
@endsection

@section('addoncss')
<style>
        body{
            font-family: 'Lato', sans-serif;
        }
        .navbar-default {
            background-color: transparent;
            border-color: transparent;
            border-bottom: rgb(241, 215, 190);
        }
        .navbar-default .navbar-nav>li>a {
            color: white;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
            font-weight: 600;
        }
        .navbar-default .navbar-brand {
            color: white;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
        }
        .jumbotron {
            background-color: rgb(241, 215, 190);
            background: url({{asset('media/bg.jpg')}});
            background-size: cover;
            background-position: center;
            /*background: linear-gradient(180deg, rgba(241,215,190,1) 19%, 
                                                rgba(255,255,255,1) 83%, 
                                                rgba(254,255,255,1) 100%);*/
            /*background: radial-gradient(circle, rgba(241,215,190,1) 34%, rgba(255,255,255,1) 53%, rgba(254,255,255,1) 100%);*/
        }
        .jumbotron h1{
            color: white;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
            text-align: center;
            font-size: 7em;
        }
        .btn-success {
            background-color: rgb(241, 215, 190);
            border-color: #f8f8f8;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
        }
        .container h3,h2{
            text-align: center;
        }
        .total {
            padding: 16px;
            text-align:center;
            background-color: green;
            color:#FFF;
        }
    </style>
@endsection