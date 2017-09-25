@extends('template1')
@section('title','Appointment')
@section('content')
<br><br>
<a href="/services" class="btn btn-outline-success"><img src="/image/return.png" width="30" height="30"> </a>
<br><br>
<div class="col-md-8">
 <div class="col align-center">
        <div class="card" style="width: 40rem;">
          <div class="card-body">
          <form method="post" action="/services">
          <h4 class="card-title">เพิ่มบริการ</h4>
          <p class="card-text">
          <div class="form-group">
          <label for="name_ser">ชื่อบริการ : <input type="text" name="name_ser" class="form-control" value="{{$service->name_ser}}"></label>
          </div> 
          <div class="form-group">
          <label for="type">ประเภทบริการ : <input type="text" name="type" class="form-control" value="{{$service->type}}"></label>
          </div> 
          <div class="form-group" style="width:230px;">
          <label for="cost">ราคาของบริการ : <input type="number" name="cost" class="form-control" value="{{$service->cost}}"></label>
          </div>
          <div class="form-group">
          <label for="detail">รายละเอียดบริการ :</label>
          <textarea name="detail" class="form-control" rows="4" placeholder="Enter text here" value="{{$service->detail}}"></textarea>
          </div>

          {{csrf_field()}}  




        </p>
         <button type="submit" class="btn btn-outline-success"><img src="/image/edit1.png" width="20" height="20"> Edit</button>
        </form>

          </div>
       </div>
    </div>
</div>
<div class="col align-right">
          
          
          <a href="/services" class="btn btn-outline-warning"><img src="/image/list.png" width="30" height="30">รายการบริการ</a>
          
       
</div>
<br>

@endsection