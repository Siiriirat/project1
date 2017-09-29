@extends('template1')
@section('title','Appointment')
@section('content')
<br><br>
<a href="/appoints" class="btn btn-outline-success"><img src="/image/return.png" width="30" height="30"> </a>
<br><br>
<form method="post" action="/appoints/{{$appoint->id}}">
          <div class="card card-container">
          <form method="post" action="/appoints">
          <div class="container">
          <legend>แก้ไขรายการจอง</legend>
          <div class="form-group">
          <label for="tel">เบอร์โทรศัพท์ : <input type="text" name="tel" class="form-control" value="{{$appoint->tel}}"></label>
          </div> 
          
     
          <div class="form-group">
          <label for="gender">ระบุเพศของท่าน :</label><br>
          <label class="custom-control custom-radio">
          @if($appoint->gender == 'เพศชาย')
          <input id="gender" name="gender" type="radio" value="เพศชาย" class="custom-control-input" checked>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/male.png" width="10%">
          </span>
      @else
      <input id="gender" name="gender" type="radio" value="เพศชาย" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/male.png" width="10%">
          </span>
      @endif
          </label><br><br>
          <label class="custom-control custom-radio">
          @if($appoint->gender == 'เพศหญิง')
          <input id="gender" name="gender" type="radio" value="เพศหญิง" class="custom-control-input" checked>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/female.png" width="10%">
          </span>
          @else
          <input id="gender" name="gender" type="radio" value="เพศหญิง" class="custom-control-input">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/female.png" width="10%">
          </span>
          @endif
          </label>
          </div> 

          <div class="form-group">
          <label for="service" class="col-sm-0" class= "control-label">บริการ : <br>
      
          <select  name="service" id="service" class="custom-select">

          <option value="">--- เลือกประเภทบริการ ---</option>
          <optgroup label="หน้า" data-max-options="3">
          @if($appoint->service == 'แต่งหน้า')
          <option value="แต่งหน้า" selected>แต่งหน้า</option>
          @else
          <option value="แต่งหน้า">แต่งหน้า</option>
          @endif
          @if($appoint->service == 'มาร์กหน้า')
          <option value="มาร์กหน้า" selected>มาร์กหน้า</option>
          @else
          <option value="มาร์กหน้า">มาร์กหน้า</option>
          @endif
          </optgroup>
          <optgroup label="ผม" data-max-options="3">
          @if($appoint->service == 'ตัดผม')
          <option value="ตัดผม" selected>ตัดผม</option>
          @else
          <option value="ตัดผม">ตัดผม</option>
      @endif
      @if($appoint->service == 'สระไดร์')
          <option value="สระไดร์" selected>สระไดร์</option>
      @else
          <option value="สระไดร์">สระไดร์</option>
          @endif
          @if($appoint->service == 'ทำสีผม')
          <option value="ทำสีผม" selected>ทำสีผม</option>
      @else
          <option value="ทำสีผม">ทำสีผม</option>
          @endif
      @if($appoint->service == 'ยืดผม')
          <option value="ยืดผม" selected>ยืดผม</option>
      @else
          <option value="ยืดผม">ยืดผม</option>
          @endif
          @if($appoint->service == 'ดัดผม')
          <option value="ดัดผม" selected>ดัดผม</option>
      @else
          <option value="ดัดผม">ดัดผม</option>
          @endif
          </optgroup>
          <optgroup label="เล็บ" data-max-options="3">
          @if($appoint->service == 'ทำเล็บมือ')
          <option value="ทำเล็บมือ" selected>ทำเล็บมือ</option>
          @else
          <option value="ทำเล็บมือ">ทำเล็บมือ</option>
          @endif

          @if($appoint->service == 'ทำเล็บเท้า')
          <option value="ทำเล็บเท้า" selected>ทำเล็บเท้า</option>
          @else
          <option value="ทำเล็บเท้า">ทำเล็บเท้า</option>
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
  </div>
<br>
</form>
<br>
</div>
     











@endsection

