<!-- show_info.blade.php -->
@extends('template_nav')
@section('title','Appointment')
<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap-show_info.css')}}">
@section('content')
<br><br><br><br>
<div class="row">
  <div class="col-md-3">
    <a href="{{ URL::previous() }}" class="btn btn-success"><i class="fa fa-hand-o-left" ></i></a>
  </div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
  <div class="col-md-3"></div>
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
                                            <h3 class="panel-title">{{$information->topic_info}}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                              <center>
                                                <img src="/uploads/images/news/{{$information->picture_info}}"  class="img-responsive img-rounded"> 
                                              </center>
                                              <br>
                                                {{$information->detail_info}}
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
  
        
@endsection