@extends('layouts.app')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-login.css')}}">
</head>
@section('content')
<br><br><br><br>

<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="card b-1 hover-shadow mb-50">
     <footer class="card-footer flexbox align-items-center">
            <div>
              <strong><font color = "white">เข้าสู่ระบบ</font></strong> 
            </div>
            <div class="card-hover-show">
              

            </div>
        </footer>
        <div class="media card-body">
         
          
            <div class="col-md-12">
              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-Mail :</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">รหัสผ่าน :</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                 <form class="was-validated">
                                    <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">จดจำรหัสผ่าน</span>
                                    </label>
                            </div>
                        </div> 
                 
              
            </div>
            
         
            
            
        </div>
        <footer class="card-footer flexbox align-items-center">
            <div>
               
            </div>
            <div class="card-hover-show">
             
                            <div class="col-md-8 col-md-offset-4">

                                <button type="submit" class="btn btn-success btn btn-xs fs-15">
                                    เข้าสู่ระบบ
                                </button>
                               
                            </div>
                        

            </div>
        </footer>
    </div>

    <br>
</div>
<div class="col-md-4"></div>
</div>
</form>



@endsection