@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/picture.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-list.css')}}">
@section('content')
<br><br><br><br>
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



  
  <div class="row bootstrap snippets" id="property-list">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                        <a href="#"><img src="/uploads/images/service/{{$service->picture}}" width="70%" class="img-responsive"></a>
                    </div>
                    <div class="col-md-7">
                        <h4 class="title-real-estates">
                            <strong><a href="#">Property 1</a></strong> <span class="pull-right">$12,990</span>
                        </h4>
                        <hr>
                        <p>Iki kie mung omah lodong dadiine rodo murah tur yo ra awet wong karang mung murah, nek pingin awet yo tuku omah-omahan wae sing ra iso rusak.</p>
                        <p><span class="label label-danger">1,292 SqFt</span> | <span class="label label-danger">3 Beds</span> | <span class="label label-danger">4 Baths</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
 
</div>
@endsection