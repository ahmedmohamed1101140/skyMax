@extends('layouts.container_ar')
@section('title')SkyMax @endsection
@section('content')
    <div id="page-inside2" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{url('/ar')}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png"  alt="SkyMax"></a>
        </div>

        <div class="container">
            <div class="event-title">
                <h1>التعليم الإلكترونى</h1>
                <p>هنا سوف تجد كل منتجات التعلم الإلكترونى الخاصه بك
                </p>
            </div>

        </div>

    </div>
    <div class="contents">
        <div class="container">
            <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                <div id="filter" class="clearfix nwfilter">

                </div>
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="event">
                            <h3>{{$product->name_ar}}</h3>
                            <img src="{{asset('images/product/'.$product->image)}}"  class="img-responsive">
                            <p>{{$product->videos()->count()}} فيديو</p>
                            <a  class="btn nwbtn2" href="{{url("/ar/e_learning/$product->id")}}" >التفاصيل</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
