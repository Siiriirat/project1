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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<br>
<br>
<br>
<div class="col-md-12">
    <div class="card b-1 hover-shadow mb-20">
      <footer class="card-footer flexbox align-items-center">
            <div>
                
            </div>
            <div class="card-hover-show">
               <div class="card-hover-show">
                @if($service->type == "หน้า")
                <a class="btn btn-xs fs-10 btn-bold btn-info" href="#">ประเภทบริการ : {{$service->type}}</a>
                @elseif($service->type == "ผม")
                <a class="btn btn-xs fs-10 btn-bold btn-warning" href="#">ประเภทบริการ : {{$service->type}}</a>
                @elseif($service->type == "เล็บ")
                <a class="btn btn-xs fs-10 btn-bold btn-success" href="#">ประเภทบริการ : {{$service->type}}</a>
                @endif
            </div> 
            </div>
        </footer>
        <div class="media card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="media-left pr-12">
                <center>
                  
                  <img src="/uploads/images/service/{{$service->picture}}" width="70%" class="img-responsive img-rounded">
                </center>
                 
              </div>
            </div>
            <div class="col-md-6">
              <div class="media-left pr-12">
                 
                    <div class="box">
                  <b>ชื่อบริการ : {{$service->name_ser}}</b>
                    </div>
                    <div class="box">
                         <ul class="list-unstyled">
                          
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
        <footer class="card-footer flexbox align-items-center">
            <div>
                
            </div>
            
        </footer>
    </div>

    <br>
</div>



@endsection