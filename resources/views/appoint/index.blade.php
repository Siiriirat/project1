@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="/dist/DateTimePicker.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-tab.css')}}">
</head>
@section('content')
<br><br><br>
<form action="{{url('/search')}}" method="post" >
{{csrf_field()}}
<div class="row">
<div class="col-md-3">
  @if ( !Auth::guest() )
	<a href="/appoint" class="btn btn-success"> <i class="fa fa-plus-circle"></i> เพิ่มรายการ </a>
	<br>
	@endif
</div>
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3">
<!-- <div class="form-inline">
<div class="form-group">
            <div class="input-append">
            	
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
</div> -->
</div>
</div>
</form>

@if (count($errors) > 0)
   
        <ul>
           
           <script>
            alert( "{{$errors}}");  
            </script>
        </ul>
    
@endif
@include('appoint.header') <br>
<?php
  $dates = DB::table('appoints')->select('date')->orderBy('date','asc')->where('staff',$name)->distinct()->get();
?>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#all">ทั้งหมด</a></li>
        @foreach($dates as $d)
        <li> 
          <a data-toggle="tab" href="#{{$d->date}}">
             <i class="red ace-icon fa fa-calendar bigger-120"></i>
                    {{$d->date}}                                   
          </a>      
        </li>
        @endforeach
  </ul>
@if(!Auth::guest())
  <div class="tab-content">
    <div id="all" class="tab-pane fade in active">

    @if (Auth::user()->level == "admin")
<form method="post" action="/selectdelete" >
         <div style="overflow-x:auto;">
          <table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>
             <center><button type="submit" formaction="/selectconfirm"  value="selectconfirm" class="btn btn-warning" onclick="return confirm('ยืนยันการแก้ไขข้อมูล ?')"><i class="fa fa-check-circle" aria-hidden="true"></i>
             </button></center>
           </th>
           <th>
           <center><button type="submit" value="selectdelete" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล ?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
           </button></center>
           </th>
           <th>ลำดับที่</th>
           <th>ชื่อผู้จอง</th>
           <th>วันที่จอง</th>
           <th>เวลาเริ่มต้น</th>
           <th>เวลาสิ้นสุด</th>
           <th>ช่างผู้ให้บริการ</th>
           <th>ตัวเลือก</th>
           </tr>
          </thead>
          <?php $count =0?>
    @foreach( $appointsall as  $index => $item )
    

    <tbody>
    <tr> 
      <td>
      <select name="confirmcheckbox_{{$item->id}}" style="width:125px;" class="form-control">
        @if($item->status == 0)
        <option value="0" selected>รอการตอบรับ</option>
        <option value="1" >ปฏิเสธ</option>
        <option value="2" >ยอมรับ</option>
        @elseif($item->status == 1)
        <option value="0">รอการตอบรับ</option>
        <option value="1" selected>ปฏิเสธ</option>
        <option value="2" >ยอมรับ</option>
        @elseif($item->status == 2)
        <option value="0">รอการตอบรับ</option>
        <option value="1" >ปฏิเสธ</option>
        <option value="2" selected>ยอมรับ</option>
        @endif
      </select> 
      </td>
    <td>
      <center>
            <input name="appointscheckbox[]" class="btn btn-lg btn-primary btn-block" value="{{$item->id}}" type="checkbox" >
      </center>
    </td>      
    <td>{{$NUM_PAGE*($page-1) + $index+1}}</td>
    <td>{{$item->user()->get()[0]->name}}</td>
    <td>{{$item->date}}</td>
    <td>{{$item->time}}</td>
    <td>{{$item->time_e}}</td>
    <td>{{$item->staff}}</td>
    @can('show',$item)
      <form method="post" action="/appoints/{{$item->id}}" class="form-inline">
        <td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
        @if($item->status == 0 || $item->status == 2)
        <a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
        @endif
        <input type="hidden" name="_method" value="Delete">
        
        <button formaction="/appoints/{{$item->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash"></i> ลบรายการ</button> </td>
        {{csrf_field()}}
        
      </form>
    @endcan
      </tr>
      </tbody>
   
    @endforeach
  </table>
</div>
</form>



@elseif (Auth::user()->level == "user")

        <div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           
           <th>ลำดับที่</th>
           <th>ชื่อบริการ</th>
           <th>ช่างผู้ให้บริการ</th>
           <th>วันที่จอง</th>
           <th>เวลาเริ่มต้น</th>
           <th>เวลาสิ้นสุด</th>
           <th>ชื่อผู้จอง</th>
           <th>ราคารวม</th>
           <th>การตอบรับ</th>
           <th>ตัวเลือก</th>
           </tr>
          </thead>
          <?php $count =0?>
    @foreach( $appoints as  $index => $item )
   
 <tbody>
        <tr> 
    
    <td>{{$NUM_PAGE*($page-1) + $index+1}}</td>
    <td><?php 
    echo (DB::table('services')->where('id_ser',$item->id_ser)->value('name_ser'));
    ?></td>
    <td>{{$item->staff}}</td>
    <td>{{$item->date}}</td>
    <td>{{$item->time}}</td>
    <td>{{$item->time_e}}</td>
    <td>{{$item->user()->get()[0]->name}}</td>  
    <td><?php 
    echo (DB::table('services')->where('id_ser',$item->id_ser)->value('cost'));
    ?></td>
    <td>
      @if($item->status == 0)
      <span class="label label-warning">
      <i class="fa fa-refresh" aria-hidden="true"></i> รอการอนุมัติ
      </span>
      @elseif($item->status == 1)
      <span class="label label-danger">
      <i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ!
      </span>
      @elseif($item->status == 2)
      <span class="label label-success">
      <i class="fa fa-check" aria-hidden="true"></i> อนุมัติ
      </span>
      @endif
    </td>
    @can('show',$item)
      <form method="post" action="/appoints/{{$item->id}}" class="form-inline">
        <td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
        @if($item->status == 0 || $item->status == 2)
        <a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
        @endif
        <input type="hidden" name="_method" value="Delete">
        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash"></i> ลบรายการ</button> </td>
        {{csrf_field()}}
      </form>
    @endcan
      
      </tr>
      </tbody>

    @endforeach
  </table>
</div>


@endif
{{ $appointsall->links() }}
</div>

@foreach($dates as $d)
<div id="{{$d->date}}" class="tab-pane fade"> 
@if (Auth::user()->level == "admin")
<form method="post" action="/selectdelete" >
         <div style="overflow-x:auto;">
          <table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>
             <center><button type="submit" formaction="/selectconfirm"  value="selectconfirm" class="btn btn-warning" onclick="return confirm('ยืนยันการแก้ไขข้อมูล ?')"><i class="fa fa-check-circle" aria-hidden="true"></i>
             </button></center>
           </th>
           <th>
           <center><button type="submit" value="selectdelete" class="btn btn-danger" onclick="return confirm('ยืนยันการลบข้อมูล ?')"><i class="fa fa-trash-o" aria-hidden="true"></i>
           </button></center>
           </th>
           <th>ลำดับที่</th>
           <th>ชื่อผู้จอง</th>
           <th>วันที่จอง</th>
           <th>เวลาเริ่มต้น</th>
           <th>เวลาสิ้นสุด</th>
           
           <th>ตัวเลือก</th>
           </tr>
          </thead>
          <?php $count =0?>
    @foreach( $appoints as  $index => $item )
    @if($item->date == $d->date)
    <?php $count++ ?>

    <tbody>
    <tr> 
      <td>
      <select name="confirmcheckbox_{{$item->id}}" style="width:125px;" class="form-control">
        @if($item->status == 0)
        <option value="0" selected>รอการตอบรับ</option>
        <option value="1" >ปฏิเสธ</option>
        <option value="2" >ยอมรับ</option>
        @elseif($item->status == 1)
        <option value="0">รอการตอบรับ</option>
        <option value="1" selected>ปฏิเสธ</option>
        <option value="2" >ยอมรับ</option>
        @elseif($item->status == 2)
        <option value="0">รอการตอบรับ</option>
        <option value="1" >ปฏิเสธ</option>
        <option value="2" selected>ยอมรับ</option>
        @endif
      </select> 
      </td>
    <td>
      <center>
            <input name="appointscheckbox[]" class="btn btn-lg btn-primary btn-block" value="{{$item->id}}" type="checkbox" >
      </center>
    </td>      
    <td><?php echo $count; ?></td>
    <td>{{$item->user()->get()[0]->name}}</td>
    <td>{{$item->date}}</td>
    <td>{{$item->time}}</td>
    <td>{{$item->time_e}}</td>
   
    @can('show',$item)
      <form method="post" action="/appoints/{{$item->id}}" class="form-inline">
        <td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
        @if($item->status == 0 || $item->status == 2)
        <a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
        @endif
        <input type="hidden" name="_method" value="Delete">
        <button formaction="/appoints/{{$item->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash"></i> ลบรายการ</button> </td>
        {{csrf_field()}}
      </form>
    @endcan
      </tr>
      </tbody>
    @endif
    @endforeach
  </table>
</div>
</form>



@elseif (Auth::user()->level == "user")

        <div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           
           <th>ลำดับที่</th>
           <th>ชื่อบริการ</th>
           
           <th>วันที่จอง</th>
           <th>เวลาเริ่มต้น</th>
           <th>เวลาสิ้นสุด</th>
           <th>ชื่อผู้จอง</th>
           <th>ราคารวม</th>
           <th>การตอบรับ</th>
           <th>ตัวเลือก</th>
           </tr>
          </thead>
          <?php $count =0?>
    @foreach( $appoints as  $index => $item )
    @if($item->date == $d->date)
    <?php $count++ ?>
 <tbody>
        <tr> 
    
    <td><?php echo $count; ?></td>
    <td><?php 
    echo (DB::table('services')->where('id_ser',$item->id_ser)->value('name_ser'));
    ?></td>
    
    <td>{{$item->date}}</td>
    <td>{{$item->time}}</td>
    <td>{{$item->time_e}}</td>
    <td>{{$item->user()->get()[0]->name}}</td>  
    <td><?php 
    echo (DB::table('services')->where('id_ser',$item->id_ser)->value('cost'));
    ?></td>
    <td>
      @if($item->status == 0)
      <span class="label label-warning">
      <i class="fa fa-refresh" aria-hidden="true"></i> รอการอนุมัติ
      </span>
      @elseif($item->status == 1)
      <span class="label label-danger">
      <i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ!
      </span>
      @elseif($item->status == 2)
      <span class="label label-success">
      <i class="fa fa-check" aria-hidden="true"></i> อนุมัติ
      </span>
      @endif
    </td>
    @can('show',$item)
      <form method="post" action="/appoints/{{$item->id}}" class="form-inline">
        <td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
        @if($item->status == 0 || $item->status == 2)
        <a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
        @endif
        <input type="hidden" name="_method" value="Delete">
        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-trash"></i> ลบรายการ</button> </td>
        {{csrf_field()}}
      </form>
    @endcan
      
      </tr>
      </tbody>

    @endif
    @endforeach
  </table>
</div>


@endif
</div>
@endforeach
</div>
@endif


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
<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>

@endsection