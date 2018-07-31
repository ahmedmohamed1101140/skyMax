@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')


	<div id="page-inside7" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        	<div class="event-title">
            	<h1>Contact Us</h1>
                <p>{{$item->p1}}</p>

            </div>
           
          </div>
		
    </div>
    <div class="contents">
     <div class="section-5 light-gray">
    	<div class="container">
                <div class="row margin-top-large">
                 <div class="col-md-10 col-md-offset-1">
				    <div class="clearfix">
                  
                    <div class="col-md-5 margin-top">
                        <h3 class="section-title">Contact Us <span></span></h3>
                        <p class="myp">{{$item->p2}}</p>
                        <h4>Contact Us:</h4>
                        <p><i class="fa fa-phone"></i> {{$item->phone}}</p>
                        <p><i class="fa fa-phone"></i> {{$item->phone2}}</p>

                        <p><i class="fa fa-map-marker"></i> {{$item->eng_address}}</p>
                    </div>
                    
                    <div class="col-md-6 col-xs-12 col-sm-12 pull-right margin-top whity padding-all-24  ">
                      <div class="logregform">
                        <div class="feildcont">
        
            				<form action="{{url("contact")}}" method="post" role="form" class="clearfix">
                            	@csrf
                            	<div >
                                <label>Name <em>*</em></label>
                                  <div class="form-group clearfix">
                                    <input required name="name" type="text" class="effect-9 form-control" >
                                    <span class="focus-border"><i></i></span>
                                  </div>  
                                </div>
                
							   
                                <div >
            					<label>Email <em>*</em></label>
                                <div class="form-group clearfix">
                                <input required name="email" type="email" class="effect-9 form-control">
                                <span class="focus-border"><i></i></span>
                                </div>
                                </div>
                                <div >
                                <label>Mobile <em>*</em></label>
                                <div class="form-group clearfix">
                                    <input required name="phone" type="text" class="effect-9 form-control">
                                    <span class="focus-border"><i></i></span>
                                </div>    
                                </div>

                                <div >
                                    <label>Subject <em>*</em></label>
                                    <div class="form-group clearfix">
                                        <input required name="subject" type="text" class="effect-9 form-control" >
                                        <span class="focus-border"><i></i></span>
                                    </div>
                                </div>

                                <div >
                                <label>Message <em>*</em></label>
                                <div class="form-group clearfix">
                                 <textarea required rows="3" name="message" class="effect-9 form-control"></textarea>
                                  <span class="focus-border"><i></i></span>
                                </div>    
                                </div>
                
                                
                                
                               
                                <button type="submit" class="fbut">Submit</button>

                    
            				</form>
        
       				    </div>
        			  </div>
                    </div>
                  </div>  
                 </div>
                  
                </div>
            </div>
     </div>
     
     <div class="map">
{{--        {{ $map[0]->map}}--}}
       <iframe width="100%" height="336" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{asset("assets/")}}/https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=manhattan&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=52.152749,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Manhattan,+New+York&amp;t=m&amp;ll=40.784181,-73.966141&amp;spn=0.087345,0.32238&amp;z=12&amp;iwloc=A&amp;output=embed"></iframe>
     </div>
    </div>





@endsection