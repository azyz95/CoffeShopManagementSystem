@extends('layouts.app')
@section('pageTitle', 'About')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1><strong>About Us</strong></h1>
            
        </div>

        <h3>We are Coffee Shop, our goal is to make you happy. We hope that you like our new system and that it makes your life easier.</h3>
        <hr>
        <h2 style="text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
            text-align: center;"><bold>Enjoy your coffee!</bold></h2>
        
</div>
@endsection

@section('addoncss')
<style>
        body{
            font-family: 'Lato', sans-serif;
        }
        .navbar-default {
            background-color: rgb(241, 215, 190);
            border-top-color: rgb(241, 215, 190);
            border-bottom-color: white;

        }
        .navbar-default .navbar-nav>.active>a{
            background-color: white;
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
    </style>
@endsection