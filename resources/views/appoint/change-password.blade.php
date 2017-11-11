@extends('template_nav')
@section('content')

<br><br>

       <div class="col-xs-12 col-sm-6 col-md-8">
        <div class="container">
        <div class="well">
        <legend>Change Password</legend>
                @if (Session::has('success'))
                <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
                <form action="" method="post" role="form" class="form-horizontal">
                    {{csrf_field()}}
                        <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">รหัสผ่านเก่า :</label>
                            <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="old" style="width:250px;">
                                @if ($errors->has('old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">รหัสผ่านใหม่ :</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" style="width:250px;">
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">ยืนยันรหัสผ่าน :</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="width:250px;">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" style="width:225px;" class="btn btn-success form-control">Submit</button>
                            </div>
                        </div>
                  </form>
          </div>
       </div>
  </div>
@endsection
 