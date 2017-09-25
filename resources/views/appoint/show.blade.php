@extends('template1')
@section('title','Appointment')
@section('content')
<br>
<a href="/appoints" class="btn btn-outline-success"><img src="/image/return.png" width="30" height="30"> </a>
<br><br>
<div class="col align-start">
       <div class="card" style="width: 20rem;">
          <div class="card-body">
          <p class="card-text">
         <h5>{{$appoint->user_id}} {{ Auth::user()->name}}</h5>
         <p>เบอร์โทรศัพท์ : {{$appoint->tel}}</p>
         <p>เพศ : {{$appoint->gender}}</p>
         <p>บริการ : {{$appoint->service}}</p>
         <p>วันและเวลาที่จอง : {{$appoint->date}} : {{$appoint->time}}</p>
         <p>ช่างผู้ให้บริการ : {{$appoint->staff}}</p>
         @if ($appoint->detail == "NULL")
         <p>รายละเอียดเพิ่มเติม : </p>
         @else
         <p>รายละเอียดเพิ่มเติม : {{$appoint->detail}}</p>
         @endif

          </p>
  
          </div>
       </div>
    </div>


         
@endsection