<!-- income.blade.php -->

@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="/dist/DateTimePicker.css" rel="stylesheet"/>
	<script type="text/javascript">
		var appoints = {!! $appoints !!};

		var services = {!! $service !!}
        
		var indexservice = [];
		window.onload = function() {
			var obj = appoints;
			var objser = services;
			$.each( obj, function( key, value ) {

				$.each( objser, function( num, indexser ) {
					if(indexser['id_ser'] == value['id_ser'])
						value['id_ser'] = indexser['name_ser'];
				});

			  indexservice.push({ y: value['appointscount'], name: value['id_ser'] },);
			  
			});
			console.log(indexservice);
			var options = {
						exportEnabled: true,
						animationEnabled: true,
				title:{
						text: "รายรับประจำวัน"
				},
				legend:{
						horizontalAlign: "right",
						verticalAlign: "center"
				},
				data: [{
						type: "pie",
						showInLegend: true,
						toolTipContent: "<b>{name}</b>: จำนวน {y} รายการ (#percent%)",
						indexLabel: "{name}",
						legendText: "{name} (#percent%)",
						indexLabelPlacement: "inside",
						dataPoints: indexservice
				}]
   };
$("#chartContainer").CanvasJSChart(options);

}
</script>
@if (count($errors) > 0)
   
        <ul>
           
           <script>
            alert( "{{$errors}}");  
            </script>
        </ul>
    
@endif
</head>
@section('content')
<br><br><br>
<br>

<div class="row">
 <div class="col-md-3"></div>
 <div class="col-md-3"></div>
 <div class="col-md-3"></div>

 <div class="col-md-3">
 <div class="form-inline">
 <div class="form-group">
             <div class="input-append">
             	<form action="{{url('/income')}}" method="post" >
					{{csrf_field()}}
				 @if(count($date) != "")
                 <input type="text" value="{{$date}}" name="date" id="date" class="search-query form-control" data-field="date" placeholder="ค้นหาวันที่ต้องการดู" >
                 @else
                 <input type="text" name="date" id="date" class="search-query form-control" data-field="date" placeholder="ค้นหาวันที่ต้องการดู" >
                 @endif
                 <button type="submit" class="btn btn-danger"><i class="fa fa-list"></i> แสดง</button>
                </form>
             </div>
           <div id="dtBox"></div>
           <script src="/js/jquery1.min.js"></script>
           <script src="/dist/DateTimePicker.js"></script>
           <script src="/dist/i18n/DateTimePicker-i18n.js"></script>
           <script>
           $('#dtBox').DateTimePicker({
              dateTimeFormat: "yyyy-mm-dd hh:mm:ss"
           });
           </script>
 </div>
 </div>
 </div>
 </div>

<div class="wrapper">
  <div class="container">
    <div class="wraper">
      <div class="row">
        <div class="col-lg-12">
              <div class="row">
                                <div class="col-md-12">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-primary ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">รายรับประจำวันที่ {{$date}}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                               <div class="row">
                                               	<div class="col-md-3">
                                               		<br><br>
                                               		<div class="wrapper">
  <div class="container">
    <div class="wraper">
      <div class="row">
        <div class="col-lg-12">
              <div class="row">
                                <div class="col-md-3">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-info ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">รายละเอียด</h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="about-info-p">
											  @foreach($appoints as $app)
											   	@foreach($service as $ser)

											  @if($app->id_ser == $ser->id_ser)
                                              <h5>
                                              	{{$ser->name_ser}}  
                                              จำนวน : {{$app->appointscount}} รายการ  <br> 
                                              </h5>	 
                                              @endif
											  @endforeach
											  @endforeach

                                              <br><h5>ยอดรายรับรวม : {{$total}} บาท</h5>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
              </div>
          </div>
      </div> 
    </div>


                                               	</div>
                                               	<div class="col-md-9">
	                                           <div id="chartContainer" style="height: 300px; width: 100%;"></div></div>
 											   </div>
                                              <br>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
              </div>
          </div>
      </div> 
    </div>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
      $('.clockpicker').clockpicker({
        'default': DisplayCurrentTime(),
         twelvehour: true,
        }).find('input').val(DisplayCurrentTime())

function DisplayCurrentTime() {
  var date = new Date();
  var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
  var am_pm = date.getHours() >= 12 ? "PM" : "AM";
  hours = hours < 10 ? "0" + hours : hours;
  var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
  var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
  time = hours + ":" + minutes + ":" + am_pm;
  //time = hours + ":" + minutes + am_pm;
  return time;
};
</script>
@endsection