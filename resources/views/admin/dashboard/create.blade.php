@extends('admin.layout')

@section('title', "Site Main Data")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Main Data')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Site Main Data</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['dashboard.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Max Out</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="max_out" required value="{{$data->maxout}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Account Price</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="acc_price" required value="{{$data->account_price}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Activation Price</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="activation_price" required value="{{$data->price_activeaccount}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Charge</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="charge" required value="{{$data->charges}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Direct Commission</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="direct_commission" required value="{{$data->direct_commission}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Binary Commission</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="number" name="binary_commission" required value="{{$data->binary_commission}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">save</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Site Social Links</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['dashboard.store_social_links'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>FaceBok Page</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-facebook"></i>
                                                        </span>
                                                    <input type="text" name="facebook" required value="{{$data->facebook}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Twitter Page</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-twitter"></i>
                                                        </span>
                                                    <input type="text" name="twitter" required value="{{$data->twitter}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Linked in</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-linkedin"></i>
                                                        </span>
                                                    <input type="text" name="linkedin" required value="{{$data->linkedin}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Instagram</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-instagram"></i>
                                                        </span>
                                                    <input type="text" name="instagram" required value="{{$data->instagram}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Google+</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-google"></i>
                                                        </span>
                                                    <input type="text" name="google" required value="{{$data->google}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">save</button>
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

@endsection

{{-- end javascript --}}