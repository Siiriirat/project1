@extends('template')
@section('title','Appointment')
@section('content')
<br>
<table class="table table-bordered">
          <thead>
           <tr>
           <th>index</th>
           <th>service</th>
           <th>staff</th>
           <th>date</th>
		   <th>time</th>
           <th>name</th>
           <th>option</th>
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

				<td><a href="appoints/{{$item->id}}" class="btn btn-default"><img src="image/show.png" width="30" height="30"></a>
				<a href="appoints/{{$item->id}}/edit" class="btn btn-default"><img src="image/edit.png" width="30" height="30"></a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-default"><img src="image/delete.png" width="30" height="30"></button> </td>
				{{csrf_field()}}
			</form>
		@endcan
	    </tr>
      </tbody>
@endforeach
</table>
{{ $appoints->links() }}
<br><br>

@if ( !Auth::guest() )
	<a href="appoint">Create new appoint</a>
	<br>
@endif

@endsection