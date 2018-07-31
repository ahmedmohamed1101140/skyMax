@extends('admin.layout')

@section('title', "Admins")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Admins')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add New Admin</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['admins.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">

                                <div class="tab-pane active" id="personal-data">
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="text" name="name" required value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="User Name"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Mail</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="email" name="mail" required value="{{old('mail')}}" id="mail" class="form-control input-circle-right" placeholder="Email"></div>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    <input type="password" name="password" required value="{{old('password')}}" id="password" class="form-control input-circle-right" placeholder="Password"></div>
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

@endsection

{{-- end javascript --}}