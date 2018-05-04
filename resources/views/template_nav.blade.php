<!DOCTYPE html>
<html>
<head>
  <title> @yield('title') </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0-alpha/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0-alpha/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome-min.css">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap-min.css">
<!--   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-navbar1.css')}}">
<!--   <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-news.css')}}">
 -->  
<!--   <script type="text/javascript" src="{{url('js/navbar.js')}}"></script>
 -->  
 <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
  </script>
</head>
<body>
@if(!Auth::guest())
   <nav style="margin-bottom: -20px;" class="navbar navbar-webmaster navbar-fixed-top ">
    <div class="container">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="{{url('/home1')}}">
          <img src="/image/icon2.png" width="30" height="30" class="d-inline-block align-top" alt=""> Appointment
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="{{url('/home1')}}"><i class="fa fa-home"></i> หน้าหลัก<span class="sr-only"></span></a>
        </li>
        @if (Auth::user()->level == "admin")
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-newspaper-o"></i> ข่าวสาร <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/add_news')}}"><i class="fa fa-plus"></i> เพิ่มข่าวสาร</a></li>
            <li><a href="{{url('/infos')}}"><i class="fa fa-th-list"></i> ข่าวสารทั้งหมด</a></li>
          </ul>
        </li>
        @else
            <li><a href="{{url('/infos')}}"><i class="fa fa-newspaper-o"></i> ข่าวสาร</a></li>
        @endif
        @if (Auth::user()->level == "admin")
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-th-list"></i> รายการบริการ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/service')}}"><i class="fa fa-plus"></i> เพิ่มรายการบริการ</a></li>
            <li><a href="{{url('/services')}}"><i class="fa fa-th-list"></i> รายการบริการทั้งหมด</a></li>
          </ul>
        </li>
        @else
            <li><a href="{{url('/services')}}"><i class="fa fa-th-list"></i> รายการบริการทั้งหมด</a></li>
        @endif
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar-plus-o"></i> จองคิวบริการ <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/appoint')}}"><i class="fa fa-plus"></i> เพิ่มรายการจองคิวบริการ</a></li>
            @if (Auth::user()->level == "user")
            <li><a href="{{url('/index_1')}}"><i class="fa fa-calendar-plus-o"></i> ตารางการจองคิวบริการ</a></li>
            @endif
            <li><a href="{{url('/appoints')}}"><i class="fa fa-calendar-plus-o"></i> ตารางการจองคิวบริการทั้งหมด</a></li>
           
          </ul>
        </li>
        <li class="active">
          <a href="{{url('/contact')}}"><i class="fa fa-newspaper-o"></i> ติดต่อเรา</a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            &nbsp<i class="fa fa-power-off"></i> ออกจากระบบ
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
            </li>
            <li><a href="{{url('/change-password')}}">&nbsp<i class="fa fa-cog "></i> เปลี่ยนรหัสผ่านผู้ใช้</a></li>
            @if(Auth::user()->level == "admin")
            <li><a href="{{url('/showalluser')}}">&nbsp<i class="fa fa-users"></i> ข้อมูลผู้ใช้ทั้งหมด</a></li>
            @endif
            <li><a href="{{url('/profile')}}">&nbsp<i class="fa fa-users"></i> ข้อมูลส่วนตัวผู้ใช้</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


        <!--  <div class="container">
    <div class="well">
       <a href="https://www.twitter.com/maridlcrmn/">Code snippet inspired by the Nike website. Made with love by @maridlcrmn for @bootsnipp. Enjoy and Share!</a>  
  


    </div>
</div> -->
<div class="container">
  @section('content') 
  @show
</div>
<!--     <script src="{{ asset('js/navbar1.js') }}"></script>
 -->    
<!--     <script src="{{ asset('js/news.js') }}"></script>
 -->    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 @endif
</body>
</html>