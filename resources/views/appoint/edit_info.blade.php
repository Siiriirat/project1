<!-- edit_info.blade.php -->
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
    <div class="col-md-2"></div>
    <div class="col-md-1">
        <a href="/infos" class="btn btn-success"><i class="fa fa-list"></i> ข่าวสารทั้งหมด</a>
    </div>
</div>
<br>

<div class="wrapper">
    <div class="container">
        <div class="wraper">
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-content profile-tab-content">
                        <div class="tab-pane active" id="home-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">แก้ไขข้อมูลข่าวสาร</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                              <form method="post" action="/infos/{{$id}}" enctype="multipart/form-data">
           
          <div class="row">
                <div class="col-md-6">
              <legend>เพิ่มข่าวสาร</legend>
              <div class="form-group">
                <label for="topic_info">หัวข้อข่าวสาร :</label>
                  <input type="text" name="topic_info" value="{{$information->topic_info}}" style="width:210px;" class="form-control" required>
              </div>    
              <div class="form-group">
                <label for="date_info">วันที่ :</label>
                  <input type="text" id="date" name ="date_info" style="width:210px;" data-field="date" class="form-control" value="{{$information->date_info}}" required/>
              </div>
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group">
                  <label for="staff" class= "control-label">ประเภทข่าวสาร : <br>
                    <select  name="type_info" id="type_info" value="{{$information->type_info}}" class="form-control" required> 
                        
                        
                        @if($information->type_info == 'ข่าวสารทั่วไป')
                              <option value="ข่าวสารทั่วไป" selected> ข่าวสารทั่วไป </option>
                          @else
                              <option value="ข่าวสารทั่วไป"> ข่าวสารทั่วไป </option>
                          @endif
                          @if($information->type_info == 'ข่าวสารทางร้าน')
                              <option value="ข่าวสารทางร้าน" selected> ข่าวสารทางร้าน </option>
                          @else
                              <option value="ข่าวสารทางร้าน"> ข่าวสารทางร้าน </option>
                          @endif
                    </select> 
                  </label>
                </div>
          {{csrf_field()}}
             
            </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                        <label for="detail_info">รายละเอียดเพิ่มเติม :</label>
                        <textarea name="detail_info" style="width:80%;" class="form-control"  rows="4" placeholder="Enter text here" >{{$information->detail_info}}</textarea>
                </div>
              <div class="form-group">
                      <label for="picture">รูปภาพ :</label> 
                        <input type="file"  name="img_info" id= "img_info" required>
                </div> 
                 <button type="submit" class="btn btn-warning" onclick="return confirm('ท่านต้องการแก้ไขข่าวสารนี้ใช่หรือไม่ ?')">แก้ไขข้อมูล</button>
              </div>
          </div>
         
              
        </form>
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
        </div>

<br>       
          <div id="dtBox"></div>
          <script src="/js/jquery1.min.js"></script>
          <script src="/dist/DateTimePicker.js"></script>
          <script src="/dist/i18n/DateTimePicker-i18n.js"></script>
          <script>
          $('#dtBox').DateTimePicker({
             dateTimeFormat: "yyyy-mm-dd hh:mm:ss"
          });
          </script>

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