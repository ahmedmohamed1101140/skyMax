@extends('admin.layout')

@section('title','Slider')

{{-- start css --}}
@section('css')



    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link href="../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />--}}
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin-panel/assets/global/plugins/cubeportfolio/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/pages/css/portfolio.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <style>
        table > tbody > tr > td{
            vertical-align: middle !important;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','home')
@section('page_title','Slider')



@section('content')


    <h4 class="page-title">Slider</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Slider Table</div>

                    <div class="tools">
                        <a href="{{route('sliders.create')}}">
                            <button type="button" class="btn btn-primary">Create New slider</button>

                        </a>
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">

                    <div class="portfolio-content portfolio-1">
                        <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All
                                <div class="cbp-filter-counter"></div>
                            </div>
                            <div data-filter=".images" class="cbp-filter-item btn dark btn-outline uppercase"> Hidden
                                <div class="cbp-filter-counter"></div>
                            </div>
                            <div data-filter=".video" class="cbp-filter-item btn dark btn-outline uppercase"> Displayed
                                <div class="cbp-filter-counter"></div>
                            </div>

                        </div>
                        <div id="js-grid-juicy-projects" class="cbp">
                            @foreach($sliders as $slider)
                                <div class="cbp-item {{$slider->view == '1' ? 'video' : 'images'}}">
                                    <div class="cbp-caption">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="{{asset('images/slider/'.$slider->img)}}" alt="">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    {!! Form::open(['route' => ['sliders.destroy', $slider->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash-o"></i> Delete</button>
                                                    {!! Form::close() !!}
                                                    <a href="{{route('sliders.edit',$slider->id)}}" class="btn red uppercase btn red uppercase" rel="nofollow">More</a>
                                                    <a href="{{asset('images/slider/'.$slider->img)}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">View Larger</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>


@endsection

{{--<script src="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>--}}

{{-- Start javascript --}}
@section('js')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<script src="../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/assets/pages/scripts/portfolio-1.min.js')}}" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">


@endsection

{{-- end javascript --}}