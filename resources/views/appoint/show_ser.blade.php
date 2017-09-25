@extends('template1')
@section('title','Appointment')
@section('content')
<br>
<a href="/services" class="btn btn-outline-success"><img src="/image/return.png" width="30" height="30"> </a>
<br><br>
<div class="col align-start">
       <div class="card" style="width: 20rem;">
         
          <div class="card-body">
         <h5>ลำดับบริการ :{{$service->id_ser}}</h5>
         <p>ชื่อบริการ : {{$service->name_ser}}</p>
         <p>ประเภทบริการ : {{$service->type}}</p>
         <p>ราคา : {{$service->cost}} ฿</p>
         <p>รายละเอียดบริการ : {{$service->detail}}</p>
          <p class="card-text">
             
          </p>
          </div>
       </div>
    </div>
        
@endsection