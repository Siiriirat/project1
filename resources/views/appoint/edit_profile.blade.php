<!-- edit_profile.blade.php -->
@extends('template_nav')
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-change.css')}}">
</head>
@section('content')
<br><br><br><br><br><br>
<form action="/edit_profile" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-1"></div>
<div class="col-md-10">
    <div class="card b-1 hover-shadow mb-50">
     <footer class="card-footer flexbox align-items-center">
            <div>
              <strong><font color = "white">แก้ไขข้อมูลส่วนตัว</font></strong> 
            </div>
            <div class="card-hover-show">
            </div>
        </footer>
        <center>
            <br><br>
            <img src="/uploads/images/user/{{$user->picture_user}}"  class="img-circle img-responsive img-user" alt="" style="width: 20%">

        </center>
        <div class="media card-body">
            <div class="col-md-12">
              {{ csrf_field() }}
                    <div class="row">   
                        <div class="col-md-6">
                           <div class="form-group">
                            <label for="password" class="col-md-4 control-label">ชื่อ :</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" style="width:250px;" value="{{$user->name}}" required> 
                            </div>
                           </div>
                            <div class="form-group">
                              <label for="picture_user" class="col-md-4 control-label">รูปภาพ : </label>
                               <div class="col-md-6">
                                <input type="file" style="height:80%;" name="img" id= "img" value="{{$user->picture_user}}" >
                               </div> 
                            </div> 
                        </div>
                        <div class="col-md-6">
                        	 					@if($user->level == "admin")
                                                <div class="form-group">
                                                <label for="level" class="col-md-4 control-label">สถานะผู้ใช้ : </label>
                                                <div class="col-md-6">
                                                    <select  name="level" id="level" class="form-control" style="width:250px;" required>
                                                    @if($user->level == "admin")
                                                        <option value="admin" selected>Admin</option>
                                                    @else
                                                        <option value="admin">Admin</option>
                                                    @endif
                                                    @if($user->level == "user")
                                                        <option value="user" selected>Member</option>
                                                    @else
                                                        <option value="user">Member</option>
                                                    @endif
                                                    </select>
                                                </div>
                                                </div>
                                                @else
                                                <div class="form-group">
                            						<label for="level" class="col-md-4 control-label">สถานะ :</label>
                           							<div class="col-md-6">
                            						<input id="level" type="text" class="form-control" name="level" style="width:250px;" value="{{$user->level}}" disabled>
                            						</div>
                          						 </div>
                                                @endif

												@if($user->level == "admin")
                                                <div class="form-group">
                                                <label for="status_user" class="col-md-4 control-label">การเข้าให้บริการ : </label>
                                                <div class="col-md-6">
                                                    <select  name="status_user" id="status_user" class="form-control" style="width:250px;" required>
                                                    @if($user->status_user == "present")
                                                        <option value="present" selected>มาทำงาน</option>
                                                    @else
                                                        <option value="present">มาทำงาน</option>
                                                    @endif
                                                    @if($user->status_user == "absent")
                                                        <option value="absent" selected>ไม่มาทำงาน</option>
                                                    @else
                                                        <option value="absent">ไม่มาทำงาน</option>
                                                    @endif
                                                    </select>

                                                </div>
                                                </div> 
                                                @else
                                                    <input type="hidden" name="status_user" value="{{$user->status_user}}">
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
                                    
                              
                                <button type="submit" class="btn btn-danger btn btn-xs fs-15" onclick="return confirm('แน่ใจหรือไม่ว่าต้องการจะแก้ไขข้อมูล ?')">
                                   แก้ไขข้อมูลส่วนตัว
                                </button>
                               
                            </div>
                        

            </div>
        </footer>
    </div>

    <br>
</div>
<div class="col-md-1"></div>
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
