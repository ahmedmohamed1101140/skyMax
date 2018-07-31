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
                <h1>{{$product->name}}</h1>
                <p>{{html_entity_decode( strip_tags($product->details))}}</p>

            </div>

        </div>

    </div>
    <div class="contents">
        @foreach($product->videos as $video)
            @if($video->arrange%2 !== 0 )
            <div class="container">
                <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                    <div class="padd-all-30">
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <h2>{{$video->title}}</h2>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12">
                            <video width="320" height="240" controls>
                                <source src="{{asset('images/videos/'.$video->name)}}" type="video/mp4">
                                <source src="{{asset('images/videos/'.$video->name)}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="blue-bg">
                <div class="container">
                    <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                        <div class="padd-all-30">
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <h2>{{$video->title}}</h2>
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <video width="320" height="240" controls>
                                    <source src="{{asset('images/videos/'.$video->name)}}" type="video/mp4">
                                    <source src="{{asset('images/videos/'.$video->name)}}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>

@endsection