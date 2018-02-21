@extends('template_nav')
@section('title','Appointment')
@section('content')
<br><br><br><br>
<div class="row">
  <div class="col-md-3">
    <a href="/appoints" class="btn btn-success"><i class="fa fa-hand-o-left" ></i></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
</div>
<br>
 <div class="container">
    <div class="well">
         <h5>{{$appoint->user_id}} {{ Auth::user()->name}}</h5>
         <p>เบอร์โทรศัพท์ : {{$appoint->tel}}</p>
         <p>เพศ : {{$appoint->gender}}</p>
         <p>บริการ : <?php 
          echo (DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser'));
         ?>
          </p>
         <p>วันและเวลาที่จอง : {{$appoint->date}} : {{$appoint->time}} - {{$appoint->time_e}} น. </p>
         <p>ช่างผู้ให้บริการ : {{$appoint->staff}}</p>
         @if ($appoint->detail == "NULL")
         <p>รายละเอียดเพิ่มเติม : </p>
         @else
         <p>รายละเอียดเพิ่มเติม : {{$appoint->detail}}</p>
         @endif
          </p>
    </div>
  </div>
         
@endsection