@extends('admin.layout')

@section('title', "Slider")

{{-- start css --}}
@section('css')

    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css')}}" />
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin-panel/assets/layouts/layout/css/layout.min.css')}}'" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/custom.min.css')}}'" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Slider')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Update Slider</div>
                    <div class="tools">
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['sliders.update',$slider->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label>Title</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="title" required value="{{$slider->title}}" id="title" class="form-control input-circle-right" placeholder="Title"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Arabic Title</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="title_ar" required value="{{$slider->title_ar}}" id="title_ar" class="form-control input-circle-right" placeholder="Arabic Title"></div>
                                            </div>


                                            <div class="form-group">
                                                <label>Details
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="input-icon right">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="details" maxlength="255">{{$slider->details}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Arabic Details
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="input-icon right">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="details_ar" maxlength="255">{{$slider->details_ar}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label >Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="input-icon right">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="description" maxlength="255">{{$slider->descriptioneng}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label >Arabic Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="input-icon right">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="description_ar" maxlength="255">{{$slider->description}}</textarea>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Status:</label>
                                                <div class="input-group margin-top-10">
                                                    <select required class="form-control input-medium" name="view">
                                                        <option value="">Select...</option>
                                                        <option value="1">Published</option>
                                                        <option value="0">Not Published</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Slider Image</label>
                                                <div class="col-md-10">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="{{asset('images/slider/'.$slider->img)}}"  alt="" /> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                            <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select Image</span>
                                                            <span class="fileinput-exists"> Change</span>
                                                            <input type="file" name="image_url"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')

    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/plugins/moment.min.js" type="text/javascript')}}"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/plupload/js/plupload.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/ecommerce-products-edit.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->


@endsection

{{-- end javascript --}}