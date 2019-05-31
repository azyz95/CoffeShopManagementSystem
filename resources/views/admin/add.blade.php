@extends('layouts.auth')
@section('pageTitle', 'Add item')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Add item to database</h1>
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
        <div class="col-lg-6" style="padding:8em">
            <form action="{{route('admin.add.post')}}" method="POST" enctype="multipart/form-data">
                <p>Title</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Item title" name="name" aria-describedby="sizing-addon2" required>
                </div>
                <p class="help-block">Name of this item ex.Turkish coffee so your customers will find what they want.</p>
                <br>
                <p>Short description</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Short description of item" name="desc" aria-describedby="sizing-addon2" required>
                </div>
                <p class="help-block">Type something short about this item so your customers can choose better.</p>
                <br>
                <p>Price</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="number" class="form-control" placeholder="Current price of this item" name="price" aria-describedby="sizing-addon2" required>
                </div>
                <br>
                <p>Quantity</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="number" class="form-control" placeholder="Current item quantity" name="quantity" aria-describedby="sizing-addon2" required>
                </div>
                <p class="help-block">Quantity of item you have in your shop.This number will be decremented based on orders you recieve</p>
                <br><br>
                <div class="form-group">
                    <label for="exampleInputFile">Item picture</label>
                    <input type="file" name="picture" id="exampleInputFile" required />
                    <p class="help-block">Insert picture of your item that you will be using on your website.</p>
                </div>
                @csrf
                <br><br>
                <button type="submit" class="btn btn-primary">Add item</button>
                <p class="help-block">Before adding item to your website please make sure everything is ok with description, etc.</p>
            </form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
 
@endsection
