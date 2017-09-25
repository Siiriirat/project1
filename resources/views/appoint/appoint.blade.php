@extends('template')
@section('title','Appointment')
<head>
    <link href="dist/DateTimePicker.css" rel="stylesheet"/>
</head>
@section('content')
<br>
<div align="right">
        
          <a href="/appoints" class="btn btn-primary"><img src="image/icon2.png" width="30" height="30">ตารางนัด</a>
          
</div>
<br><br>

    <div class="card card-container">
          <form method="post" action="/appoints">
          <div class="container">
          <legend>ระบบจองคิว</legend>
          
          <div class="form-group">
          <label for="tel">เบอร์โทรศัพท์ : <input type="text" name="tel" class="form-control" required></label>
          </div> 
          <div class="form-group">
          <label for="gender">ระบุเพศของท่าน :</label><br>
          <label class="custom-control custom-radio" >
          <input id="gender" name="gender" type="radio" value="เพศชาย" class="custom-control-input" required> 
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/male.png" width="10%">
          </span>
          </label><br><br>
          <label class="custom-control custom-radio">
          <input id="gender" name="gender" type="radio" value="เพศหญิง" class="custom-control-input" required>
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="/image/female.png" width="10%">
          </span>
          </label>
          </div> 
          <div class="form-group">
          <label for="service"   class= "control-label" >บริการ : <br>
          <select  name="service" id="service" class="custom-select" required>
          <option value="" required>--- เลือกประเภทบริการ ---</option>
          <optgroup label="หน้า" data-max-options="3">
          <option value="แต่งหน้า" required>แต่งหน้า</option>
          <option value="มาร์กหน้า" required>มาร์กหน้า</option>
          </optgroup>

          <optgroup label="ผม" data-max-options="3">
          <option value="ตัดผม" required>ตัดผม</option>
          <option value="สระไดร์" required>สระไดร์</option>
          <option value="ทำสีผม" required>ทำสีผม</option>
          <option value="ยืดผม" required>ยืดผม</option>
          <option value="ดัดผม" required>ดัดผม</option>
          </optgroup>

          
          <optgroup label="เล็บ" data-max-options="3">
          <option value="ทำเล็บมือ" required>ทำเล็บมือ</option>
          <option value="ทำเล็บเท้า" required>ทำเล็บเท้า</option>
          </optgroup>
          </select>
          </label>
          </div>
          <div class="form-group">
          <label for="staff" class= "control-label">ผู้ให้บริการ : <br>
          <select  name="staff" id="staff" class="custom-select" required> 
              <option value="" required>--- เลือกช่างผู้ให้บริการ ---</option>
              <option value="A" required>- A -</option>
              <option value="B" required>- B -</option>
              <option value="C" required>- C -</option>
          </select> 
          </label>
          </div>


          <div class="form-group">   
          <label for="time">ระบุวันและเวลา :</label><br> 
   
          <label>วันที่</label>
          <input type="text" id="date" name ="date" style="width:220px;" data-field="date" class="form-control" required/>
          <label>ช่วงเวลา</label>
          <input type="text" id="time" name="time" style="width:220px;" data-field="time" class="form-control" required/>
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
          <textarea name="detail" class="form-control" rows="4" placeholder="Enter text here" ></textarea>
          </div>
          <div>
          <b>From: </b> {{ Auth::user()->name}} <br>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="ip" value="{{Request::getClientIp()}}">
          </div>
          {{csrf_field()}}  




        </p>
         <button type="submit" class="btn btn-primary">Submit</button>
         </div>
        </form>

         
</div>

<br>
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