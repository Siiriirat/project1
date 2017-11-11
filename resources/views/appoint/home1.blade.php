@extends('template_nav')
@section('title','Appointment')
@section('content')
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-slide.css')}}">
  </head>
  <body>
 <br><br>
 <!-- <center>
   <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-50" src="image/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="image/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-50" src="image/3.jpg" alt="Third slide">
    </div>
  </div>
  </div>
 </center> -->

<div class="accordian">
  <ul>
       <li>
      <div class="image_title">
        <a href="#">Beauty and Salon</a>
      </div>
      <a href="#">
     <img src="image/2.jpg">
      </a>
    </li>
          <li>
      <div class="image_title">
        <a href="#">Beauty and Salon</a>
      </div>
      <a href="#">
     <img src="image/3.jpg">
      </a>
    </li>
             <li>
      <div class="image_title">
        <a href="#">Beauty and Salon</a>
      </div>
      <a href="#">
     <img src="image/6.png">
      </a>
    </li>
                <li>
      <div class="image_title">
        <a href="#">Beauty and Salon</a>
      </div>
      <a href="#">
     <img src="image/4.jpg">
      </a>
    </li>
  </ul>
</div>




  
  </body>
@endsection