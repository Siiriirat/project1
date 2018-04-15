<!-- header.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-tab.css')}}">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div id="user-profile-2" class="user-profile">
    <div class="tabbable">
      <ul class="nav nav-tabs padding-18">
         <?php
         $users = DB::table('users')->where('level','admin')->get();
         ?>
        @foreach($users as $u)
        <li class="{{$u->name==$name?'active':''}}"> 
          <a href="/showstaff/{{$u->name}}">
            <i class="green ace-icon fa fa-user bigger-120"></i>
                    ช่าง {{$u->name}}                                   
          </a>      
        </li>
        @endforeach
      </ul>
    </div><!-- /.row -->
  <div class="space-20"></div>
</div><!-- /#home -->
</body>
</html>