@extends('admin.layout')

@section('title', "Events")

{{-- start css --}}
@section('css')

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin-panel/assets/layouts/layout/css/layout.min.css')}}'" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/custom.min.css')}}'" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->


@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Events")


{{-- End Breadcums--}}

@section('content')
    <h4 class="page-title">Events</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Events</div>

                    <div class="tools">
                        <a href="{{route('events.create')}}">
                            <button type="button" class="btn btn-primary">Create New Event</button>
                        </a>
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="mt-element-card mt-element-overlay">
                            <div class="row">
                                @foreach($events as $event)
                                   <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-1">
                                            <img src="{{asset('images/events/'.$event->image)}}">
                                            <div class="mt-overlay">
                                                <ul class="mt-info">
                                                    <li>
                                                        <a href="{{asset('images/events/'.$event->image)}}" class="btn default btn-outline" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-card-content">
                                            <h3 class="mt-card-name">{{$event->name}}</h3>
                                            <p class="mt-card-desc font-grey-mint">{{$event->location}}</p>
                                            <span class="label label-sm label-{{$event->status== 0 ? 'danger' : 'success'}}"> {{$event->status== 1 ? 'Published' : 'Not Published'}} </span>
                                            <p class="mt-card-desc font-grey-mint">{{$event->date}}</p>

                                            <div class="mt-card-social">
                                                <ul>
                                                    <li>
                                                        {!! Form::open(['route' => ['events.edit', $event->id ], 'method' => 'get', 'style'=>'display: inline;']) !!}
                                                        <button class="btn btn-outline btn-circle btn-sm purple">
                                                            <i class="fa fa-edit"></i> Edit</button>
                                                        {!! Form::close() !!}
                                                    </li>
                                                    <li>
                                                        {!! Form::open(['route' => ['events.destroy', $event->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                                            <i class="fa fa-trash-o"></i> Delete</button>
                                                        {!! Form::close() !!}


                                                    </li>
                                                </ul>
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


@endsection


{{-- Start javascript --}}
@section('js')

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/ecommerce-products-edit.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection

{{-- end javascript --}}