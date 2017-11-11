@extends('template_nav')
@section('title','Appointment')
@section('content')
<br>
<div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>ลำดับที่</th>
           <th>ชื่อบริการ</th>
           <th>ชนิดบริการ</th>
           <th>ราคาของบริการ</th>
           <th>เวลาที่ใช้ (ชั่วโมง.นาที)</th>
           @if (Auth::user()->level == "admin")
           <th>ตัวเลือก</th>
           @endif
           </tr>
          </thead>
@foreach( $services as  $index => $item )
		<tbody>
        <tr> 
		<td>{{$index+1}}</td>
		<td>{{$item->name_ser}}</td>
		<td>{{$item->type}}</td>
		<td>{{$item->cost}} ฿</td>
		<td>{{$item->sp_time}}</td>
		@if (Auth::user()->level == "admin")
			<form method="post" action="services/{{$item->id_ser}}" class="form-inline">

				<td><a href="services/{{$item->id_ser}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
				<a href="services/{{$item->id_ser}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไขบริการ</a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> ลบบริการ</button> 
				</td>
				{{csrf_field()}}
			</form>
		@endif
	    </tr>
      </tbody>
@endforeach
</table>
</div>
<br>

@if (Auth::user()->level == "admin")
	<a href="service" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ </a>
	<br>
@endif

@endsection