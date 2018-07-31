@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
	<div id="page-inside2" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        	<div class="event-title">
            	<h1>Our Events</h1>
                <p>If you are a visitor and do not have a membership in our site
a registered member must register for you to use our services.
</p>
            </div>
           
          </div>
		
    </div>
    <div class="contents">
    	<div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 no-pd"> 
            	<div id="filter" class="clearfix nwfilter">
                <div class="filter-container nw-filter">
            	<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 col-xs-12">
                	<form id="register-newsletter">
                    <input type="text" name="newsletter" required placeholder="What Do You Want?">
                    <button type="submit" class="btn btn-custom-3" >Search</button>
                	</form>
                </div>
                </div>  
                
              </div>
	  			<div class="col-md-3 col-sm-6 col-xs-12">
               	  <div class="event">
                   	<h3>Event Name</h3>
                   	<img src="{{asset("assets/")}}/img/event.jpg"  class="img-responsive">
                    <p>01/01/2018</p>
                    <p>03:00 PM - 04:00 PM</p>
                    <p>Sheraton, Cairo, Egypt</p>
                    <a  class="btn nwbtn2" href="{{asset("assets/")}}/#squarespaceModal-3" data-toggle="modal">Details</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
               	  <div class="event">
                   	<h3>Event Name</h3>
                   	<img src="{{asset("assets/")}}/img/event.jpg"  class="img-responsive">
                    <p>01/01/2018</p>
                    <p>03:00 PM - 04:00 PM</p>
                    <p>Sheraton, Cairo, Egypt</p>
                    <a  class="btn nwbtn2" href="{{asset("assets/")}}/#squarespaceModal-3" data-toggle="modal">Details</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
               	  <div class="event">
                   	<h3>Event Name</h3>
                   	<img src="{{asset("assets/")}}/img/event.jpg"  class="img-responsive">
                    <p>01/01/2018</p>
                    <p>03:00 PM - 04:00 PM</p>
                    <p>Sheraton, Cairo, Egypt</p>
                    <a  class="btn nwbtn2" href="{{asset("assets/")}}/#squarespaceModal-3" data-toggle="modal">Details</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
               	  <div class="event">
                   	<h3>Event Name</h3>
                   	<img src="{{asset("assets/")}}/img/event.jpg"  class="img-responsive">
                    <p>01/01/2018</p>
                    <p>03:00 PM - 04:00 PM</p>
                    <p>Sheraton, Cairo, Egypt</p>
                    <a  class="btn nwbtn2" href="{{asset("assets/")}}/#squarespaceModal-3" data-toggle="modal">Details</a>
                    </div>
                </div>
    
   			</div>
        </div>
    
    </div>
@endsection