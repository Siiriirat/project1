@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
    <div class="well">
        <legend>เข้าสู่ระบบ</legend>
             <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail :</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">รหัสผ่าน :</label>
                            <div class="col-md-4">
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
          <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    เข้าสู่ระบบ
                                </button>

                                <a class="btn btn-danger" href="{{ route('password.request') }}">
                                    ลืมรหัสผ่าน ?
                                </a>
                            </div>
                        </div>
         
                    </form>
                </div>
            </div>

@endsection