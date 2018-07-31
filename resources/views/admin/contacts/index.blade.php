@extends('admin.layout')

@section('title', "Contacts")

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

@section('home', 'Home')
@section('page_title','Contacts')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Update Contact</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['contacts.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">

                                            <div class="form-group">
                                                <label>Phone 1</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                    <input type="number" name="phone" required value="{{$data->phone}}" id="name" class="form-control input-circle-right" placeholder="Phone Number"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Phone 2</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                    <input type="number" name="phone2" required value="{{$data->phone2}}" id="name" class="form-control input-circle-right" placeholder="Phone Number"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Mail</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-mail-forward"></i>
                                                        </span>
                                                    <input type="email" name="mail" required value="{{$data->mail}}" id="name" class="form-control input-circle-right" placeholder="Mail"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Fax</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-fax"></i>
                                                        </span>
                                                    <input type="text" name="fax" required value="{{$data->fax}}" id="name" class="form-control input-circle-right" placeholder="Fax"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-location-arrow"></i>
                                                        </span>
                                                    <input type="text" name="address" required value="{{$data->eng_address}}" id="address" class="form-control input-circle-right" placeholder="Address"></div>
                                            </div>
                                            <div class="form-group">
                                                <label>Arabic Address</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-location-arrow"></i>
                                                        </span>
                                                    <input type="text" name="address_ar" required value="{{$data->ar_address}}" id="address_ar" class="form-control input-circle-right" placeholder="Arabic Address"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Sales Manager</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    <input type="text" name="manager" required value="{{$data->sales_manager}}" id="name" class="form-control input-circle-right" placeholder="Sales Manager"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Sales Manager Arabic Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    <input type="text" name="manager_ar" required value="{{$data->ar_sales_manager}}" id="name" class="form-control input-circle-right" placeholder="Sales Manager Arabic Name"></div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Paragraph 1:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="p1" maxlength="255">{{$data->p1}}</textarea>
                                                    <br><br><br>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Arabic Paragraph 1:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="ar_p1" maxlength="255">{{$data->p1_ar}}</textarea>
                                                    <br><br><br>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Paragraph 2:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="p2" maxlength="255">{{$data->p2}}</textarea>
                                                    <br><br><br>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Arabic Paragraph 2:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8"  required name="ar_p2" maxlength="255">{{$data->p2_ar}}</textarea>
                                                    <br><br><br>
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