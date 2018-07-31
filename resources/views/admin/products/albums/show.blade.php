@extends('admin.layout')

@section('title',trans('Galleries'))

{{-- start css --}}
@section('css')

    @php $direction = ''; @endphp



    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {{--<link href="../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />--}}
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin-panel/assets/global/plugins/cubeportfolio/css/cubeportfolio.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/pages/css/portfolio'.$direction.'.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <style>
        table > tbody > tr > td{
            vertical-align: middle !important;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',trans('Home'))
@section('page_title',trans('Product Galleries'))




@section('content')

    <!-- END PAGE HEADER-->
    <div class="portfolio-content portfolio-1">
        <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All Galleries
                <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".images" class="cbp-filter-item btn dark btn-outline uppercase"> Images
                <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".video" class="cbp-filter-item btn dark btn-outline uppercase"> Youtube
                <div class="cbp-filter-counter"></div>
            </div>

        </div>
        <div id="js-grid-juicy-projects" class="cbp">
            @foreach($media as $gallery)
            <div class="cbp-item {{$gallery->type == '1' ? 'video' : 'images'}}">
                <div class="cbp-caption">
                    <div class="cbp-caption-defaultWrap">
                    @if($gallery->type == '1')
                        <img src="{{asset('uploads/galleries/admin/1.png')}}" alt="">
                    @else
                            <img src="{{asset('uploads/galleries/admin/600x600/'.$gallery->image_url)}}" alt="">
                    @endif
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <a href="{{route('Album.delete',encrypt($gallery->id))}}" class="btn red uppercase btn red uppercase" rel="nofollow">{{trans('admin/services.delete')}}</a>
                                @if($gallery->type == '1')
                                <a href="https://www.youtube.com/watch?v={{$gallery->video_url}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">{{trans('admin/galleries.view_larger')}}</a>
                                @else
                                 <a href="{{asset('uploads/galleries/admin/1200x900/'.$gallery->image_url)}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">{{trans('admin/galleries.view_larger')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
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