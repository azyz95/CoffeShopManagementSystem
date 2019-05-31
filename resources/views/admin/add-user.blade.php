@extends('layouts.auth')
@section('pageTitle', 'Add user')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Add user to database</h1>
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
            <form action="{{route('admin.add.user')}}" method="POST">
                <p>Name</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Item title" name="name" aria-describedby="sizing-addon2" required>
                </div>
                <p class="help-block">Full name of your worker</p>
                <br>
                <p>E-mail adress</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="text" class="form-control" placeholder="Short description of item" name="email" aria-describedby="sizing-addon2" required>
                </div>
                <br>
                <p>Password</p>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"></span>
                    <input type="password" class="form-control" placeholder="Current price of this item" name="password" aria-describedby="sizing-addon2" required>
                </div>
                <br>
                <p>Type of user</p>
                <select name="type" class="form-control">
                    <option value="0">Worker</option>
                    <option value="1">Administrator</option>
                </select>
                <p class="help-block">Choose type of user profile depend on their position in company</p>
                <br><br>
                <div class="form-group">
                    <label for="exampleInputFile">Item picture</label>
                    <input type="file" name="picture" id="exampleInputFile" required />
                    <p class="help-block">Insert picture of your user that you will be using on your website.</p>
                </div>
                @csrf
                <br><br>
                <button type="submit" class="btn btn-primary">Add user</button>
                <p class="help-block">Before adding item to your website please make sure everything is ok.</p>
            </form>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

@endsection
