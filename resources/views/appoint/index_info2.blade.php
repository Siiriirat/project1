<!-- index_info1.blade.php -->
<!-- index_info.blade.php -->
@extends('template_nav')
@section('title','Appointment')
@section('content')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-news.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-tab.css')}}">
  </head>
  <body>
<br><br><br><br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-2"></div>
<div class="col-md-1">
@if (Auth::user()->level == "admin")
    <a href="/add_news" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มข่าวสาร </a>
    <br>
@endif
</div>
</div>

<br>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
      
        
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div id="user-profile-2" class="user-profile">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-18">
                <li >
                    <a  href="/infos">
                        <i class="green ace-icon fa fa-user bigger-120"></i>
                        ข่าวสารทั้งหมด
                    </a>
                </li>

                <li>
                    <a href="/infos_1">
                        <i class="orange ace-icon fa fa-rss bigger-120"></i>
                        ข่าวสารทางร้าน
                    </a>
                </li>

                <li class="active">
                    <a href="/infos_2">
                        <i class="blue ace-icon fa fa-users bigger-120"></i>
                        ข่าวสารทั่วไป
                    </a>
                </li>
            </ul>


        </div>
    </div>
    <br>     
    </div>
</div>
        <div class="wraper">
            <div class="row">

                @foreach( $informations as  $index => $item )
                <div class="col-lg-12">
                                    <div class="panel panel-primary ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{{$item->topic_info}}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img class="img-responsive img-rounded" src="/uploads/images/news/{{$item->picture_info}}"  title="name">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="name">
                                <h4>หัวข้อข่าว : {{$item->topic_info}}</h4> 
                                </div>
                                <div class="description">
                                <?php
                                $details = str_limit(($item->detail_info), 200);
                                ?>
                                <p>{{$details}}</p>
                            </div>
                            <br>
                            <br><br><br>
                                <span class="label label-warning">
                                    ประเภทข่าวสาร : {{$item->type_info}}
                                </span>&nbsp;&nbsp;&nbsp;
                                <span class="label label-success">
                                    วันที่ลงข่าว : {{$item->date_info}}
                                </span>
                        
                            
                            <br><br><br>
                            
                                <br>
                                @if (Auth::user()->level == "admin")
                                    <form method="post" action="infos/{{$item->id_info}}" class="form-inline">

                                                <a href="infos/{{$item->id_info}}" class="btn btn-primary btn-sm"><font color="white"><i class="fa fa-eye"></i> อ่านต่อ</font> </a>
                                          
                                            
                                                <a href="infos/{{$item->id_info}}/edit" class="btn btn-warning btn-sm"><font color="white"><i class="fa fa-edit"></i> แก้ไข</font></a>
                                           
                                             
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="Delete">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบข่าวสารนี้ใช่หรือไม่ ?')"><font color="white"><i class="fa fa-trash"></i> ลบข่าวสาร </font></button> 
                                            
                                            
                                        
                                    </form>

                                                             
                                    
                                @else(Auth::user()->level == "user")
                                    <form method="post" action="infos/{{$item->id_info}}" class="form-inline">
                                       
                                                <a href="infos/{{$item->id_info}}" class="btn btn-primary btn-sm"><font color="white"><i class="fa fa-eye"></i> อ่านต่อ</font> </a>
                                            
                                           
                                    </form>
                                @endif
                               
                                                </div>
                                            </div>
                                             

                                              <br>
                                               
                                            </div>
                                        </div>
                                    </div>
                                
                    
                  </div>
                  @endforeach
                  </div>
              </div>
         

<center>
    {{ $informations->links() }}
</center>






@endsection