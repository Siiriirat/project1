@extends('layouts.app')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-regis.css')}}">
</head>
@section('content')
<br><br>
<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="card b-1 hover-shadow mb-50">
     <footer class="card-footer flexbox align-items-center">
            <div>
              <strong><font color = "white">ลงทะเบียน</font></strong> 
            </div>
            <div class="card-hover-show">
              

            </div>
        </footer>
        <div class="media card-body">
         
          
            <div class="col-md-12">
              {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อ :</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" style="width:250px;" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail :</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" style="width:250px;" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">รหัสผ่าน :</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" style="width:250px;" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">ยืนยันรหัสผ่าน :</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width:250px;" required>
                            </div>
                        </div>
              
            </div>
            
         
            
            
        </div>
        <footer class="card-footer flexbox align-items-center">
            <div>
               
            </div>
            <div class="card-hover-show">
             
                            <div class="col-md-8 col-md-offset-4">


                                <button type="submit" class="btn btn-primary btn btn-xs fs-15">
                                    ลงทะเบียน
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