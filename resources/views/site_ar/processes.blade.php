@extends('layouts.container_ar')
@section('title')SkyMax | العمليات والإجرائات @endsection
@section('content')
	<div id="page-inside6" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{url('/ar')}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        	<div class="event-title">
                <h1>العمليات والاجراءات</h1>
                <p>{{$item->main_paragraph_ar}}</p>
            </div>
           
          </div>
		
    </div>
    <div class="contents">
    	<div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 no-pd"> 
            	<div class="padd-all-30">
	  			<div class="col-md-7 col-sm-6 col-xs-12">
                   	<h2>{{$item->h1_ar}}</h2>
                   	<p>{{$item->p1_ar}}</p>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <img style="width: 400px; height: 250px;" src="{{asset('images/'.$item->img1)}}">
                </div>
             </div>
		  </div>
        </div>
        <div class="blue-bg">
        	<div class="container">
             <div class="col-md-6 col-xs-12 col-sm-6">
                 <img style="width: 400px; height: 250px;" src="{{asset('images/'.$item->img2)}}">
             </div>
             
             <div class="col-md-6 col-xs-12 col-sm-6 white">
              <h3>{{$item->h2_ar}}</h3>
              <p>{{$item->p2_ar}}</p>
             </div>
            
            </div>
        </div>
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 no-pd"> 
             <div class="padd-all-30">
            	<div class="col-md-5 col-sm-6 col-xs-12">
                    <img style="width: 400px; height: 250px;" src="{{asset('images/'.$item->img3)}}">
                </div>
	  			<div class="col-md-7 col-sm-6 col-xs-12">
                   	<h2>{{$item->h3_ar}}</h2>
                   	<p>{{$item->p3_ar}}</p>
                </div>
             </div>   
		  </div>
        </div>
    
    </div>

@endsection