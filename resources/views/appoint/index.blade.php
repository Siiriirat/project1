@extends('template')
@section('title','Appointment')
@section('content')
<br>
<form action="{{url('search')}}" method="post" >
{{csrf_field()}}
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="form-inline">
<div class="form-group">
            <div class="input-append">
                <input type="text" name="name" id="name" class="search-query form-control" placeholder="Search for service" >
                <button type="submit" class="btn">Search</button>
            </div>
        </form>
 </form>
</div>
</div>
</div>
</div>
<br>
<div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>Index</th>
           <th>Service</th>
           <th>Staff</th>
           <th>Date</th>
		   <th>Time</th>
           <th>Name</th>
           <th>Option</th>
           </tr>
          </thead>
@foreach( $appoints as  $index => $item )
		<tbody>
        <tr> 
		<td>{{$NUM_PAGE*($page-1) + $index+1}}</td>
		<td>{{$item->service}}</td>
		<td>{{$item->staff}}</td>
		<td>{{$item->date}}</td>
		<td>{{$item->time}}</td>
		<td>{{$item->user()->get()[0]->name}}</td>

        
		@can('show',$item)
			<form method="post" action="appoints/{{$item->id}}" class="form-inline">
				<td><a href="appoints/{{$item->id}}" class="btn btn-info"><i class="fa fa-eye"></i> แสดง</a>
				<a href="appoints/{{$item->id}}/edit" class="btn btn-warning"><i class="fa fa-edit"></i> แก้ไข</a>		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	
	    </tr>
      </tbody>
@endforeach
</table>
</div>
{{ $appoints->links() }}
<br>

@if ( !Auth::guest() )
	<a href="appoint" class="btn btn-success"> <i class="fa fa-plus-circle"></i> เพิ่มรายการ </a>
	<br>
	<br>
@endif

@endsection