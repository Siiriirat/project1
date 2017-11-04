@extends('template')
@section('title','Appointment')
@section('content')
<br><br>
<div align="right">
          <a href="/services" class="btn btn-warning"><i class="fa fa-plus-square-o" aria-hidden="true"></i> รายการบริการ</a>
</div>
<br>
 <div class="card card-container">
          <form method="post" action="/services">
          <div class="container">
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
          </form>

 </div>





<br>

@endsection