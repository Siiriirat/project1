@extends('template_nav')
@section('title','Appointment')
@section('content')
<br><br><br><br>
<div class="row">
  <div class="col-md-3">
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-2"></div>
  <div class="col-md-1">
          <a href="/services" class="btn btn-warning"><i class="fa fa-plus-square-o"></i> รายการบริการ</a>
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
                                    <div class="panel panel-primary ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">เพิ่มบริการ</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                              <form method="post" action="/services" enctype="multipart/form-data">
          
           <div class="row">
                <div class="col-md-6">
        
          <div class="form-group">
          <label for="name_ser">ชื่อบริการ : <input type="text" name="name_ser" class="form-control" required></label>
          </div> 
          <div class="form-group">
          <label for="type">ประเภทบริการ : <input type="text" name="type" class="form-control" required></label>
          </div> 
          <div class="form-group" style="width:210px;">
          <label for="cost">ราคาของบริการ : <input type="number" name="cost" class="form-control" required></label>
          </div>
          <div class="form-group">
          <label for="picture">รูปภาพ : <input type="file"  style="height:80%;" name="img" id= "img" required></label>
          </div> 
          

          </div>
          
          <div class="col-md-6">
          <div class="form-group" style="width:230px;">
          <label for="sp_time">เวลาที่ใช้ (hh.mm) : <input type="text" name="sp_time" class="form-control" required></label>
          </div> 
          <div class="form-group">
          <label for="detail">รายละเอียดบริการ :</label>
          <textarea name="detail" class="form-control"  style="width:80%;" rows="4" placeholder="Enter text here"></textarea>
          </div>
          {{csrf_field()}} 
          <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> เพิ่มบริการ
          </button> 
          </div>
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

@endsection