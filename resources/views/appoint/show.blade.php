@extends('template')
@section('title','Appointment')
@section('content')
<br>
  <table class="table table-bordered">
   <thead>
      <tr>
        <th>Title</th>
        <th>detail</th>
        <th>name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
         <td><h4>{{$appoint->title}}</h4></td>
         <td><p>{{$appoint->detail}}</p></td>
         <td><b>From: </b> {{ Auth::user()->name}}</td>
      </tr>
    </tbody>
  </table>
   
 
  <hr>
  </table>
<a href="/appoints">Home</a>
<br>

@endsection