@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')

    <div id="page-inside5" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="container">
            <div class="event-title">
                <h1>About us</h1>
                <p>{{$item->main_paragraph}}
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
                        {{--<p>{{html_entity_decode( strip_tags($items[0]->about_us))}}</p>--}}
                        <p>{{$item->p1}}</p>

                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <img style="width: 400px; height: 250px;" src="{{asset('images/'.$item->img1)}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="orang-bg">
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

    </div>

@endsection