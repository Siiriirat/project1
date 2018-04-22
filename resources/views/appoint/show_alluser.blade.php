@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-show_alluser.css')}}"><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

@section('content')
<br><br><br><br>

<br>

<form method="post" action="/changestatus" >
@if(Auth::user()->id == 4)
    <button type="submit" formaction="/changestatus" class="btn btn-warning" onclick="return confirm('ยืนยันการแก้ไขข้อมูล ?')"><i class="fa fa-check-circle" aria-hidden="true"></i> แก้ไขสถานะผู้ใช้งาน</button>
@endif
<div class="container bootstrap snippet">

    <div class="row">
    @foreach( $users as $item )
        <div class="col-md-4">
            <div class="widget-head-color-box lazur-bg p-lg text-center">
                <img src="/uploads/images/user/{{$item->picture_user}}" width="45%" class="img-circle circle-border m-b-md" alt="profile">
                <div class="m-b-md">
                <h2 class="font-bold no-margins">
                    Name : {{$item->name}}
                </h2>
                </div>
            </div>
            <div class="widget-text-box">
                <p>E-mail : {{$item->email}}</p>
                @if($item->level =="admin")
                <p class="media-heading">Status : <span class="label label-danger">{{$item->level}}</span></p>
                @elseif($item->level =="user")
                <p class="media-heading">Status : <span class="label label-success">{{$item->level}}</span></p>
                @endif
                <?php $is_user=($item->level=="user"); ?>
                @if(Auth::user()->name == "Sirirat_n")
                    @if($is_user)
                    <input type="checkbox" name="status_checkbox{{$item->id}}"> Admin
                    @else
                    <input type="checkbox" name="status_checkbox{{$item->id}}"  checked> Admin
                    @endif
                @endif
                <p>ยอดการเข้าใช้บริการ :
                @for($i = 0 ; $i < count($amount) ; $i++ ) 
                @if($amount[$i]->user_id == $item->id)
                {{$amount[$i]->cnt}}
                @endif
                @endfor
                </p>
                <div class="text-right">
                    <div class="form-inline">
                    <a href="show/{{$item->id}}/user" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> ดูรายละเอียด</a>
                    @if($item->name == Auth::user()->name)
                    <a class='btn btn-warning btn-xs' href="edit/{{$item->id}}/user"> <i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
                    @endif    
                       
                    <input type="hidden" name="_method" value="Delete">
                    <a href="delete/{{$item->id}}/user" class="btn btn-danger btn-xs" onclick="return confirm('ท่านต้องการลบผู้ใช้งานใช่หรือไม่ ?')"><i class="fa fa-trash"></i> ลบผู้ใช้งาน</a>
                    {{csrf_field()}}
                    
                    </div>
                </div>
            </div>
        </div> 

    @endforeach   

  </div>
   
</div>

</form>
     <script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
</script>   
@endsection