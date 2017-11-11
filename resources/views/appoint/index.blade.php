@extends('template_nav')
@section('title','Appointment')
@section('content')
<br>
<form action="{{url('search')}}" method="post" >
{{csrf_field()}}
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3">
<div class="form-inline">
<div class="form-group">
            <div class="input-append">
                <input type="text" name="name" id="name" class="search-query form-control" placeholder="ค้นหาบริการ" >
                <button type="submit" class="btn"><i class="fa fa-search"></i> ค้นหา</button>
            </div>
</div>
</div>
</div>
</div>
</form>
<br>
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
			<form method="post" action="appoints/{{$item->id}}" class="form-inline">
				<td><a href="appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
				<a href="appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
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
		@can('show',$item)
			<form method="post" action="appoints/{{$item->id}}" class="form-inline">
				<td><a href="appoints/{{$item->id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> แสดง</a>
				<a href="appoints/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	    
	    </tr>
      </tbody>
@endforeach
</table>
</div>
@endif

{{ $appoints->links() }}
<br>

@if ( !Auth::guest() )
	<a href="appoint" class="btn btn-success"> <i class="fa fa-plus-circle"></i> เพิ่มรายการ </a>
	<br>
	<br>
@endif

@endsection