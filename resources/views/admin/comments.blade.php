@extends('layouts.auth')
@section('pageTitle', 'Comments')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Comments from our customers</h1>
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
            @if(count($comments) > 0)
                <table class="table table-bordered">
                        <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Raiting</th>
                                <th scope="col">Created (time)</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($comments as $comment)
                        <tr>
                                <th scope="row">#{{$comment->id}}</th>
                                <td>{{$comment->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>@for($i = 1; $i <= $comment->raiting; $i++) <i class="fas fa-star"></i>  @endfor</td>
                                <td><b>{{Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans()}}</b></td>
                        </tr>
                    @endforeach
                </thead>
                <tbody>
            @endif
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->    
@endsection
