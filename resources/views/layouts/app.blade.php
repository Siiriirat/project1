<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0-alpha/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0-alpha/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome-min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-navbar1.css')}}">
<!--   <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-news.css')}}">
 -->  
<!--   <script type="text/javascript" src="{{url('js/navbar.js')}}"></script>
 -->  <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>








     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-min.css">
    <<!-- link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-navbar1.css')}}"> 
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Scripts -->
    <!-- <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-webmaster">
            <div class="container">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('home1')}}">
                    <img src="image/icon2.png" width="30" height="30" class="d-inline-block align-top" alt=""> Appointment
                    </a>
                    </div>
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li class="active">
                         <a href="{{ route('login') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> เข้าสู่ระบบ</a>
                        </li>
                        <li class="active">
                         <a href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> ลงทะเบียน</a>
                        </li>
                        @else
                            <li class="dropdown">
                                 <a href="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>