@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/image.css')}}">
@section('content')
<br>
<div class="container">
@foreach( $services as  $index => $item )
<div class="portfolioContainer">
    <div class="col-md-4  webdesign illustrator">
        <div class="gal-detail thumb">
            <a href="/services" class="image-popup" title="Screenshot-1">
                <img src="/uploads/images/service/{{$item->picture}}"  class="thumb-img" alt="work-thumbnail">
            </a>
            <h4 class="text-center">ชื่อบริการ : {{$item->name_ser}}</h4>
            <div class="ga-border"></div>
            <p class="text-muted text-center">
            @if (Auth::user()->level == "admin")
            <center>
            <form method="post" action="services/{{$item->id_ser}}" class="form-inline">
				<a href="services/{{$item->id_ser}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> ดูรายละเอียด</a>
				<a href="services/{{$item->id_ser}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไขบริการ</a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> ลบบริการ</button> 
				
				{{csrf_field()}}
			</form>	
            </center>
             @else(Auth::user()->level == "user")
            <center>
            <form method="post" action="services/{{$item->id_ser}}" class="form-inline">

				<a href="services/{{$item->id_ser}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> ดูรายละเอียด</a>
				{{csrf_field()}}
			</form>	
            </center>
			@endif
	        </p>
        </div>
    </div>


   

    
    

</div>
    @endforeach
</div>




@if (Auth::user()->level == "admin")
	<a href="service" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ </a>
	<br>
@endif

@endsection