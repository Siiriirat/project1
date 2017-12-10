@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/picture.css')}}">
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
      <div class="row">
        <div class="col-md-6">
          <br>
          <center>
            <img src="/uploads/images/service/{{$service->picture}}" width="70%" class="img-responsive">   
          </center> 
        </div>
                <div class="col-sm-6">
                  <h2>ลำดับบริการ : {{$service->id_ser}} </h2>
                    <div class="box">
                  <b>{{$service->name_ser}}</b>
                    </div>
                    <div class="box">
                         <ul class="list-unstyled">
                          <li><i class="fa fa-list" aria-hidden="true"></i>ประเภทบริการ : {{$service->type}}</li>
                          <li><i class="fa fa-clock-o" aria-hidden="true"></i>เวลาที่ใช้ : {{$hour}} ชั่วโมง {{$min}} นาที</li>
                            <li><i class="fa fa-money" aria-hidden="true"></i>ราคา : {{$service->cost}} ฿</li>
                            @if($service->detail != NULL)
                            <li><i class="fa fa-comment"></i>รายละเอียด : {{$service->detail}}</li>
                            @endif

                        </ul>
                    </div>
                </div>
        </div>
      </div> 
    </div>
  </div>


  
        
@endsection