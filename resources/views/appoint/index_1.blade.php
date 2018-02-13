@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="/dist/DateTimePicker.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/test.css')}}">
</head>
@section('content')

<form action="{{url('/searchs')}}" method="post" >
{{csrf_field()}}
<div class="row">
<div class="col-md-3"><!-- @if ( !Auth::guest() )
  <a href="appoint" class="btn btn-success"> <i class="fa fa-plus-circle"></i> เพิ่มรายการ </a>

@endif --></div>
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3">
<div class="form-inline">
<div class="form-group">
            <div class="input-append">
            	<!-- <input type="text" id="name" name ="name" style="width:220px;" data-field="date" class="form-control" placeholder="ค้นหาวันที่ใช้บริการ"/> -->
                <input type="text" name="name" id="name" class="search-query form-control" data-field="date" placeholder="ค้นหาวันที่ใช้บริการ" >
                <button type="submit" class="btn"><i class="fa fa-search"></i> ค้นหา</button>
            </div>
          <div id="dtBox"></div>
          <script src="/js/jquery1.min.js"></script>
          <script src="/dist/DateTimePicker.js"></script>
          <script src="/dist/i18n/DateTimePicker-i18n.js"></script>
          <script>
          $('#dtBox').DateTimePicker({
             dateTimeFormat: "yyyy-mm-dd hh:mm:ss"
          });
          </script>
</div>
</div>
</div>
</div>
</form>
<br>





<div class="col-md-12">  
    <div class="col-md-4">      
        <div class="portlet light profile-sidebar-portlet bordered">
            <div class="profile-userpic">
              <center>
                 <img src="https://bootdey.com/img/Content/avatar/avatar1.png" style="width: 90%"; alt=""> 
              </center>
               </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">{{Auth::user()->name}}</div>
                <div class="profile-usertitle-job"> {{Auth::user()->level}} 
             


                </div>
            </div>
           <!--  <div class="profile-userbuttons">
                <button type="button" class="btn btn-success  btn-sm">ตั้งค่าผู้ใช้</button>
                <button type="button" class="btn btn-info  btn-sm">Message</button>
            </div> -->
            <div class="profile-usermenu">
                <ul class="nav">
                    <li class="active">
                      @if ( !Auth::guest() )
                        <a href="/appoint">
                            <i class="fa fa-plus-circle"></i> เพิ่มรายการบริการ </a>
                     @endif
                    </li>
                    <li class="active">
                        <a href="{{url('/appoints')}}">
                          <i class="fa fa-calendar-plus-o"></i> ตารางการเข้าใช้บริการ </a>
                    
                    </li>
                   
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8"> 
        <div class="portlet light bordered">
            <div class="portlet-title tabbable-line">
                <div class="caption caption-md">
                    <i class="icon-globe theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase"><h4
                  ><b><i class="fa fa-th-list"></i> รายการจองคิวบริการ</b></h4></span>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อบริการ</th>
                            <th><center>วันที่จอง</center></th>
                            <th>ผู้ให้บริการ</th>
                            <th><center>ตัวเลือก</center></th>
                        </tr>
                    </thead>
                    @foreach( $show as  $index => $item )
                    <tbody>
                        <tr class="active">
                            <td>{{$NUM_PAGE*($page-1) + $index+1}}</td>
                            <td><?php 
                            echo (DB::table('services')->where('id_ser',$item->id_ser)->value('name_ser'));
                            ?></td>
                            <td>{{$item->date}} {{$item->time}} - {{$item->time_e}}</td>
                            <td><center>{{$item->staff}}</center></td>
                            @can('show',$item)
                              <form method="post" action="/appoints/{{$item->id}}" class="form-inline">
                               <td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
                               <a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
                               <input type="hidden" name="_method" value="Delete">
                              <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-ban"></i> ลบบริการ</button> </td>
                               {{csrf_field()}}
                              </form>
                            @endcan
                        </tr>
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>



<script>
      $('.clockpicker').clockpicker({
        'default': DisplayCurrentTime(),
         twelvehour: true,
        }).find('input').val(DisplayCurrentTime())

function DisplayCurrentTime() {
  var date = new Date();
  var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
  var am_pm = date.getHours() >= 12 ? "PM" : "AM";
  hours = hours < 10 ? "0" + hours : hours;
  var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
  var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
  time = hours + ":" + minutes + ":" + am_pm;
  //time = hours + ":" + minutes + am_pm;
  return time;
};
</script>
{{ $show->links() }}

@endsection