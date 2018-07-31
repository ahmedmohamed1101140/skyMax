@extends('admin.layout')

@section('title', "Founders")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />


    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin-panel/assets/layouts/layout/css/layout.min.css')}}'" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/custom.min.css')}}'" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->


@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Founders")


{{-- End Breadcums--}}

@section('content')
    <h4 class="page-title">Founders</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Founders
                    </div>
                    <div class="tools">
                        <a data-toggle="modal" href="#large">
                            <button type="button" class="btn btn-primary">Create New Founder</button>
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
                            @foreach($founders as $founder)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="mt-card-item">
                                        <div class="mt-card-avatar mt-overlay-1">
                                            <img src="{{asset('images/founders/'.$founder->image)}}">
                                            <div class="mt-overlay">
                                                <ul class="mt-info">
                                                    <li>
                                                        <a href="{{asset('images/founder/'.$founder->image)}}" class="btn default btn-outline" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-card-content">
                                            <h3 class="mt-card-name">{{$founder->name}}</h3>
                                            <p class="mt-card-desc font-grey-mint">{{$founder->position}}</p>

                                            <div class="mt-card-social">
                                                <ul>
                                                    {{--<li>--}}
                                                        {{--{!! Form::open(['route' => ['founders.edit', $founder->id ], 'method' => 'get', 'style'=>'display: inline;']) !!}--}}
                                                        {{--<button class="btn btn-outline btn-circle btn-sm purple">--}}
                                                            {{--<i class="fa fa-edit"></i> Edit</button>--}}
                                                        {{--{!! Form::close() !!}--}}
                                                    {{--</li>--}}
                                                    <li>
                                                        {!! Form::open(['route' => ['founders.destroy', $founder->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Filter Clients</h4>
            </div>
            {!! Form::open(['route' => ['founders.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">

                <div class="tab-pane active" id="personal-data">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Founder Name</label>
                                        <span class="required"> * </span>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Founder Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Founder Position</label>
                                        <span class="required"> * </span>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="position"  value="{{old('position')}}" id="position" class="form-control input-circle-right" placeholder="Position">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Founder Arabic Name</label>
                                        <span class="required"> * </span>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <input type="text" name="name_ar"  value="{{old('name_ar')}}" id="name_ar" class="form-control input-circle-right" placeholder="Founder Arabic Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Founder Arabic Position</label>
                                        <span class="required"> * </span>
                                        <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                            <input type="text" name="position_ar"  value="{{old('position_ar')}}" id="position_ar" class="form-control input-circle-right" placeholder="Arabic Position">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"  alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select Image</span>
                                                        <span class="fileinput-exists"> Change</span>
                                                        <input required type="file" name="image_url"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

    @endsection


    {{-- Start javascript --}}
    @section('js')
            <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>


        <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="{{asset('admin-panel/assets/pages/scripts/ecommerce-products-edit.min.js')}}" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->

@endsection

{{-- end javascript --}}