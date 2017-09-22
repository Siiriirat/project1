@extends('template')
@section('title','Appointment')
@section('content')
<br><br>
<form method="post" action="/appoints/{{$appoint->id}}">
	<div class="col align-center">
        <div class="card" style="width: 50rem;">
          <div class="card-body">
          <form method="post" action="/appoints">
          <h4 class="card-title">แก้ไขรายการจอง</h4>
          <p class="card-text">
          <div class="form-group">
          <label for="tel">เบอร์โทรศัพท์ : <input type="text" name="tel" class="form-control" value="{{$appoint->tel}}"></label>
          </div> 
          
		 
          <div class="form-group">
          <label for="gender">ระบุเพศของท่าน :</label><br>
          <label class="custom-control custom-radio">
          @if($appoint->gender == 'male')
          <input id="gender" name="gender" type="radio" value="male" class="custom-control-input" checked>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/male.png" width="10%">
          </span>
		  @else
		  <input id="gender" name="gender" type="radio" value="male" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/male.png" width="10%">
          </span>
		  @endif
          </label><br><br>
          <label class="custom-control custom-radio">
          @if($appoint->gender == 'female')
          <input id="gender" name="gender" type="radio" value="female" class="custom-control-input" checked>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/female.png" width="28%">
          </span>
          @else
          <input id="gender" name="gender" type="radio" value="female" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/female.png" width="28%">
          </span>
          @endif
          </label>
          </div> 

          <div class="form-group">
          <label for="service" class="col-sm-0" class= "control-label">บริการ : <br>
			
          <select  name="service" id="service" class="custom-select">

          <option value="">--- เลือกประเภทบริการ ---</option>
          <optgroup label="หน้า" data-max-options="3">
          @if($appoint->service == 'makeup')
          <option value="makeup" selected>แต่งหน้า</option>
          @else
          <option value="makeup">แต่งหน้า</option>
          @endif
          @if($appoint->service == 'mask')
          <option value="mask" selected>มาร์กหน้า</option>
          @else
          <option value="mask">มาร์กหน้า</option>
          @endif
          </optgroup>
          <optgroup label="ผม" data-max-options="3">
          @if($appoint->service == 'cut')
          <option value="cut" selected>ตัดผม</option>
          @else
          <option value="cut">ตัดผม</option>
		  @endif
		  @if($appoint->service == 'dry')
          <option value="dry" selected>สระไดร์</option>
		  @else
          <option value="dry">สระไดร์</option>
          @endif
          @if($appoint->service == 'color')
          <option value="color" selected>ทำสีผม</option>
		  @else
          <option value="color">ทำสีผม</option>
          @endif
		  @if($appoint->service == 'rebond')
          <option value="rebond" selected>ยืดผม</option>
		  @else
          <option value="rebond">ยืดผม</option>
          @endif
          @if($appoint->service == 'curl')
          <option value="curl" selected>ดัดผม</option>
		  @else
          <option value="curl">ดัดผม</option>
          @endif
          </optgroup>
          <optgroup label="เล็บ" data-max-options="3">
          @if($appoint->service == 'hand')
          <option value="hand" selected>ทำเล็บมือ</option>
          @else
          <option value="hand">ทำเล็บมือ</option>
          @endif

          @if($appoint->service == 'foot')
          <option value="foot" selected>ทำเล็บเท้า</option>
          @else
          <option value="foot">ทำเล็บเท้า</option>
		  @endif
          </optgroup>
          </select>
          </label>
          </div>
          <div class="form-group">
          <label for="staff" class="col-sm-0" class= "control-label">ผู้ให้บริการ : <br>
          <select  name="staff" id="staff" class="custom-select"> 
              <option value="">--- เลือกช่างผู้ให้บริการ ---</option>
              @if($appoint->staff == 'A')
              <option value="A" selected>- A -</option>
              @else
              <option value="A">- A -</option>
              @endif

              @if($appoint->staff == 'B')
              <option value="B" selected>- B -</option>
              @else
              <option value="B">- B -</option>
              @endif

              @if($appoint->staff == 'C')
              <option value="C" selected>- C -</option>
              @else
              <option value="C">- C -</option>
              @endif
          </select> 
          </label>
          </div>


          <div class="form-group">   
          <label for="time">ระบุวันและเวลา :</label><br> 
   
          <label>วันที่</label>
          <input type="text" id="date" name ="date" style="width:220px;" data-field="date" class="form-control" value="{{$appoint->date}}"/>
                
          <label>ช่วงเวลา</label>
          <input type="text" id="time" name="time" style="width:220px;" data-field="time" class="form-control" value="{{$appoint->time}}"/>
          <div id="dtBox"></div>
          <script src="js/jquery1.min.js"></script>
          <script src="dist/DateTimePicker.js"></script>
          <script src="dist/i18n/DateTimePicker-i18n.js"></script>
          <script>
          $('#dtBox').DateTimePicker({
             dateTimeFormat: "yyyy-mm-dd hh:mm:ss"
          });
          </script>
          </div>
          



          
	<div class="form-group">
		<label for="detail">รายละเอียดเพิ่มเติม :</label>
		<textarea name="detail" class="form-control" rows="4">{{$appoint->detail}}</textarea>
	</div>

	


	<b>From: </b> {{ Auth::user()->name}} <br>
	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
	<input type="hidden" name="ip" value="{{Request::getClientIp()}}">
 

	<input type="hidden" name="_method" value="PUT">
	{{csrf_field()}}	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>

          </div>
       </div>
    </div>




















<a href="/appoints">Home</a>
@endsection

