@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')

    <div class="slider-container">
        <div class="logo">
            <a href="{{asset("assets/")}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png" width="216"
                                                               height="70"></a>
        </div>
        <div class="aslider" data-slide="aslider" data-speed="1000" data-wait="4000" data-preview="true"
             data-dots="true">


            <div id="s1" class="slide1">
                <img src="{{asset("assets/")}}/img/slide1-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>


                </div>

            </div>
            <div id="s2" class="slide1">
                <img src="{{asset("assets/")}}/img/slide2-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>


                </div>
            </div>
            <div id="s3" class="slide1">
                <img src="{{asset("assets/")}}/img/slide3-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>


                </div>

            </div>


        </div>
    </div>

    <div class="contents">

        <div class="container-fluid">
            <div class="col-md-2 col-sm-3 col-xs-12 ">
                <div class="side-bar">
                    <div class="types">
                        <h2>Type</h2>

                        <form class="buttons">
                            <label>
                                <input type="checkbox" name="check">
                                <span class="label-text">All</span>
                                </input>
                            </label>
                            <br/>
                            <label>
                                <input type="checkbox" name="check"> <span class="label-text">Qualified Products</span>
                                </input>
                            </label>
                            <br/>
                            <label>
                                <input type="checkbox" name="check"> <span class="label-text">Premium Products</span>
                                </input>
                            </label>
                        </form>
                    </div>

                    <div class="categs">
                        <h2>Categories</h2>

                        <form id="categories_form" class="buttons">
                            @foreach($categories as $category)
                                <label>
                                    <input class="category" onchange="getSubCategories()"
                                           type="checkbox" value="{{$category->id}}">
                                    <span class="label-text">{{$category->name}}</span>
                                </label>
                                <br/>
                            @endforeach

                        </form>
                    </div>

                    <div class="sub_categs">

                        <h2>Sub Categories</h2>

                        <form id="sub_categories_form" class="buttons">
                            <div id="sub_categories_container">
                                <label>

                                </label>
                                <br/>
                            </div>
                        </form>

                    </div>
                </div>


            </div>

            <div class="col-md-10 col-sm-9 col-xs-12 no-pd">
                <div class="prdct-box clearfix">
                    <div id="filter" class="clearfix ">

                        <div class="col-md-7 col-sm-6 col-xs-12 no-pd1">
                            <div class="filter-container">
                                <form id="register-newsletter">
                                    <input type="text" name="newsletter" required placeholder="What Do You Want?">
                                    <button type="submit" class="btn btn-custom-3">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-6 col-xs-12 no-pd1">

                            <form class="myform">
                                <label>Price:</label>
                                <input name="from" type="text" placeholder="From">

                                <input name="from" type="text" placeholder="To">
                                <button type="submit" class="btn btn-custom-3">Filter</button>

                            </form>

                        </div>

                    </div>

                    <div id="products_container" class="list clearfix">

                        @foreach($products as $product)
                            <div class="element element-in">
                                <h3><a href="{{url("products/$product->id")}}">{{$product->name}}</a></h3>
                                <a href="{{url("products/$product->id")}}"><img
                                            src="{{$product->main_image}}" class="img-responsive"/></a>
                                <p style="word-break: break-word">
                                    {{substr($product->desc,0,120)}}
                                </p>
                                <a href="{{url("products/$product->id")}}"><strong>More..</strong></a>
                                <h5 class="price">
                                    @if($product->offer)
                                        <span>{{$product->price}}LE</span>
                                        {{$product->offer->new_price}} LE
                                    @else {{$product->price}} LE
                                    @endif
                                </h5>
                                @guest
                                    <a href="#squarespaceModal" data-toggle="modal"
                                       class="btn btn-form nwbtn add "><span class="cart"></span> Order</a>
                                @endguest
                                @auth
                                    @if(auth()->user()->qualified ==1)
                                        <a class="btn btn-form nwbtn add"><span class="cart"></span> Order</a>
                                    @else
                                        @if($product->type == '1')
                                            <a class="btn btn-form nwbtn add"><span class="cart"></span> Order</a>
                                        @else
                                            <label class="btn btn-form nwbtn add gray_btn"><span class="cart"></span>
                                                Order</label>
                                        @endif
                                    @endif
                                @endauth
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
        function getProducts() {

            var sub_category_ids = [];
            $("#sub_categories_form .sub_category").each(function () {
                if ($(this).is(":checked")) {
                    sub_category_ids.push($(this).val());
                }
            });
            $.post(location + "ajax/getProducts",
                {
                    sub_category_ids: JSON.stringify(sub_category_ids)
                },
                function (data, status) {
                    console.log(data);
                    $("#products_container").empty();
                    $.each(data, function (index) {


                        $("#products_container").append("  <div class='element element-in'>\n" +
                            "                                <h3><a href='" + location + "products/" + data[index].id + "'>" + data[index].name + "</a></h3>\n" +
                            "                                <a href='{{url('products/$product->id')}}'><img\n" +
                            "                                            src='" + data[index].main_image + "' class='img-responsive'/></a>\n" +
                            "                                <p style='word-break: break-word'>\n" +
                            "                                    " + data[index].desc + "\n" +
                            "                                </p>\n" +
                            "                                <a href='{{url('products/$product->id')}}'><strong>More..</strong></a>\n" +
                            "                                <h5 class='price'><span>" +

                            "                                        " + data[index].price + "LE</span>\n" +
                            "                                        " + data[index].offer.new_price + " LE\n" +
                            "                                    @else " + data[index].price + " LE\n" +
                            "                                    @endif\n" +
                            "                                </h5>\n" +
                            "                                @guest\n" +
                            "                                    <a href='#squarespaceModal' data-toggle='modal'\n" +
                            "                                       class='btn btn-form nwbtn add '><span class='cart'></span> Order</a>\n" +
                            "                                @endguest\n" +
                            "                                @auth\n" +
                            "                                    @if(auth()->user()->qualified ==1)\n" +
                            "                                        <a class='btn btn-form nwbtn add'><span class='cart'></span> Order</a>\n" +
                            "                                    @else\n" +
                            "                                        @if($product->product_type_id == 1)\n" +
                            "                                            <a class='btn btn-form nwbtn add'><span class='cart'></span> Order</a>\n" +
                            "                                        @else\n" +
                            "                                            <label class='btn btn-form nwbtn add gray_btn'><span class='cart'></span>\n" +
                            "                                                Order</label>\n" +
                            "                                        @endif\n" +
                            "                                    @endif\n" +
                            "                                @endauth\n" +
                            "                            </div>");

                    });


                });


        }
    </script>
@endsection
