@extends('admin.layout')

@section('title', 'Process')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
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

@section('home',"Home")
@section('page_title',"Process")


{{-- End Breadcums--}}



@section('content')

    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Process
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['process.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true  ]) !!}
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus-circle"></i>Process Data </div>
                    <div class="actions btn-set">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save</button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-bordered">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab"> General </a>
                            </li>
                            <li>
                                <a href="#tab_l" data-toggle="tab"> 1st Section </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab"> 2nd Section </a>
                            </li>
                            <li>
                                <a href="#tab_3" data-toggle="tab"> 3rd Section </a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p" maxlength="300">{{$data->main_paragraph}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p_ar" maxlength="300">{{$data->main_paragraph_ar}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="tab_l">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Header 1:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h1}}" name="h1" placeholder="1st Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Header 1:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h1_ar}}" name="h1_ar" placeholder="1st Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p1" maxlength="300">{{$data->p1}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description Arabic:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p1_ar" maxlength="300">{{$data->p1_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="{{asset('images/'.$data->img1)}}"  alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                            <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select Image</span>
                                                            <span class="fileinput-exists"> Change</span>
                                                            <input type="file"  name="image_url1"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Header 2
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h2}}" name="h2" placeholder="2nd Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Header 2
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h2_ar}}" name="h2_ar" placeholder="2nd Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p2" maxlength="300">{{$data->p2}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description Arabic:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p2_ar" maxlength="300">{{$data->p2_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="{{asset('images/'.$data->img2)}}"  alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                            <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select Image</span>
                                                            <span class="fileinput-exists"> Change</span>
                                                            <input type="file"  name="image_url2"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane" id="tab_3">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Header 3:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h3}}" name="h3" placeholder="3rd Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Header 3:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$data->h3_ar}}" name="h3_ar" placeholder="3rd Section Header"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p3" maxlength="300">{{$data->p3}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description Arabic:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="p3_ar" maxlength="300">{{$data->p3_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="{{asset('images/'.$data->img3)}}"  alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                            <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select Image</span>
                                                            <span class="fileinput-exists"> Change</span>
                                                            <input type="file" name="image_url3"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->

@endsection


{{-- Start javascript --}}
@section('js')
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/plupload/js/plupload.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/ecommerce-products-edit.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection

{{-- end javascript --}}