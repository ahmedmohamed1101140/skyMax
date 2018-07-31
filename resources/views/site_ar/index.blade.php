@extends('layouts.container_ar')
@section('title')SkyMax @endsection
@section('css')

@endsection
@section('content')

    <div class="slider-container">
        <div class="logo">
            <a href="{{url('/ar')}}" target="_self"><img src="{{asset("assets_ar/")}}/img/logo.png" width="216"
                                                               height="70"></a>
        </div>
        <div class="aslider" data-slide="aslider" data-speed="1000" data-wait="4000" data-preview="true"
             data-dots="true">
            {{--@foreach($sliders as $slider)--}}
                {{--<div id="s1" class="slide1">--}}
                    {{--<img src="{{asset('images/product/'.$slider->img)}}">--}}
                    {{--<div class="caption">--}}
                        {{--<h1> {{$slider->title_ar}}</h1>--}}
                        {{--<p>--}}
                            {{--{{$slider->details_ar}}--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
            <div id="s1" class="slide1">
                <img src="{{asset("assets/")}}/img/slide1-full.jpg">
                <div class="caption">
                    <h1>مكانك الأفضل للتسوق</h1>
                    <p>إذا كنت زائرا وليس لديك عضوية في موقعنا
                        يجـب على العضو التسجـيل لاستخدام خدماتنا.
                    </p>
                </div>
            </div>
            <div id="s2" class="slide1">
                <img src="{{asset("assets/")}}/img/slide2-full.jpg">
                <div class="caption">
                    <h1>مكانك الأفضل للتسوق</h1>
                    <p>إذا كنت زائرا وليس لديك عضوية في موقعنا
                        يجـب على العضو التسجـيل لاستخدام خدماتنا.
                    </p>
                </div>
            </div>
            <div id="s3" class="slide1">
                <img src="{{asset("assets/")}}/img/slide3-full.jpg">
                <div class="caption">
                    <h1>مكانك الأفضل للتسوق</h1>
                    <p>إذا كنت زائرا وليس لديك عضوية في موقعنا
                        يجـب على العضو التسجـيل لاستخدام خدماتنا.
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="contents">
        <div class="container-fluid">
            <div class="col-md-2 col-sm-3 col-xs-12 ">
                <div class="navbar-header visible-me " >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse visible-me no-pd">
                    <div class="side-bar">
                        <form id="formName" method="post" action="{{url("ar/products")}}" class="buttons">
                            @csrf
                            <div class="types">
                                <h2>التصنيف</h2>
                                <label>
                                        <input name="product_type_id"  value="3" type="checkbox" >
                                        <span class="label-text">الكل</span>
                                    </label>
                                    <br />
                                    <label>
                                        <input value="1" type="checkbox" name="product_type_id"> <span class="label-text">المنتجات المؤهلة</span>
                                    </label>
                                    <br />
                                    <label>
                                        <input value="2" type="checkbox" name="product_type_id"> <span class="label-text">المنتجات المميزه</span>
                                    </label>
                            </div>
                            <hr style="width: 220px;border-top:8px solid #eee;">
                            @foreach($categories as $category)
                                 <ul class="expander-list categs">
                                <li> <span class="name"> <span class="expander">-</span> <a style="font-size: 18px;" href="#">{{$category->namear}}</a> </span>
                                    <ul>
                                        <li >
                                            <label>
                                                <input type="checkbox" value="{{$category->id}}">
                                                  <span class="label-text">الكل</span>
                                            </label>
                                        </li>
                                        @foreach($category->sub_category as $sub_category)
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="sub_category_id[]" value="{{$sub_category->id}}">
                                                        <span class="label-text">{{$sub_category->namear}}</span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                        </form>
                    </div>
                </div>

            </div>

            {{--<div class="col-md-2 col-sm-3 col-xs-12 ">--}}
                {{--<div class="side-bar">--}}
                    {{--<form id="formName" method="post" action="{{url("products")}}" class="buttons">--}}
                        {{--@csrf--}}
                        {{--<div class="types">--}}
                            {{--<h2>Type</h2>--}}
                            {{--<label>--}}
                                {{--<input value="3" type="checkbox" name="product_type_id">--}}
                                {{--<span class="label-text">All</span>--}}
                                {{--</input>--}}
                            {{--</label>--}}
                            {{--<br/>--}}
                            {{--<label>--}}
                                {{--<input value="1" type="checkbox" name="product_type_id"> <span class="label-text">Qualified Products</span>--}}
                                {{--</input>--}}
                            {{--</label>--}}
                            {{--<br/>--}}
                            {{--<label>--}}
                                {{--<input value="2" type="checkbox" name="product_type_id"> <span class="label-text">Premium Products</span>--}}
                                {{--</input>--}}
                            {{--</label>--}}
                        {{--</div>--}}

                        {{--<div class="categs">--}}
                            {{--<h2>Categories</h2>--}}
                            {{--<div id="categories_form" class="buttons">--}}
                                {{--@foreach($categories as $category)--}}
                                    {{--<label>--}}
                                        {{--<input name="category_id[]" class="category" onchange="getSubCategories()"--}}
                                               {{--type="checkbox" value="{{$category->id}}">--}}
                                        {{--<span class="label-text">{{$category->name}}</span>--}}
                                    {{--</label>--}}
                                    {{--<br/>--}}
                                    {{--@foreach($category->sub_category as $sub_category)--}}
                                        {{--<label style="margin-left: 15px;">--}}
                                            {{--<input name="sub_category_id[]" class="category" onchange="getSubCategories()"--}}
                                                   {{--type="checkbox" value="{{$sub_category->id}}">--}}
                                            {{--<span class="label-text">{{$sub_category->name}}</span>--}}
                                        {{--</label>--}}
                                        {{--<br/><br>--}}
                                    {{--@endforeach--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="sub_categs">--}}
                            {{--<h2>Sub Categories</h2>--}}
                            {{--<div id="sub_categories_container">--}}
                                {{--@foreach($sub_categories as $sub_category)--}}
                                {{--<label>--}}
                                    {{--<input name="sub_category_id[]" class="category" onchange="getSubCategories()"--}}
                                           {{--type="checkbox" value="{{$sub_category->id}}">--}}
                                    {{--<span class="label-text">{{$sub_category->name}}</span>--}}
                                {{--</label>--}}
                                {{--<br/>--}}
                                {{--@endforeach--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="sub_categs">--}}
                            {{--<h2>Sub Categories</h2>--}}
                            {{--<div id="sub_categories_container">--}}
                                {{--<label for="show-menu1" class="show-menu1">Show Menu</label>--}}
                                {{--<input type="checkbox" id="show-menu1" role="button">--}}
                                {{--<ul id="menu">--}}
                                    {{--<li><a href="#">Home</a></li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">About ?</a>--}}
                                        {{--<ul class="hidden1">--}}
                                            {{--<li><a href="#">Who We Are</a></li>--}}
                                            {{--<li><a href="#">What We Do</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">Portfolio ?</a>--}}
                                        {{--<ul class="hidden1">--}}
                                            {{--<li><a href="#">Photography</a></li>--}}
                                            {{--<li><a href="#">Interface Design</a></li>--}}
                                            {{--<li><a href="#">Illustration</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}

                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--@if(count($categories->all())>0)--}}
                            {{--<button type="submit" class="btn btn-custom-3">Search</button>--}}
                        {{--@endif--}}
                    {{--</form>--}}

                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-10 col-sm-9 col-xs-12 no-pd">
                <div class="prdct-box clearfix">
                    <div id="filter" class="clearfix ">
                    <form method="post" action="{{url("ar/products/search")}}" id="register-newsletter" class="myform">
                        @csrf
                        <div class="col-md-7 col-sm-6 col-xs-12 no-pd1">
                            {{--<form method="post" action="{{url("products/search")}}" id="register-newsletter">--}}
                                {{--@csrf--}}
                            <div class="filter-container">
                                    <input type="text" value="{{session()->get('key')}}"  name="key"   placeholder="ماذا تريد ؟">
                                    <button type="submit" class="btn btn-custom-3">البحث</button>
                                {{--</form>--}}
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-6 col-xs-12 no-pd1">

                            {{--<form method="post" action="{{url("products/filter")}}" class="myform">--}}
                                {{--@csrf--}}
                                <label>السعر</label>
                                <input name="from"  type="text" value="{{session()->get('from')}}" placeholder="من">

                                <input name="to" type="text" placeholder="إلى" value="{{session()->get('to')}}" >
                                <button type="submit" required class="btn btn-custom-3">فلتر</button>
                            {{--</form>--}}

                        </div>
                    </form>
                    </div>

                    <div id="products_container" class="list clearfix">
                        @foreach($products as $product)
                            <div class="element element-in" style="margin-bottom: 90px;">
                                <h3 style="height: 50px;"><a href="{{url("ar/products/$product->id")}}">{{$product->name_ar}}</a></h3>
                                <a href="{{url("products/$product->id")}}">
                                    <img width="240" height="180"
                                         src="{{asset('images/product/'.$product->image)}}" style="height: 230px;" alt="Product Image"
                                         class="img-responsive"/>
                                </a>
                                <p style="word-break: break-word">
                                    {{strip_tags( substr($product->details_ar,0,180))}}
                                </p>
                                <a href="{{url("ar/products/$product->id")}}"><strong>المزيد</strong></a>
                                @if (Auth::check())
                                    <h5 class="price">
                                        @if($product->discount > 0)
                                            <span>{{$product->price}}جــ</span>
                                            {{$product->discount}} جــ
                                        @else
                                            {{$product->price}} جــ
                                        @endif
                                    </h5>
                                @elseif($product->type == 1)
                                    <h5 class="price">
                                        @if($product->discount > 0)
                                            <span>{{$product->price}}جــ</span>
                                            {{$product->discount}} جــ
                                        @else
                                            {{$product->price}} جــ
                                        @endif
                                    </h5>
                                @endif

                                @if (Auth::check())
                                    @if(auth()->user()->activation == 1 && $product->type == 2)
                                        <a href="{{url("ar//products/$product->id")}}"
                                           class="btn btn-form nwbtn add"><span class="cart"></span> اطلب </a>
                                    @elseif(auth()->user()->activation == 0 && $product->type == 1)
                                            <a href="{{url("ar/products/$product->id")}}"
                                               class="btn btn-form nwbtn add"><span class="cart"></span> اطلب </a>
                                    @else
                                        <label class="btn btn-form nwbtn add gray_btn" disabled>
                                            <span class="cart" ></span>أطلب
                                        </label>
                                    @endif
                                @else
                                    <a href="#squarespaceModal-error" data-toggle="modal"
                                       class="btn btn-form nwbtn add gray_btn" ><span class="cart"></span> اطلب </a>
                                @endif
                            </div>
                        @endforeach
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
    <script>

        $(document).ready(function(){
            $("#formName").on("change", "input:checkbox", function(){
                $("#formName").submit();
            });
        });

    </script>
@endsection
<div class="modal fade" id="squarespaceModal-error" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <h2 class="rd text-center"><i class="fa fa-close"></i> عفوا !</h2>
                <h5 class="rd text-center">يجب عليك تسجيل الدخول اولا للتمكن من كلب هذا المنتج</h5>
            </div>
        </div>
    </div>
</div>


