<!-- date_header.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-tab.css')}}">
</head>
<body>

<div id="user-profile-2" class="user-profile">
    <div class="tabbable">
      <ul class="nav nav-tabs padding-18">
         <?php
         $dates = DB::table('appoints')->select('date')->orderBy('date','asc')->distinct()->get();
         ?>
        @foreach($dates as $d)
        
        <li > 
          <a href="#">
             <i class="red ace-icon fa fa-calendar bigger-120"></i>
                    วันที {{$d->date}}                                   
          </a>      
        </li>
                                             
         
        @endforeach
      </ul>
    </div><!-- /.row -->
  <div class="space-20"></div>
</div><!-- /#home -->
</body>
</html>