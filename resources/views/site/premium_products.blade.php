@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
	<div id="page-inside" class="insd">
    	<div class="top-bg"></div>
          <div class="logo">
            	<a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
            </div>
          
		  <div class="container">
        
           <ol class="breadcrumb bread-primary ">
          <a href="{{asset("assets/")}}/#" class="btn btn-primary">Path</a>
            <li><a href="{{asset("assets/")}}/#">Women Care</a></li>
            <li><a href="{{asset("assets/")}}/#">Persinal care</a></li>
            <li class="active">L'Oreal Paris Magic Smooth Souffle Blush, 0.30 Ounce</li>
            
        </ol>
          </div>
		
    </div>
    <div class="contents">
    	<div class="container">
        	
            
            <div class="col-sm-12 col-md-12 col-lg-12 content-center"> 
	<div class="product-details" id="prdct">
        	  <div id="main_area">
                
                <div class="row">
                    <div class="col-xs-12 col-md-5" id="slider">
                       
                        <div class="row">
                            <div class="col-md-12" id="carousel-bounding-box">
                                <div class="carousel slide" id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner" data-lightbox="gallery">
                                        <div class="active item slide" data-slide-number="0"  data-thumb="img/product1.jpg">
                                        <a href="{{asset("assets/")}}/img/product1.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product1.jpg">
                                        </a>
                                        
                                        </div>

                                        <div class="item slide" data-slide-number="1" data-thumb="img/product2.jpg">
                                        <a href="{{asset("assets/")}}/img/product2.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product2.jpg">
                                        </a>
                                        
                                        
                                        </div>

                                        <div class="item slide" data-slide-number="2" data-thumb="img/product1.jpg">
                                        <a href="{{asset("assets/")}}/img/product1.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product1.jpg">
                                        </a>
                                        </div>

                                        <div class="item slide" data-slide-number="3" data-thumb="img/product2.jpg">
                                        <a href="{{asset("assets/")}}/img/product2.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product2.jpg">
                                        </a>
                                        </div>

                                        <div class="item slide" data-slide-number="4" data-thumb="img/product1.jpg">
                                        <a href="{{asset("assets/")}}/img/product1.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product1.jpg">
                                        </a>
                                        </div>

                                        <div class="item slide "  data-slide-number="5" data-thumb="img/product1.jpg">
                                         <a href="{{asset("assets/")}}/img/product1.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset("assets/")}}/img/product1.jpg">
                                        </div>
                                    </div><!-- Carousel nav -->
                                    <a class="left carousel-control" href="{{asset("assets/")}}/#myCarousel" role="button" data-slide="prev">
                                    </a>
                                    <a class="right carousel-control" href="{{asset("assets/")}}/#myCarousel" role="button" data-slide="next">
                                    </a>                                
                                    </div>
                                <div class="row hidden-xs" id="slider-thumbs">
                                 <ul class="hide-bullets">
                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail" id="carousel-selector-0"><img src="{{asset("assets/")}}/img/small.png"></a>
                            </li>

                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail" id="carousel-selector-1"><img src="{{asset("assets/")}}/img/product2.jpg"></a>
                            </li>

                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail" id="carousel-selector-2"><img src="{{asset("assets/")}}/img/small.png"></a>
                            </li>

                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail" id="carousel-selector-3"><img src="{{asset("assets/")}}/img/small.png"></a>
                            </li>

                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail" id="carousel-selector-4"><img src="{{asset("assets/")}}/img/small.png"></a>
                            </li>

                            <li class="col-sm-2 no-pd">
                                <a class="thumbnail " id="carousel-selector-5"><img src="{{asset("assets/")}}/img/small.png"></a>
                            </li>
                        </ul>                 
                                </div> 
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-md-7 col-xs-12 details">
                    	<h3>L'Oreal Paris Magic Smooth Souffle Blush, 0.30 Ounce</h3>
                        <div class="prc1  col-md-7 no-pd col-xs-12">
                        	<div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                             <h3 class="prch1">Price. <span class="prcno strikethrough">130 EGP</span></h3>
                            </div>
                            <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                             <h3 class="prch2">Offer. <span class="prcno1">120 EGP</span></h3>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-xs-12 modq no-pd">
                        	<h4>Shipping Fees: <span>60 EGP </span></h4>
                        </div>
                        <div class="col-md-6 col-xs-12 modq no-pd ">
                        	<h4>Quantity: <span>12990</span></h4>
                        </div>
                         <div class="clearfix"></div>
                        <div class="col-md-6 col-xs-12 modq no-pd">
                        	<h4>Commission: <span>10 EGP </span></h4>
                        </div>
                        <div class="col-md-6 col-xs-12 modq no-pd ">
                        	<h4>Type: <span>12990</span></h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class='rating-stars'>
                    
                  </div>
                        <div class="desc">
                         <h4>Description:</h4>
                            <p> As governor, he helped increase funding for education, government benefits, road construction,
and industrial diversification. He endorsed the Supreme Court's 1954 desegregation order in the case
of Brown v.Board of Education and appointed a biracial commission to oversee the successful integration
of the state's schools. As chair of the Southern Governors Conference in 1954 and 1955, he encouraged
other southern governors to accept and implement desegregation. Wetherby was limited to one term
by the state constitution. He ran for the US Senate in 1956, but his successor as governor, fellow Democrat
A. B. "Happy" Chandler, failed to support his campaign, and he lost to Republican John Sherman Cooper.
From 1964 to 1966, Wetherby served on a commission charged with revising the state constitution,
and in 1966 he was elected to the Kentucky Senate, where he provided leadership in drafting the state
budget. After retiring from politics, he became an executive at Brighton Engineering.</p>
                        </div>
                        
                        <a  class="btn btn-form nwbtn1 " href="{{asset("assets/")}}/#squarespaceModal-1" data-toggle="modal" ><span class="cart"></span> Buy</a>
                        
                    </div>
                </div>

                
        </div>
        
    
    </div>  
    
    </div>
        
        </div>
    
    </div>

@endsection