@extends('template')
@section('title','Appointment')
@section('content')
<br>
<div style="overflow-x:auto;">
<table class="table table-border">
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
		<td><p>{{$index+1}}</p></td>
		<td><p>{{$item->name_ser}}</p></td>
		<td><p>{{$item->type}}</p></td>
		<td><p>{{$item->cost}} ฿</p></td>
		@if (Auth::user()->level == "admin")
			<form method="post" action="services/{{$item->id_ser}}" class="form-inline">

				<td><a href="services/{{$item->id_ser}}" class="btn btn-outline-default"><img src="image/show.png" width="30" height="30"></a>
				<a href="services/{{$item->id_ser}}/edit" class="btn btn-outline-default"><img src="image/edit.png" width="30" height="30"></a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-default"><img src="image/delete.png" width="30" height="30"></button> </td>
				{{csrf_field()}}
			</form>
		@endif
	    </tr>
      </tbody>
@endforeach
</table>
</div>
<br><br>

@if (Auth::user()->level == "admin")
	<a href="service" class="btn btn-outline-success"><img src="image/add.png" width="20" height="20"> Add </a>
	<br>
@endif

@endsection