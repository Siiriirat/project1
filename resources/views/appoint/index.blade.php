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
<input type="text" name="name" id="name" class="form-control" style="width:220px;"></input> &nbsp
    <button type="submit" class="btn btn-default">
    	<img src="image/search.png" width="30" height="30">
    </button>
 </form>
    <br>
</div>
</div></div></div>
<div style="overflow-x:auto;">
<table class="table table-border">
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
		<td><p>{{$NUM_PAGE*($page-1) + $index+1}}</p></td>
		<td><p>{{$item->service}}</p></td>
		<td><p>{{$item->staff}}</p></td>
		<td><p>{{$item->date}}</p></td>
		<td><p>{{$item->time}}</p></td>
		<td><b>{{$item->user()->get()[0]->name}}</b> </td>
		
		@can('show',$item)
			<form method="post" action="appoints/{{$item->id}}" class="form-inline">
				<td><a href="appoints/{{$item->id}}" class="btn btn-outline-default"><img src="image/show.png" width="30" height="30"></a>
				<a href="appoints/{{$item->id}}/edit" class="btn btn-outline-default"><img src="image/edit.png" width="30" height="30"></a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-default"><img src="image/delete.png" width="30" height="30"></button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	
	    </tr>
      </tbody>
@endforeach
</table>
</div>
{{ $appoints->links() }}
<br><br>

@if ( !Auth::guest() )
	<a href="appoint" class="btn btn-outline-success"><img src="image/add.png" width="20" height="20"> เพิ่มรายการ </a>
	<br>
	<br>
@endif

@endsection