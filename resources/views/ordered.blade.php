@extends('layouts.app')
@section('pageTitle', 'Order successful')

@section('content')
<div class="container">
        <div class="jumbotron">
            <h1><strong>Successfuly placed an order</strong></h1>
            
        </div>

        <h3>Feel free to leave review so we can use your feedback to improve our services.</h3>
        <hr>
        <h2 style="text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
                         0px 8px 13px rgba(0,0,0,0.1),
                         0px 18px 23px rgba(0,0,0,0.1);
            text-align: center;"><bold>Enjoy your coffee!</bold></h2>
        <div class="panel panel-default" style="margin-top:5em">
                <div class="panel panel-warning"></div>
                <div class="panel-body">
                <form action="{{route('cart.comment')}}" method="POST">
                    @csrf
                    <p>Your name</p>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"></span>
                        <input type="text" class="form-control" placeholder="Your full name" value="@if(isset($name)) {{$name}} @endif" name="name" aria-describedby="sizing-addon2" required>
                    </div>
                    <br>
                    <p>Comment</p>
                        <textarea type="text" class="form-control" placeholder="Your last name" name="comment" style="min-width:100%;" rows="6" required></textarea>
                    <br>
                    <p>Raiting</p>
                    <center>
                    <div class="rating">
                        <label>
                                <input type="radio" name="raiting" value="1" />
                                <span class="icon">★</span>
                        </label>
                        <label>
                                <input type="radio" name="raiting" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                        </label>
                        <label>
                                <input type="radio" name="raiting" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>   
                        </label>
                        <label>
                                <input type="radio" name="raiting" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                        </label>
                        <label>
                                <input type="radio" name="raiting" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                        </label>
                    </div>
                    </center>
                    <br><br>
                    <center><button type="submit" class="btn btn-lg btn-warning">LEAVE COMMENT</button></center>
                </form>
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
        .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 50px;
        }

        .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
        }

        .rating label:last-child {
        position: static;
        }

        .rating label:nth-child(1) {
        z-index: 5;
        }

        .rating label:nth-child(2) {
        z-index: 4;
        }

        .rating label:nth-child(3) {
        z-index: 3;
        }

        .rating label:nth-child(4) {
        z-index: 2;
        }

        .rating label:nth-child(5) {
        z-index: 1;
        }

        .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        }

        .rating label .icon {
        float: left;
        color: transparent;
        }

        .rating label:last-child .icon {
        color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
        color: rgb(241, 215, 190);
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px rgb(241, 215, 190);
        }
    </style>
@endsection