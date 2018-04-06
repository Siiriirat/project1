@extends('template_nav')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-change.css')}}">
</head>
@section('content')

<br><br><br><br><br><br><br><br>

<form action="/change-password" method="post" role="form" class="form-horizontal">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card b-1 hover-shadow mb-50">
     <footer class="card-footer flexbox align-items-center">
            <div>
              <strong><font color = "white">เปลี่ยนรหัสผ่าน</font></strong> 
            </div>
            <div class="card-hover-show">
              

            </div>
        </footer>
        <div class="media card-body">
         
          
            <div class="col-md-12">
              {{ csrf_field() }}
                 @if (Session::has('success'))
                <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
                
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
              
            </div>
            
         
            
            
        </div>
        <footer class="card-footer flexbox align-items-center">
            <div>
               
            </div>
            <div class="card-hover-show">
             
                            <div class="col-md-8 col-md-offset-4">


                                <button type="submit" class="btn btn-danger btn btn-xs fs-15" onclick="return confirm('แน่ใจหรือไม่ว่าจะเปลี่ยนรหัสผ่าน ?')">
                                    เปลี่ยนรหัสผ่าน
                                </button>
                               
                            </div>
                        

            </div>
        </footer>
    </div>

    <br>
</div>
<div class="col-md-3"></div>
</div>
</form>

<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>


@endsection