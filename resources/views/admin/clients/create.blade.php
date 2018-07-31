@extends('admin.layout')

@section('title', "Clients")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Clients')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add New Client</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <ul class="nav nav-tabs tabs-left">
                                <li class="active">
                                    <a href="#personal-data" data-toggle="tab">  Personal Data</a>
                                </li>
                                <li class="">
                                    <a href="#addtional-data" data-toggle="tab">  Addtional Data</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            {{Form::open(['route' => ['clients.store'] , 'method' => 'post','files'=>true]) }}
                            <div class="tab-content">
                                    <div class="tab-pane active" id="personal-data">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="fname" value="{{old('fname')}}" id="fname" class="form-control input-circle-right" placeholder="First Name"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Second Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="sname" value="{{old('sname')}}" id="sname" class="form-control input-circle-right" placeholder="Second Name"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="lname" value="{{old('lname')}}" id="lname" class="form-control input-circle-right" placeholder="Last Name"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>  User Name </label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="username" value="{{old('username')}}" id="username" class="form-control input-circle-right" placeholder="User Name"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="form-control input-circle-right" placeholder="Phone Number"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="email" name="mail" value="{{old('mail')}}" id="mail" class="form-control input-circle-right" placeholder="Email"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control input-circle-right" placeholder="Password"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Inside Password</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="password" name="inside_password" value="{{old('inside_password')}}" id="inside_password" class="form-control input-circle-right" placeholder="Inside Password"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="addtional-data">
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <div class="input-group margin-top-10">
                                                        <select class="form-control input-medium" name="country">
                                                            <option value=""  selected disabled> Country</option>
                                                            @foreach($countries  as $country)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <div class="input-group margin-top-10">
                                                        <select class="form-control input-medium" name="state">
                                                            <option value=""  selected disabled> State</option>
                                                            @foreach($states as $state)
                                                                <option value="{{$state->id}}">{{$state->name_eng}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="city" value="{{old('city')}}" id="city" class="form-control input-circle-right" placeholder="City"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="address" value="{{old('address')}}" id="address" class="form-control input-circle-right" placeholder="Address"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Of Birth</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="dateofbirth" value="{{old('dateofbirth')}}" id="dateofbirth" class="form-control input-circle-right" placeholder="Date OF Birth"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Beneficiary</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="beneficiary" value="{{old('beneficiary')}}" id="beneficiary" class="form-control input-circle-right" placeholder="Beneficiary"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Relation</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                        <input type="text" name="relation" value="{{old('relation')}}" id="relation" class="form-control input-circle-right" placeholder="Relation"> </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div class="input-group margin-top-10">
                                                        <select class="form-control input-medium" name="status">
                                                            <option value="1" {{old('status') == 1 ? 'selected' : ''}} >Active</option>
                                                            <option value="0" {{old('status') == 0 ? 'selected' : ''}} >Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>View</label>
                                                    <div class="input-group margin-top-10">
                                                        <select class="form-control input-medium" name="view">
                                                            <option value="1" {{old('view') == 1 ? 'selected' : ''}} >Display</option>
                                                            <option value="0" {{old('view') == 0 ? 'selected' : ''}} >Hide</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Position</label>
                                                    <div class="input-group margin-top-10">
                                                        <select class="form-control input-medium" name="position">
                                                            <option value="1" {{old('position') == 1 ? 'selected' : ''}} >Left</option>
                                                            <option value="2" {{old('position') == 0 ? 'selected' : ''}} >Right</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="col-md-9">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                <br><br>
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