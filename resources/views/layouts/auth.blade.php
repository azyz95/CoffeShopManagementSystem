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
<style>
	  body{
			font-family: 'Lato', sans-serif;
		}
		.navbar-default {
    		background-color: rgb(241, 215, 190);
    		border-top-color: rgb(241, 215, 190);
    		border-bottom-color: rgb(241, 215, 190);
    		margin-bottom: 0px;
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

		#wrapper {
		    padding-left: 0;
		    -webkit-transition: all 0.5s ease;
		    -moz-transition: all 0.5s ease;
		    -o-transition: all 0.5s ease;
		    transition: all 0.5s ease;
		}

		#wrapper.toggled {
		    padding-left: 250px;
		}

		#sidebar-wrapper {
		    z-index: 1000;
		    position: fixed;
		    left: 250px;
		    width: 0;
		    height: 100%;
		    margin-left: -250px;
		    overflow-y: auto;
		    background: #000;
		    -webkit-transition: all 0.5s ease;
		    -moz-transition: all 0.5s ease;
		    -o-transition: all 0.5s ease;
		    transition: all 0.5s ease;
		    background-color: rgb(241, 215, 190);
		}

		#wrapper.toggled #sidebar-wrapper {
		    width: 250px;
		}

		#page-content-wrapper {
		    width: 100%;
		    position: absolute;
		    padding: 15px;
		    background: url({{ asset('media/bg.jpg') }});
		    background-size: cover;
		    background-position: center;
		}

		#wrapper.toggled #page-content-wrapper {
		    position: absolute;
		    margin-right: -250px;
		}

		/* Sidebar Styles */

		.sidebar-nav {
		    position: absolute;
		    top: 0;
		    width: 250px;
		    margin: 0;
		    padding: 0;
		    list-style: none;
		}

		.sidebar-nav li {
		    text-indent: 20px;
		    line-height: 40px;
		}

		.sidebar-nav li a {
		    display: block;
		    text-decoration: none;
		    color: #171738;
		    font-size: 16px;
		}

		.sidebar-nav li a:hover {
		    text-decoration: none;
		    color: #fff;
		    background: rgba(255,255,255,0.2);
		}

		.sidebar-nav li a:active,
		.sidebar-nav li a:focus {
		    text-decoration: none;
		}

		.sidebar-nav > .sidebar-brand {
		    height: 65px;
		    font-size: 18px;
		    line-height: 60px;
		}

		.sidebar-nav > .sidebar-brand a {
		    color: white;
    		text-shadow: 0px 4px 3px rgba(0,0,0,0.4),
						 0px 8px 13px rgba(0,0,0,0.1),
						 0px 18px 23px rgba(0,0,0,0.1);
			font-size: 23px;			 
		}

		.sidebar-nav > .sidebar-brand a:hover {
		    color: #fff;
		    background: none;
		}

		@media(min-width:768px) {
	    #wrapper {
	        padding-left: 250px;
	    }

	    #wrapper.toggled {
	        padding-left: 0;
	    }

	    #sidebar-wrapper {
	        width: 250px;
	    }

	    #wrapper.toggled #sidebar-wrapper {
	        width: 0;
	    }

	    #page-content-wrapper {
	        padding: 20px;
	        position: relative;
	    }

	    #wrapper.toggled #page-content-wrapper {
	        position: relative;
	        margin-right: 0;
	    }
		}
	</style>	

	<div id="wrapper">

  <!-- Sidebar -->
  <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
          <li class="sidebar-brand">
              <a href="#">
                  <strong>Admin Panel</strong>
              </a>
		  </li>
		  <li>
              <a href="{{route('admin.orders')}}">Orders</a>
          </li>
          <li>
              <a href="{{route('admin.supplies')}}">Supplies</a>
          </li>
          <li>
              <a href="{{route('admin.salaries')}}">Salaries</a>
          </li>
          <li>
              <a href="{{route('admin.comments')}}">Comments</a>
		  </li>
		  <li>
			   <a href="{{route('admin.add.show')}}">Add Item</a>
		  </li>
          <li>
			   <a href="{{route('admin.add.show.user')}}">Add User</a>
		  </li>
      </ul>
  </div>
  <!-- /#sidebar-wrapper -->
    

    @yield('content')

    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</body>
</html>
</html>
