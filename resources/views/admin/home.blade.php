@extends('layouts.auth')
@section('pageTitle', 'Admin')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Shop Dashboard</h1>
                <p></p>
            </div>
        </div>
    </div>
</div>

@if(Session::has('msg'))
<div class="container" style="margin-top:3em">
    <div class="alert alert-warning" role="alert">{{ Session::get('msg') }}</div>
</div>
@endif
<!-- /#page-content-wrapper -->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>    
@endsection
