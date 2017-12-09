@extends('template_nav')
@section('title','Appointment')
@section('content')
<div class="row">
  <div class="col-md-3">
    <a href="/services" class="btn btn-success "><i class="fa fa-hand-o-left" ></i></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-2"></div>
  <div class="col-md-1">
          <a href="/services" class="btn btn-warning"><i class="fa fa-plus-square-o"></i> รายการบริการ</a>
</div>
</div>

<br>
    <div class="well">
      <form method="post" action="/services/{{$service->id_ser}}" enctype="multipart/form-data">
          <legend>แก้ไขบริการ</legend>
          <div class="row">
            <div class="col-md-6">
          <div class="form-group">
          <label for="name_ser">ชื่อบริการ : <input type="text" name="name_ser" class="form-control" value="{{$service->name_ser}}"></label>
          </div> 
          <div class="form-group">
          <label for="type">ประเภทบริการ : <input type="text" name="type" class="form-control" value="{{$service->type}}"></label>
          </div> 
          <div class="form-group" style="width:210px;">
          <label for="cost">ราคาของบริการ : <input type="number" name="cost" class="form-control" value="{{$service->cost}}"></label>
          </div>
          <div class="form-group">
          <label for="picture">รูปภาพ : <input type="file" class="form-control" style="height:80%;" name="img" id= "img"></label>
          </div> 
          </div>
          <div class="col-md-6">
          <div class="form-group" style="width:230px;">
          <label for="sp_time">เวลาที่ใช้ : <input type="text" name="sp_time" class="form-control" value="{{$service->sp_time}}" required></label>
          </div> 
          <div class="form-group">
          <label for="detail">รายละเอียดบริการ :</label>
          <textarea name="detail" class="form-control" style="width:80%;" rows="4" placeholder="Enter text here">{{$service->detail}}</textarea>
          </div>
          <br>
          <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}  
         <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข
         </button>
            </div>
          </div>
       
        <br>
      </form>


</div>
</div>



<br>

@endsection