<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet" />
    <link href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet" />
    <script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--<link rel="stylesheet" type="text/css" href="css/app.css">-->
    <!-- Scripts -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="home1">
                    <img src="image/icon2.png" width="30" height="30" class="d-inline-block align-top" alt=""> Appointment
                    </a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="btn btn-outline-danger nav-link " href="{{url('home1')}}"><i class="fa fa-home"></i> หน้าหลัก<span class="sr-only"></span>
                    
                    </a>
                    </li>&nbsp
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('news')}}"><i class="fa fa-newspaper-o"></i> ข่าวสาร</a>
                    </li>&nbsp

                    @if (Auth::user()->level == "admin")

                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('service')}}"><i class="fa fa-th-list"></i> รายการบริการ</a>
                    </li>&nbsp
                    @else
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('/services')}}"><i class="fa fa-th-list"></i> รายการบริการ</a>
                    </li>&nbsp
                    @endif
                    @if (Auth::user()->level == "admin")
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('appoints')}}"><i class="fa fa-calendar-plus-o"></i> จองคิวบริการ</a>
                    </li>
                    @else
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('/appoint')}}"><i class="fa fa-calendar-plus-o"></i> จองคิวบริการ</a>
                    </li>
                    @endif
                    </li>&nbsp
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="{{url('contact')}}"><i class="fa fa-newspaper-o"></i> ติดต่อเรา</a>
                    </li>&nbsp

                    <!--@if (Auth::user()->level == "admin")
                    <li class="nav-item">
                    <a class="btn btn-outline-danger nav-link" href="service">Setting</a>
                    </li>&nbsp
                    @endif-->
                </ul>

                <div class="navbar-expand-lg navbar-dark bg-dark" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" class = "btn btn-success">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                          <div class="btn-group" role="group">
                             <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                                <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu">
                             <li>
                                 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            &nbsp<i class="fa fa-power-off"></i> Logout
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                 </form>

                              </li>
                              <li>
                              <a href="change-password">
                                         &nbsp<i class="fa fa-cog"></i> Change password
                              </a>
                              </li>
                              </ul>
                           </div>
                         @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>






               
<!-- <div class="panel panel-default">
	<div class="container">
		<h1>@yield('title')</h1>
	</div>
</div> -->
<div class="container">
	@section('content')	
	@show
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>