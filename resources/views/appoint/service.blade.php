@extends('template_nav')
@section('title','Appointment')
@section('content')

<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-2"></div>
  <div class="col-md-1">
          <a href="/services" class="btn btn-warning"><i class="fa fa-plus-square-o"></i> รายการบริการ</a>
</div>
</div>
<br>
  <div class="container">
    <div class="well">
       <!-- <a href="https://www.twitter.com/maridlcrmn/">Code snippet inspired by the Nike website. Made with love by @maridlcrmn for @bootsnipp. Enjoy and Share!</a>  --> 
       <div class="card card-container">
          <form method="post" action="/services" enctype="multipart/form-data">
          <div class="container">
           <div class="row">
                <div class="col-md-6">
          <legend>เพิ่มบริการ</legend>
          <div class="form-group">
          <label for="name_ser">ชื่อบริการ : <input type="text" name="name_ser" class="form-control" required></label>
          </div> 
          <div class="form-group">
          <label for="type">ประเภทบริการ : <input type="text" name="type" class="form-control" required></label>
          </div> 
          <div class="form-group" style="width:210px;">
          <label for="cost">ราคาของบริการ : <input type="number" name="cost" class="form-control" required></label>
          </div>
           <div class="form-group">
          <label for="picture">รูปภาพ : <input type="file" name="img" id= "img"  required></label>
          </div>
           
          </div>
          <br><br>
          <div class="col-md-6">
          <div class="form-group" style="width:230px;">
          <label for="sp_time">เวลาที่ใช้ : <input type="text" name="sp_time" class="form-control" required></label>
          </div> 
          <div class="form-group">
          <label for="detail">รายละเอียดบริการ :</label>
          <textarea name="detail" class="form-control"  style="width:80%;" rows="4" placeholder="Enter text here"></textarea>
          </div>
          {{csrf_field()}} 
          <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ
          </button> 
          </div>
     </div>
</div>
          </div>
          </form>

 </div>



    </div>
</div>
 <!-- <div class="card card-container">
          <form method="post" action="/services">
          <div class="container">
           <div class="row">
                <div class="col-md-6">
          <legend>เพิ่มบริการ</legend>
          <div class="form-group">
          <label for="name_ser">ชื่อบริการ : <input type="text" name="name_ser" class="form-control"></label>
          </div> 
          <div class="form-group">
          <label for="type">ประเภทบริการ : <input type="text" name="type" class="form-control"></label>
          </div> 
          <div class="form-group" style="width:230px;">
          <label for="cost">ราคาของบริการ : <input type="number" name="cost" class="form-control"></label>
          </div>
          </div>
          <br><br>
          <div class="col-md-6">
          <div class="form-group" style="width:230px;">
          <label for="sp_time">เวลาที่ใช้ : <input type="text" name="sp_time" class="form-control"></label>
          </div> 
          <div class="form-group">
          <label for="detail">รายละเอียดบริการ :</label>
          <textarea name="detail" class="form-control" rows="4" placeholder="Enter text here"></textarea>
          </div>
          {{csrf_field()}} 
          <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ
          </button> 
          </div>
     </div>
</div>
          </div>
          </form>

 </div>
 -->




<br>

@endsection