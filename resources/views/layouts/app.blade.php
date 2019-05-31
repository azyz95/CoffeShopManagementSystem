@php $cart = Cart::getContent(); $count = $cart->count();  @endphp

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('app//apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('app//favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('app//favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('app//site.webmanifest')}}">

    @yield('addoncss')

</head>
</head>
<body>

    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('index')}}"><strong><i class="fas fa-mug-hot"></i> Coffee Shop</strong></a>
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{route('index')}}">Home</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('menu')}}">Menu</a></li>
          </ul> 

        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cart <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if($count > 0)
                @foreach($cart as $item)
                    <li><a href="#">{{$item->name}} - {{$item->quantity}}x</a></li>
                @endforeach
                <li role="separator" class="divider"></li>
                <li><a href="{{route('cart.clear')}}">Clear orders</a></li>
                <li><a href="#">Total quantity: {{Cart::getTotalQuantity()}}</a></li>
                <li><a href="#">Total price: <b>{{Cart::getTotal()}}$</b></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('order')}}"><b>ORDER <i class="fas fa-mug-hot"></i></b></a></li>
            @else
                <br>
                <center><i style="font-size:2em;color:rgb(241, 215, 190)" class="fas fa-shopping-cart"></i></center>
                <br>
                <li class="text-center"><a href="#">Cart is Empty</a></li>
                <li class="text-center"><a href="#">Order Something</a></li>
            @endif
          </ul>
        </li>
      </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
    </nav>

    @if(Session::has('msg'))
    <div class="container">
        <div class="alert alert-warning" role="alert">{{ Session::get('msg') }}</div>
    </div>
    @endif

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</body>
</html>
</html>
