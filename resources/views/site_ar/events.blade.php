@extends('layouts.container_ar')
@section('title')SkyMax | الفـاعليات@endsection
@section('content')
	<div id="page-inside2" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        	<div class="event-title">
            	<h1>الفعاليات</h1>
                <p>إذا كنت زائرا وليس لديك عضوية في موقعنا
                    يجب على العضو المسجل التسجيل لك لاستخدام خدماتنا.
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
                	<form method="post" action="{{url("ar/events/search")}}" id="register-newsletter">
                        @csrf
                        <input type="text" name="name" required placeholder="ماذا تريد؟">
                        <button type="submit" class="btn btn-custom-3" >البحث</button>
                	</form>
                </div>
                </div>  
                
              </div>
                @if(count($events) > 0 )
                    @foreach($events as $event)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="event">
                        <h3>{{$event->name_ar}}</h3>
                          {{--<img style="width: 150px; height: 150px;" alt="Espitalia" src="{{asset('images/founders/'.$item->image)}}">--}}
                          <img src="{{asset('images/events/'.$event->image)}}" style="width:500px; height: 300px;"  class="img-responsive">
                        <p>{{$event->date}}</p>
                        <p>{{$event->from_date}} - {{$event->to_date}}</p>
                        <p>{{$event->location_ar}}</p>
                        <a  class="btn nwbtn2" href="#squarespaceModal-3" data-event = {{$event}} data-toggle="modal">التفاصيل</a>
                        </div>
                    </div>
                    @endforeach
                @endif
   			</div>
        </div>
    
    </div>


@if(count($events) > 0)
    <div class="modal fade" id="squarespaceModal-3" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-body">
                                    <div class="event">
                                        <h3>{{$event->name_ar}}</h3>
                                        <div id="myCarousel" class="carousel slide nwcarsl " data-interval="6500" data-ride="carousel">

                                            <div class="item carousel-fade">
                                                <img src="{{asset('images/events/'.$event->image)}}"  class="img-responsive">
                                            </div>

                                        </div>

                                        <div class="descrp">
                                            <p><strong>{{$event->date}}</strong></p>
                                            <p><strong>{{$event->from_date}} - {{$event->to_date}}</strong></p>
                                            <p><strong>{{$event->location_ar}}</strong></p>
                                            <p>{{$event->details_ar}}</p>
                                            @if(auth()->user())
                                            <form method="post" action="{{url("/ar/events/request")}}">
                                                @csrf
                                                <input type="hidden" name="event_id" value="{{$event->id}}">
                                                <div class="form-group">
                                                    <input type="text" required name="name" class="form-control" placeholder="اسم المستخدم">
                                                </div>
                                                <div class="form-group col-md-6  lft">

                                                    <input type="number" required name="phone"  class="form-control" placeholder="رقم الهـاتف">
                                                </div>
                                                <div class="form-group col-md-6 rght" >
                                                    <input type="email" required name="mail"  class="form-control" placeholder="البـريد الإلكترونى">
                                                </div>
                                                    <button  class="btn nwbtn2" type="submit" >تسجيـل</button>
                                            </form>
                                            @endif
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
@endif

@endsection