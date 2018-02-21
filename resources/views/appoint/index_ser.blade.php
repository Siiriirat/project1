@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/image.css')}}">
@section('content')
<br><br><br><br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-3"></div>
<div class="col-md-2"></div>
<div class="col-md-1">
@if (Auth::user()->level == "admin")
	<a href="service" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ </a>
	<br>
@endif
</div>
</div>

<br>
<div class="container">
@foreach( $services as  $index => $item )
<div class="portfolioContainer">
    <div class="col-md-4  webdesign illustrator">
        <div class="gal-detail thumb">
        	<center>
        	<a href="/services/{{$item->id_ser}}" class="image-popup" title="Appointment">
                <img src="/uploads/images/service/{{$item->picture}}"  class="thumb-img" alt="work-thumbnail" style="height: 45%">
            </a>	
        	</center>
            
            <h4 class="text-center">ชื่อบริการ : {{$item->name_ser}}</h4>
            <div class="ga-border"></div>
            <p class="text-muted text-center">
            @if (Auth::user()->level == "admin")
            <center>
            <form method="post" action="services/{{$item->id_ser}}" class="form-inline">
				<a href="services/{{$item->id_ser}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> ดูรายละเอียด</a>
				<a href="services/{{$item->id_ser}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไขบริการ</a> 		
				<input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-sm" onclick="return confirm('ท่านต้องการลบรายการบริการใช่หรือไม่ ?')"><i class="fa fa-trash"></i> ลบบริการ</button> 
				
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
        <br><br>
    </div>


   

    
    

</div>
    @endforeach
</div>


<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>



@endsection