@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="/dist/DateTimePicker.css" rel="stylesheet"/>
</head>
@section('content')

<form action="{{url('/search')}}" method="post" >
{{csrf_field()}}
<div class="row">
<div class="col-md-3">@if ( !Auth::guest() )
	<a href="appoint" class="btn btn-success"> <i class="fa fa-plus-circle"></i> เพิ่มรายการ </a>
	<br>
	
@endif</div>
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

@if (Auth::user()->level == "admin")
<div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>ลำดับที่</th>
           <th>ชื่อผู้จอง</th>
           <th>วันที่จอง</th>
		   <th>เวลาเริ่มต้น</th>
           <th>เวลาสิ้นสุด</th>
           <th>ช่างผู้ให้บริการ</th>
           <th>ตัวเลือก</th>
           </tr>
          </thead>
@foreach( $appoints as  $index => $item )
		<tbody>
        <tr> 
		<td>{{$NUM_PAGE*($page-1) + $index+1}}</td>
		<td>{{$item->user()->get()[0]->name}}</td>
		<td>{{$item->date}}</td>
		<td>{{$item->time}}</td>
		<td>{{$item->time_e}}</td>
		<td>{{$item->staff}}</td>
		@can('show',$item)
			<form method="post" action="/appoints/{{$item->id}}" class="form-inline">
				<td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
				<a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	    </tr>
      </tbody>
@endforeach
</table>
</div>
@else
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
			 <font color="orange"><i class="fa fa-refresh fa-spin fa-1x fa-fw" aria-hidden="true"></i> รอการอนุมัติ</font> 
			@elseif($item->status == 1)
			 <font color="red"><i class="fa fa-times" aria-hidden="true"></i> ไม่อนุมัติ!</font> 
			@elseif($item->status == 2)
			 <font color="green"><i class="fa fa-check" aria-hidden="true"></i> อนุมัติ</font> 

			@endif
		</td>
		@can('show',$item)
			<form method="post" action="/appoints/{{$item->id}}" class="form-inline">
				<td><a href="/appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
				<a href="/appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	    
	    </tr>
      </tbody>

@endforeach
</table>
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
{{ $appoints->links() }}




@endsection