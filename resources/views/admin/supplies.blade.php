@extends('layouts.auth')
@section('pageTitle', 'Salaries')

@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Supplies of products</h1>
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
        <div class="col-lg-12" style="padding:8em">
            @if(count($items) > 0)
            <table class="table table-bordered">
                    <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Price ($)</th>
                              <th scope="col">Quantity (piece/cup)</th>
                              <th scope="col">Created at</th>
                              <th scope="col">Action</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                @foreach($items as $item)
                    <tr>
                        <form action="{{route('admin.edit.post')}}" method="POST">
                        @csrf
                            <input type="hidden" name="id" value="{{$item->id}}" />
                            <th scope="row">#{{$item->id}}</th>
                            <td><input type="text" class="form-control" placeholder="Item name" name="name" value="{{$item->name}}" required></td>
                            <td><input type="text" class="form-control" placeholder="Item description" name="desc" value="{{$item->desc}}" required></td>
                            <td><input type="number" class="form-control" placeholder="Price of item" name="price" value="{{$item->price}}" required></td>
                            <td><input type="number" class="form-control" placeholder="Quantity of item" name="quantity" value="{{$item->quantity}}" required></td>
                            <td>{{$item->created_at}}</td>
                            <td><button type="submit" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit item</button></td>
                        </form>
                        <td><a href="{{route('admin.item.remove',$item->id)}}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Remove item</a></td>
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
