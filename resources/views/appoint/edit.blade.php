@extends('template_nav')
@section('title','Appointment')
<head>
    <link href="/dist/DateTimePicker.css" rel="stylesheet"/>
</head>
@section('content')
<br><br><br><br>
<div class="row">
  <div class="col-md-3">
    <a href="/appoints" class="btn btn-success "><i class="fa fa-hand-o-left" ></i></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-2"></div>
  <div class="col-md-1">
    <a href="/appoints" class="btn btn-warning"><i class="fa fa-plus-square-o"></i> เพิ่มรายการ</a>
  </div>
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
<br>
@if (count($errors) > 0)
        <ul>
           <script>
            alert( "{{$errors}}");  
            </script>
        </ul>
    
@endif
<div class="wraper">
  <div class="row">
    <form method="post" action="/appoints/{{$appoint->id}}">
      <div class="col-lg-12">
        <div class="panel panel-warning ">
          <div class="panel-heading">
            <h3 class="panel-title">แก้ไขรายการจอง</h3>
          </div>
          @if (Auth::user()->level == "admin")
            <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-button.css')}}">
            <div class="panel-body">
              <div class="about-info-p">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">  
                      <label>บริการ :<br></label>
                        <input type="text" id="id_ser" name ="id_ser" style="width:220px;" data-field="date" class="form-control" value="<?php echo (DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser'));?>"/>
                    </div>
                    <div class="form-group">       
                      <label>ช่างผู้ให้บริการ : <br></label>
                        <input type="text" id="staff" name ="staff" style="width:220px;" data-field="date" class="form-control" value="{{$appoint->staff}}">
                    </div>
                    <br>
                    <b>From: </b> {{ Auth::user()->name}}

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">   
                      <label for="time">ระบุวันและเวลา :</label><br>
                        <div class="row">
                          <div class="col-md-4">
                            <label>วันที่</label>
                          </div>
                          <div class="col-md-5">
                            <label>ช่วงเวลา</label>
                          </div> 
                        </div> 
                    </div>
                    <div class="form-inline">
                      <input type="text" id="date" name ="date" style="width:220px;" data-field="date" class="form-control" value="{{$appoint->date}}"/>
                      <input type="text" id="time" name="time" style="width:220px;" data-field="time" class="form-control" value="{{$appoint->time}}"/>
                    </div>
                    <br>  
                      <label>สถานะ : <br></label>
                        @if($appoint->status == '2')
                          <div class="btn-group">
                            <label class="btn btn-default">
                              <input type="radio" name="status"  value="2" checked>
                              <span>ตอบรับ</span>
                            </label>
                          </div>
                        @else
                          <div class="btn-group">
                            <label class="btn btn-default">
                            <input type="radio" name="status"  value="2">
                            <span>ตอบรับ</span>
                            </label>
                          </div>
                        @endif
                        @if($appoint->status == '1')
                          <div class="btn-group">
                            <label class="btn btn-default">
                            <input type="radio" name="status"  value="1" checked>
                            <span>ปฏิเสธ</span>
                            </label>
                          </div>
                        @else
                          <div class="btn-group">
                            <label class="btn btn-default">
                            <input type="radio" name="status"  value="1">
                            <span>ปฏิเสธ</span>
                            </label>
                          </div>
                        @endif
                        @if($appoint->status == '0')
                          <div class="btn-group">
                            <label class="btn btn-default">
                            <input type="radio" name="status"  value="0" checked>
                            <span>รอการตอบรับ</span>
                            </label>
                          </div>
                        @else
                          <div class="btn-group">
                            <label class="btn btn-default">
                            <input type="radio" name="status"  value="0">
                            <span>รอการตอบรับ</span>
                            </label>
                          </div>
                        @endif
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
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="ip" value="{{Request::getClientIp()}}">
                    <input type="hidden" name="_method" value="PUT">
                    {{csrf_field()}}  
                    <br>
                    <button type="submit" class="btn btn-warning" onclick="return confirm('ท่านต้องการแก้ไขรายการใช่หรือไม่ ?')"><i class="fa fa-edit"></i> แก้ไข</button>
                  </div>
                </div>
                <br>
              </div>
            </div>
          @elseif(Auth::user()->level == "user")
            <div class="panel-body">
              <div class="about-info-p">
                <div class="row">
                  <div class="col-md-6">
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
                        <img src="/image/male.png" width="10%"></span>
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
                        <img src="/image/female.png" width="10%"></span>
                      @else
                        <input id="gender" name="gender" type="radio" value="เพศหญิง" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">
                        <img src="/image/female.png" width="10%"></span>
                      @endif
                      </label>
                    </div> 
                    <div class="form-group">
                      <label for="service" class="col-sm-0" class= "control-label">บริการ : <br>
                      <select  name="id_ser" id="id_ser" class="form-control" style="width:225px;">
                      <optgroup label="หน้า" data-max-options="3">
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'แต่งหน้า')
                        <option value="แต่งหน้า" selected>แต่งหน้า</option>
                      @else
                        <option value="แต่งหน้า">แต่งหน้า</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'มาร์กหน้า')
                        <option value="มาร์กหน้า" selected>มาร์กหน้า</option>
                      @else
                        <option value="มาร์กหน้า">มาร์กหน้า</option>
                      @endif
                      </optgroup>
                      <optgroup label="ผม" data-max-options="3">
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ตัดผม')
                        <option value="ตัดผม" selected>ตัดผม</option>
                      @else
                        <option value="ตัดผม">ตัดผม</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'สระไดร์')
                        <option value="สระไดร์" selected>สระไดร์</option>
                      @else
                        <option value="สระไดร์">สระไดร์</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ทำสีผม')
                        <option value="ทำสีผม" selected>ทำสีผม</option>
                      @else
                        <option value="ทำสีผม">ทำสีผม</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ยืดผม')
                        <option value="ยืดผม" selected>ยืดผม</option>
                      @else
                        <option value="ยืดผม">ยืดผม</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ดัดผม')
                        <option value="ดัดผม" selected>ดัดผม</option>
                      @else
                        <option value="ดัดผม">ดัดผม</option>
                      @endif
                      </optgroup>
                      <optgroup label="เล็บ" data-max-options="3">
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ทำเล็บมือ')
                        <option value="ทำเล็บมือ" selected>ทำเล็บมือ</option>
                      @else
                        <option value="ทำเล็บมือ">ทำเล็บมือ</option>
                      @endif
                      @if((DB::table('services')->where('id_ser',$appoint->id_ser)->value('name_ser')) == 'ทำเล็บเท้า')
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
                      <select  name="staff" id="staff" class="form-control" style="width:225px;"> 
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
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">   
                      <label for="time">ระบุวันและเวลา :</label><br> 
                      <label>วันที่</label>
                      <input type="text" id="date" name ="date" style="width:220px;" data-field="date" class="form-control" value="{{$appoint->date}}"/>
                      <label>ช่วงเวลา</label>
                      <input type="text" id="time" name="time" style="width:220px;" data-field="time" class="form-control" value="{{$appoint->time}}"/>
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
                      <textarea name="detail" class="form-control" style="width:100%;" rows="4" placeholder="Enter text here" >{{$appoint->detail}}</textarea>
                    </div>
                      <b>From: </b> {{ Auth::user()->name}} <br>
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="ip" value="{{Request::getClientIp()}}">
                      <input type="hidden" name="_method" value="PUT">
                      {{csrf_field()}}  
                      <br>
                      <button type="submit" class="btn btn-warning" onclick="return confirm('ท่านต้องการแก้ไขรายการใช่หรือไม่ ?')"><i class="fa fa-edit"></i> แก้ไข</button>
                  </div>
                </div>
                <br>
              </div>
            </div>
             @endif
          </div>
        </div>
      </form>
    </div>
  </div>



<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
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

