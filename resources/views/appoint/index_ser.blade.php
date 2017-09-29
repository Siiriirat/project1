@extends('template')
@section('title','Appointment')
@section('content')
<br>
<div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>Index</th>
           <th>Service</th>
           <th>Type</th>
           <th>Cost</th>
           @if (Auth::user()->level == "admin")
           <th>Option</th>
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
		@if (Auth::user()->level == "admin")
			<form method="post" action="services/{{$item->id_ser}}" class="form-inline">

				<td><a href="services/{{$item->id_ser}}" class="btn btn-info"><i class="fa fa-eye"></i> แสดง</a>
				<a href="services/{{$item->id_ser}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> ยกเลิก</button> 
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