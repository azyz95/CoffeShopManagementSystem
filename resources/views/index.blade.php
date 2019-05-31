@extends('layouts.app')
@section('pageTitle', 'Welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="content">
                    <h1>Coffee Shop</h1>
                    <h3><strong>Make your order now</strong></h3>
                    <hr>
                    <a href="{{route('menu')}}"><button class="btn btn-default btn-lg"><i class="fas fa-mug-hot"></i> Order!</button></a>
                </div>  
            </div>
        </div>
    </div>
@endsection

@section('addoncss')
    <style>
        body{
            background: url({{asset('media/bg.jpg')}});
            background-size: cover;
            background-position: center;
            font-family: 'Lato', sans-serif;
            color: white;
        }
        html{
            height: 100%;
        }
        #content{
            text-align: center;
            padding-top: 23%;
            text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
        }
        h1{
            font-weight: 700;
            font-size: 7em;
        }
        hr{
            width: 500px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0.02), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.02));
            border-top: 1px solid #f8f8f8;
            border-bottom: 1px solid rgba(0,0,0,0.2);
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
    </style>
@endsection