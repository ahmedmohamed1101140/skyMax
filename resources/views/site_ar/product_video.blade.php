@extends('layouts.container_ar')
@section('title')SkyMax | منتج فيديو@endsection
@section('content')

    <div id="page-inside" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{url("/ar")}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="container">

            <ol class="breadcrumb bread-primary ">
                <a href="#" class="btn btn-primary">انت هنا</a>
                @if($product->category)
                    <li><a href="#">{{$product->category->namear}}</a></li>
                @endif
                @if($product->sub_category)
                    <li><a href="#">{{$product->sub_category->namear}}</a></li>
                @endif
                <li class="active">{{$product->name_ar}}</li>
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
                                                <div class=" active item slide"
                                                     data-slide-number="0"
                                                     data-thumb="img/product1.jpg">
                                                    <a href="{{$product->img}}"
                                                       title="Pink Printed Dress - Front View"
                                                       data-lightbox="gallery-item"><img
                                                        src="{{asset('images/product/'.$product->img)}}">
                                                    </a>
                                                </div>
                                            </div><!-- Carousel nav -->
                                            <a class="left carousel-control" href="#myCarousel"
                                               role="button"
                                               data-slide="prev">
                                            </a>
                                            <a class="right carousel-control"
                                               href="#myCarousel"
                                               role="button"
                                               data-slide="next">
                                            </a>
                                        </div>
                                        <div class="row hidden-xs" id="slider-thumbs">
                                            <ul class="hide-bullets">)
                                                <li class="col-sm-2 no-pd">
                                                    <a class="thumbnail" id="carousel-selector-0"><img
                                                                src="{{asset('images/product/'.$product->img)}}"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-7 col-xs-12 details">
                                <h3>{{$product->name_ar}}</h3>
                                @auth
                                <div class="prc1 col-md-7 no-pd col-xs-12">
                                    @if($product->discount)
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                                            <h3 class="prch1">السـعر. <span class="prcno strikethrough">{{$product->price}}
                                                    جـ</span></h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                                            <h3 class="prch2">العـرض. <span class="prcno1">{{$product->disccount}}
                                                    جـ</span></h3>
                                        </div>
                                    @else
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                                            <h3 class="prch1">السعر. {{$product->price}}جـ</h3>
                                        </div>
                                    @endif
                                </div>
                                @endauth

                                <div class="clearfix"></div>
                                @if($product->type == 1)
                                    <div class="col-md-6 col-xs-12 modq no-pd">
                                        <h4>مصاريف الشحن <span>{{$product->shipping_fees}} EGP </span></h4>
                                    </div>
                                @endif
                                <div class="col-md-6 col-xs-12 modq no-pd ">
                                    <h4>الكميه <span>{{$product->amount}}</span></h4>
                                </div>
                                <div class="clearfix"></div>
                                @if($product->type == 0)
                                    <div class="col-md-6 col-xs-12 modq no-pd">
                                        <h4>العموله <span>{{$product->commission}} EGP </span></h4>
                                    </div>
                                @endif

                                <div class="col-md-6 col-xs-12 modq no-pd ">
                                    @if($product->type == 1)
                                        <h4>النـوع <span>مؤهل </span></h4>
                                    @elseif($product->type == 0)
                                        <h4>النـوع: <span>مميز</span></h4>
                                    @endif
                                </div>

                                <div class="clearfix"></div>
                                <div class='rating-stars'>

                                </div>
                                <div class="desc">
                                    <h4>الوصف:</h4>
                                    <p>{{strip_tags($product->details_ar)}}</p>
                                </div>

                                @auth
                                @if(auth()->user()->activation == 1 && $product->type == 2)
                                    <a href="#squarespaceModal-order" data-toggle="modal"
                                       data-product_id="{{$product->id}}"
                                       class="btn btn-form nwbtn1 add"><span class="cart"></span> شراء</a>
                                @elseif(auth()->user()->activation == 0 && $product->type == 1)
                                    <a href="#squarespaceModal-order" data-toggle="modal"
                                       data-product_id="{{$product->id}}"
                                       class="btn btn-form nwbtn1 add"><span class="cart"></span> شراء</a>
                                @else
                                    <a href="#squarespaceModal-error" data-toggle="modal"
                                       data-product_id="{{$product->id}}"
                                       class="btn btn-form nwbtn1 add" disabled><span class="cart"></span> شراء</a>
                                @endif
                                @endauth
                                @guest
                                <a href="#squarespaceModal-error" data-toggle="modal"
                                   data-product_id="{{$product->id}}"
                                   class="btn btn-form nwbtn1 add" disabled><span class="cart"></span> شراء</a>
                                @endguest

                            </div>
                        </div>


                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection
@section('js')
    <script>
        $('.add').click(function () {
            id = $(this).data('product_id');
            $("#product_id_input").val(id);
        })
    </script>
@endsection
<div class="modal fade" id="squarespaceModal-order" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">

                    <section id="first-tab-group2" class="tabgroup2">

                        @auth
                        <form method="post" action="{{url("/ar/order")}}">
                            @csrf
                            <input id="product_id_input" type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="clearfix"></div>
                            <div class="form-group nw-pd">
                                كلمه المرور الداخليه<input required name="password" type="password" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-form nwbtn1">شراء</button>

                        </form>
                        @endauth
                    </section>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="squarespaceModal-error" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <h2 class="rd text-center"><i class="fa fa-close"></i> عفوا!</h2>
                <h5 class="rd text-center">ليس لديك الاذن لشراء هذا المنتج</h5>
            </div>
        </div>
    </div>
</div>