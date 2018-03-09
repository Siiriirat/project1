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
                <img src="https://bootdey.com/img/Content/user_3.jpg" class="img-circle circle-border m-b-md" alt="profile">
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
                <p class="media-heading">Status : <span class="label label-info">{{$item->level}}</span></p>
                @endif
                <p>ยอดการเข้าใช้งาน :</p>
                <div class="text-right">
                    <a class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>
                    <a class="btn btn-xs btn-danger"><i class="fa fa fa-trash"></i> ลบ</a>
                </div>
            </div>
        </div>
    @endforeach   
  </div>
</div>
        
@endsection