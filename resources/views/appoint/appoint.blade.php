@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="dist/DateTimePicker.css" rel="stylesheet"/>
</head>
@section('content')
<br><br><br><br>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-1"></div>
  <div class="col-md-2">
          <a href="{{url('/appoints')}}" class="btn btn-danger"><i class="fa fa-calendar-plus-o"></i> ตารางการเข้าใช้บริการ </a>
  </div>
</div>
<br>

<div class="container">
@if (count($errors) > 0)
   
        <ul>
           
           <script>
            alert( "{{$errors}}");  
            </script>
        </ul>
    
@endif
<?php
$services = DB::table('services')->get();
$i=1;
?>
</div>
<div class="container">
    <div class="well">
    
          <form method="post" action="{{url('/appoints')}}">
          <div class="container">
           <div class="row">
                <div class="col-md-6">
          <legend>ระบบจองคิว</legend>
          <div class="form-group">
          <label for="tel">เบอร์โทรศัพท์ : <input type="text" name="tel" value="{{ old ('tel')}}" class="form-control" required></label>
          </div> 

          <div class="form-group">
          <label for="gender">ระบุเพศของท่าน :</label><br>
          <label class="custom-control custom-radio" >
          <input id="gender" name="gender" type="radio" value="เพศชาย" class="custom-control-input" required @if(old('gender') ==  'เพศชาย') checked="checked" @endif> 
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="{{url('/image/male.png')}}" width="10%">
          </span>
          </label><br><br>
          <label class="custom-control custom-radio">
          <input id="gender" name="gender" type="radio" value="เพศหญิง" class="custom-control-input" required @if(old('gender') ==  'เพศหญิง') checked="checked" @endif>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="{{url('/image/female.png')}}" width="10%">
          </span>
          </label>
          </div> 
          <div class="form-group">
          <label for="service"   class= "control-label" >บริการ : <br>
          <select  name="id_ser" id="id_ser" class="form-control" required>
            <option value="" required>--- เลือกประเภทบริการ ---</option>
            @foreach($services as $s)
                  <option value="{{$i}}" required @if (old('id_ser') == $i) {{ 'selected' }} @endif>{{$s->name_ser}}</option>
                  <?php
                      $i++;
                  ?>
            @endforeach
          </select>
      
          </label>
          </div>
          <div class="form-group">
          <label for="staff" class= "control-label">ผู้ให้บริการ : <br>
          <select  name="staff" id="staff" class="form-control" required> 
              <option value="" required>--- เลือกช่างผู้ให้บริการ ---</option>
              <option value="A" required @if (old('staff') == "A") {{ 'selected' }} @endif>- A -</option>
              <option value="B" required @if (old('staff') == "B") {{ 'selected' }} @endif>- B -</option>
              <option value="C" required @if (old('staff') == "C") {{ 'selected' }} @endif>- C -</option>
          </select> 
          </label>
          </div>
         </div>

          <div class="col-md-6">
          <br><br>
          <div class="form-group">   
          <label for="time">ระบุวันและเวลา :</label><br> 
   
          <label>วันที่</label>
          <input type="text" id="date" name ="date" style="width:220px;" data-field="date" class="form-control" value="{{ old ('date')}}" required/>
          <label>ช่วงเวลา</label>
          <input type="text" id="time"  value="{{ old ('time')}}" name="time" style="width:220px;" data-field="time" class="form-control" required/>
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
            
          <div class="form-group">
          <label for="detail">รายละเอียดเพิ่มเติม :</label>
          <textarea name="detail" style="width:80%;" class="form-control"  rows="4" placeholder="Enter text here" ></textarea>
          </div>
          <div>
          <b>From: </b> {{ Auth::user()->name}} <br>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="ip" value="{{Request::getClientIp()}}">
          </div>
          {{csrf_field()}}  


        </p>
         <button type="submit" class="btn btn-success"><i class="fa fa-check-square"> จอง </i>
         </button>
         </div>
       </div>
     </div>
        </form>

         
</div>
</div>

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