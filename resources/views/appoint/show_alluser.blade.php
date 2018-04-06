@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-show_alluser.css')}}">
@section('content')
<br><br><br><br>

<br>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippet">
    <div class="row">
    @foreach( $users as $item )
        <div class="col-md-4">
            <div class="widget-head-color-box lazur-bg p-lg text-center">
                <img src="/uploads/images/user/{{$item->picture_user}}" width="45%" class="img-circle circle-border m-b-md" alt="profile">
                <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    Name : {{$item->name}}
                </h2>
                </div>
            </div>
            <div class="widget-text-box">
                <p>E-mail : {{$item->email}}</p>
                @if($item->level =="admin")
                <p class="media-heading">Status : <span class="label label-danger">{{$item->level}}</span></p>
                @elseif($item->level =="user")
                <p class="media-heading">Status : <span class="label label-success">{{$item->level}}</span></p>
                @endif
                <p>ยอดการเข้าใช้บริการ :
                @for($i = 0 ; $i < count($amount) ; $i++ ) 
                @if($amount[$i]->user_id == $item->id)
                {{$amount[$i]->cnt}}
                @endif
                @endfor
                </p>
                <div class="text-right">
                    <form method="post" action="users/{{$item->id}}" class="form-inline">
                    <a href="show/{{$item->id}}/user" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> ดูรายละเอียด</a>
                    @if($item->name == Auth::user()->name )
                    <a class='btn btn-warning btn-xs' href="edit/{{$item->id}}/user"> <i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
                    @endif        
                    <input type="hidden" name="_method" value="Delete">
                    <button class="btn btn-danger btn-xs" onclick="return confirm('ท่านต้องการลบรายการบริการใช่หรือไม่ ?')"><i class="fa fa-trash"></i> ลบบริการ</button> 
                
                    {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div> 

    @endforeach   
  </div>
</div>
        
@endsection