@extends('template_nav')
@section('title','Appointment')
@section('content')

<div class="row">
  <div class="col-md-3">
    <a href="/services" class="btn btn-success"><i class="fa fa-hand-o-left" ></i></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
</div>
<br>
 <div class="container">
    <div class="well">
         <h5>ลำดับบริการ :{{$service->id_ser}}</h5>
         <p>ชื่อบริการ : {{$service->name_ser}}</p>
         <p>ประเภทบริการ : {{$service->type}}</p>
         <p>ราคา : {{$service->cost}} ฿</p>
         <p>รายละเอียดบริการ : {{$service->detail}}</p>
    </div>
  </div>  
  
        
@endsection