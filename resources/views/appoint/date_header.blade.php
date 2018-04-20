<!-- date_header.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-tab.css')}}">
</head>
<body>


      <ul class="nav nav-tabs">
         <?php
         $dates = DB::table('appoints')->select('date')->orderBy('date','asc')->where('staff',$name)->distinct()->get();
         ?>
        <li class="active"> 
          <a data-toggle="tab" href="#all">
             <i class="red ace-icon fa fa-calendar bigger-120"></i>
                    all                                   
          </a>      
        </li>
        @foreach($dates as $d)
        
        <li> 
          <a data-toggle="tab" href="#{{$d->date}}">
             <i class="red ace-icon fa fa-calendar bigger-120"></i>
                    {{$d->date}}                                   
          </a>      
        </li>
                                          
        @endforeach
      </ul>
</body>
</html>