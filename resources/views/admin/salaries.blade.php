@extends('layouts.auth')
@section('pageTitle', 'Salaries')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Salaries of employees</h1>
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
                @if(count($users) > 0)
                <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Raiting</th>
                                    <th scope="col">Orders accepted</th>
                                    <th scope="col">Work hours</th>
                                    <th scope="col">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($users as $user)
                        <tr>
                                <th><img src="{{asset('media/'.$user->picture)}}" style="height:3em; width:3em"/></th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>@if($user->type == '0') Worker @else Administrator @endif</td>
                                @php $count =  DB::table('orders')->where('worker', $user->name)->count() @endphp
                                <td>{{$count}}</td>
                                <td>{{$user->hours}}</td>
                                <td>{{Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </thead>
                <tbody>
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
