@extends('admin.layout')

@section('title', "Events")

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
@section('page_title','Events')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add New Event</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['events.update',$event->id] , 'method' => 'put','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label>Event Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="name" required value="{{$event->name}}" id="name" class="form-control input-circle-right" placeholder="Name">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Event Arabic Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="name_ar" required value="{{$event->name_ar}}" id="name_ar" class="form-control input-circle-right" placeholder="Arabic Name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Event Location</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="location" required value="{{$event->location}}" id="name" class="form-control input-circle-right" placeholder="Location">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Event Arabic Location</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="location_ar" required value="{{$event->location_ar}}" id="location_ar" class="form-control input-circle-right" placeholder="Arabic Location">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="description" maxlength="255">{{$event->details}}</textarea>
                                                    <br><br><br>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Arabic Description
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="description_ar" maxlength="255">{{$event->details_ar}}</textarea>
                                                    <br><br><br>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Status:</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="view">
                                                        <option value="">Select...</option>
                                                        <option value="1">Published</option>
                                                        <option value="0">Not Published</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Event Date</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                    <input class="form-control form-control-inline input-medium date-picker" required name="date" size="16" type="text" value="{{$event->date}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Event Range</label>
                                                <span class="required"> * </span>
                                                <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">

                                                    <input type="text" value="{{$event->from_date}}" required class="form-control" name="from">
                                                    <span class="input-group-addon"> to </span>
                                                    <input type="text" class="form-control" value="{{$event->to_date}}" required name="to"> </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="{{asset('images/events/'.$event->image)}}"  alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select Image</span>
                                                        <span class="fileinput-exists"> Change</span>
                                                        <input required  type="file" name="image_url"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
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