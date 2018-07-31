@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
	<div id="page-inside6" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        	<div class="event-title">
            	<h1>Infinity Founders</h1>
                <p>If there's a particular spot in your website where you can win people over, it's your About Us page. Here's how to make it look good.
</p>
            </div>
           
          </div>
		
    </div>
    <div class="contents">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                <div class="padd-all-30">
                    <div class="col-md-7 col-sm-6 col-xs-12">
                        <h2>{{$item->h1}}</h2>
                        <p>{{$item->p1}}</p>
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
                    <h3>{{$item->h2}}</h3>
                    <p>{{$item->p2}}</p>
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
                        <h2>{{$item->h3}}</h2>
                        <p>{{$item->p3}}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="featured">
            <h2 class="blue">Infinity Founders</h2>
            <div class="container">
                <div id="owl-example" class="owl-carousel">
                    @foreach($items as $item)
                        <div class="item ">
                            <img style="width: 150px; height: 150px;" alt="Espitalia" src="{{asset('images/founders/'.$item->image)}}">
                            <h4>Mr.{{$item->name}}</h4>
                            <h5>{{$item->position}}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>


@endsection
@section('js')

    <script type="text/javascript" src="{{asset("assets/")}}/js/functions.js"></script>
    <script src="{{asset("assets/")}}/js/owl.carousel.js"></script>
    <script>
        $("#owl-example").owlCarousel({

            // Most important owl features
            items : 4,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,1],
            singleItem : false,
            itemsScaleUp : false,

            //Basic Speeds
            slideSpeed : 200,
            paginationSpeed : 800,
            rewindSpeed : 1000,

            //Autoplay
            autoPlay : true,
            stopOnHover : false,

            // Navigation
            navigation : true,
            navigationText : ["",""],
            rewindNav : true,
            scrollPerPage : false,

            //Pagination
            pagination : false,
            paginationNumbers: false,

            // Responsive
            responsive: true,
            responsiveRefreshRate : 200,
            responsiveBaseWidth: window,



        })



    </script>

@endsection