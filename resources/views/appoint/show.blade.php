@extends('template_nav')
@section('title','Appointment')
<head>
  <link rel="stylesheet" type="text/css" href="{{asset('/css/picture.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-list.css')}}">
</head>
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
<br><br>
<div class="col-md-12">
    <div class="card b-1 hover-shadow mb-20">

        <div class="media card-body">
         
          <div class="row">
            <div class="col-md-6">
              <div class="media-left pr-12">
                <center>
                  <br><br>   
                  <?php $picture= DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->picture; ?>           
                   <img src="/uploads/images/service/{{$picture}}" width="90%" class="img-responsive img-rounded">
                </center>
                 
              </div>
            </div>
            <div class="col-md-6">
              <div class="media-left pr-12">
                 <br><br>
                    <div class="box">
                     <b>รายละเอียดการจอง</b>
                    </div>
                    <div class="box">
                         <ul class="list-unstyled">
                             <li><i class="fa fa-phone"></i>เบอร์โทรศัพท์ : {{$appoint->tel}}</li>
                             <li><i class="fa fa-transgender"></i>เพศ : {{$appoint->gender}}</li>
                             <li><i class="fa fa-list"></i>บริการ : <?php echo (DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser'));?></li>

                             <li><i class="fa fa-calendar"></i>วันและเวลาที่จอง : {{$appoint->date}} : {{$appoint->time}} - {{$appoint->time_e}} น. </li>
                             <li><i class="fa fa-user"></i>ช่างผู้ให้บริการ : {{$appoint->staff}}</li>
                             
                             @if ($appoint->detail == "NULL")
                             <li>
                             <i class="fa fa-list-ul"></i>รายละเอียดเพิ่มเติม : -
                             </li>
                             @else
                             <li>
                             <i class="fa fa-list-ul"></i>รายละเอียดเพิ่มเติม : {{$appoint->detail}}
                             </li>
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
            <div class="card-hover-show">
              <a class="btn btn-xs fs-10 btn-bold btn-default" href="#"><i class="fa fa-user"></i> ชื่อผู้จอง : {{ Auth::user()->name}}</a>
             
                <?php if( DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type== "หน้า") {?>  
                <a class="btn btn-xs fs-10 btn-bold btn-info" href="#">ประเภทบริการ : 
                  <?php echo  DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type; ?></a>
                <?php }else if( DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type== "ผม") {?>  
                <a class="btn btn-xs fs-10 btn-bold btn-warning" href="#">ประเภทบริการ : <?php echo DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type; ?></a>
                 <?php }else if( DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type== "เล็บ") {?>  
                <a class="btn btn-xs fs-10 btn-bold btn-success" href="#">ประเภทบริการ : <?php echo DB::table('services')->where('id_ser',$appoint->id_ser)->get()[0]->type; ?></a>
              <?php } ?> 
            </div>
        </footer>
    </div>

    <br>
</div>
         




@endsection