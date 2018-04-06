<!-- edit_user.blade.php -->
@extends('template_nav')
@section('title','Appointment')
@section('content')
<br><br><br><br>


<br>
 <div class="wraper">
            <div class="row">
              <form method="post" action="/users/{{$user->id_ser}}" enctype="multipart/form-data">
                <div class="col-lg-12">
                                    <div class="panel panel-warning ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                              <div class="row">
                                                <div class="col-md-6">
                                                 <div class="form-group">
                                                  <label for="name">ชื่อ : <input type="text" name="name" class="form-control" value="{{$user->name}}"></label>
                                                 </div> 
                                                 <div class="form-group">
                                                 <label for="password">รหัสผ่าน : <input type="password" name="password" class="form-control" value="{{$user->password}}"></label>
                                                 </div> 
                                                 
                                                 <div class="form-group">
                                                 <label for="picture_user">รูปภาพ : <input type="file" style="height:80%;" name="img" id= "img"></label>
                                                 </div> 
                                                 </div>
                                                 <div class="col-md-6">
                                                 <div class="form-group" style="width:210px;">
                                                 <label for="cost">สถานะ : <input type="text" name="level" class="form-control" value="{{$user->level}}"></label>
                                                 </div>
                                                 
                                                 <div class="form-group" style="width:230px;">
                                                 <label for="sp_time">การเข้าให้บริการ : <input type="text" name="status" class="form-control" value="{{$user->status_user}}" required></label>
                                                 </div> 
                                                 
                                           <br>
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}  
         <button type="submit" class="btn btn-warning" onclick="return confirm('ท่านต้องการแก้ไขบริการใช่หรือไม่ ?')"><i class="fa fa-edit"></i> แก้ไข
         </button>
            </div>
          </div>
                                             

                                              <br>
                                               
                                            </div>
                                        </div>
                                    </div>
                                
                    
                    </div>
                  </form>
                </div>
              </div>



<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>

<br>

@endsection