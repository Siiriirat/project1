<!-- show_profile.blade.php -->
@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/picture.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-list.css')}}">
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="card b-1 hover-shadow mb-20">
      <footer class="card-footer flexbox align-items-center">
            <div>
            	<a class='btn btn-info btn-sm'> <i class="fa fa-user"></i> ข้อมูลส่วนตัว</a>
                  
            </div>
           
        </footer>
        <div class="media card-body">
          <div class="row">
            <div class="col-md-4">
              
                <center>
                  
                  <img src="/uploads/images/user/{{$user->picture_user}}" width="70%" class="img-responsive img-rounded">
                </center>
                 
              
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
            
                 
                    <div class="box">
                    <b>ชื่อผู้ใช้งาน : {{$user->name}}</b>
                    </div>
                    <div class="box">
                         <ul class="list-unstyled">
                          
                            <li><i class="fa fa-envelope" aria-hidden="true"></i>Email : {{$user->email}} </li>
                            <li><i class="fa fa-user" aria-hidden="true"></i>สถานะผู้ใช้ : {{$user->level}} </li>
                            

                        </ul>
                    </div>
              
            </div>
            
          </div>
            
            
        </div>
        <footer class="card-footer flexbox align-items-center">
            <div>
               
            </div>   
            <div class="card-hover-show">
               <div class="card-hover-show">
                <a class='btn btn-success btn-xs' href="/edit/{{$user->id}}/user"> <i class="fa fa-edit"></i> เปลี่ยนแปลงข้อมูล</a>        
				{{csrf_field()}}
            </div>     
                    
                    
                  
            
            
        </footer>
    </div>

    <br>
</div>

<div class="col-md-2"></div>
</div>
@endsection