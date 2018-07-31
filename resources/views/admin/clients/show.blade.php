@extends('admin.layout')

@section('title', "Client")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('admin-panel/assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <style>
        table {
            border-spacing: 0;
            border-collapse: separate;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Client')


{{-- End Breadcums--}}


@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        {{--alert({!! json_encode($client->username) !!});--}}
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Node');
            data.addColumn('string', 'Parent');
            data.addColumn('string', 'ToolTip');

            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
                [{ v: '{!! json_encode($client->id) !!}',
                   f: '<div style="color:red; font-style:bold">{!! json_encode($client->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $client->activation == 0 ? 'danger' : 'success'!!}"> {!! $client->activation == 0 ? 'inactive' : 'active'!!} </span> </div> ' },
                   '', @if($client->pright == 1)'Right' @else 'Left'@endif],
                @foreach($children as $child)
                [{ v: '{!! json_encode($child->id) !!}',
                   f: '<div style="color:red; font-style:italic">{!! json_encode($child->username) !!}</div>  <div class="profile-usertitle-job"> <span style="font-size: 10px;" class="label label-sm label-{!!   $child->activation == 0 ? 'danger' : 'success'!!}"> {!! $child->activation == 0 ? 'inactive' : 'active'!!} </span> </div> ' },
                   '{!! json_encode($child->parent_id) !!}', @if($child->pright == 1)'Right' @else 'Left'@endif],
                @endforeach
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {allowHtml:true});
        }
    </script>




    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> {{$client->username}}  |
        <small>user account page</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{asset('images/profile/'.$client->image)}}" class="img-responsive" alt="user_image"> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$client->fname}} {{$client->sname}} {{$client->lname}} </div>
                        <div class="profile-usertitle-job"> <span class="label label-sm label-{{$client->activation == 0 ? 'danger' : 'success'}}"> {{$client->activation == 0 ? 'inactive' : 'active'}} </span> </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a data-toggle="modal" href="#large123321"  data-friend="{{$friend}}">
                            <button type="button" class="btn btn-circle green btn-sm">Message</button>
                        </a>
                        {{--{!! Form::open(['route' => ['clients.destroy',$client->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$client->id]) !!}--}}
                        {{--<button type="submit" class="btn btn-circle red btn-sm">Delete</button>--}}
                        {{--{!! Form::close() !!}--}}
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$client->epin }}  </div>
                            <div class="uppercase profile-stat-text"> E-pin</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$client->emoney}} </div>
                            <div class="uppercase profile-stat-text"> E-Money</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> {{$client->orders->count()}} </div>
                            <div class="uppercase profile-stat-text"> Order </div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">About {{$client->lname}}</h4>
                        <span class="profile-desc-text"> Born at {{$client->dateofbirth}}, his/her phone number {{$client->phone }}, beneficiary
                            {{$client->beneficiary}} which is his/her {{$client->relation}} </span>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="#">{{$client->mail}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-phone"></i>
                            <a href="#">{{$client->phone}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-user"></i>
                            <a href="#">{{$client->username}}</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-calendar"></i>
                            <a href="#">Created Since{{$client->created_at->diffForHumans()}}</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Passwords</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">Privacy Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Wallet</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_5" data-toggle="tab">Tree</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                        <div class="tab-pane active" id="tab_1_1">
                                        {{Form::open(['route' => ['clients.update',$client->id] , 'method' => 'put','files'=>true]) }}
                                            <input type="text" hidden name="personal_info" value="1">

                                            <div class="form-group">
                                                <label class="control-label">First Name</label>
                                                <input disabled type="text" name="fname" required value="{{$client->fname}}" placeholder="First Name" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Second Name</label>
                                                <input disabled type="text" name="sname" required value="{{$client->sname}}" placeholder="Second Name" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Last Name</label>
                                                <input disabled type="text" name="lname" required value="{{$client->lname}}" placeholder="Last Name" class="form-control" /> </div>

                                            <div class="form-group">
                                                <label class="control-label">Family Name</label>
                                                <input disabled type="text" name="famname" value="{{$client->name_family}}" placeholder="Family Name" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Nation ID</label>
                                                <input disabled type="number" name="nation_id" required value="{{$client->Nationaid}}" placeholder="Nationality ID" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Birth Date</label>
                                                <input disabled type="text" name="dateofbirth" required value="{{$client->dateofbirth}}" placeholder="Birth Date" class="form-control" /> </div>

                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input disabled type="text" name="mail" required value="{{$client->mail}}" placeholder="Email" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label  class="control-label">User Name</label>
                                                <input disabled type="text" name="username" required value="{{$client->username}}" placeholder="User Name" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Phone</label>
                                                <input disabled type="number" name="phone" required value="{{$client->phone}}" placeholder="Phone Number" class="form-control" /> </div>

                                            <div class="form-group">
                                                <label class="control-label">Beneficiary</label>
                                                <input disabled type="text" required name="beneficiary" value="{{$client->beneficiary}}" placeholder="Beneficiary" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">Beneficiary Relation</label>
                                                <input disabled type="text" name="relation" required value="{{$client->relation}}" placeholder="Beneficiary Relation" class="form-control" /> </div>

                                            <div class="form-group">
                                                <label class="control-label">Address</label>
                                                <input disabled type="text" name="address" required value="{{$client->address}}" placeholder="Address" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">City</label>
                                                <input disabled type="text" name="city" required value="{{$client->city}}" placeholder="City" class="form-control" /> </div>

                                            <div class="form-group">
                                                <label>Country</label>
                                                <div class="input-group margin-top-10">
                                                    <select class="form-control input-medium" name="country" value="{{$client->country}}">
                                                        <option value="{{$client->country}}"  selected disabled> Country</option>
                                                        @foreach($countries  as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>State</label>
                                                <div class="input-group margin-top-10">
                                                    <select class="form-control input-medium" name="state"  value="{{$client->state}}">
                                                        <option value="{{$client->state}}"  selected disabled> State</option>
                                                        @foreach($states as $state)
                                                            <option value="{{$state->id}}">{{$state->name_eng}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            {{--<div class="form-group">--}}
                                                {{--<label class="control-label col-md-3">Image</label>--}}
                                                {{--<div class="col-md-9">--}}
                                                    {{--<div class="fileinput fileinput-new" data-provides="fileinput">--}}
                                                        {{--<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">--}}
                                                            {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>--}}
                                                        {{--<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>--}}
                                                        {{--<div>--}}
                                                                {{--<span class="btn default btn-file">--}}
                                                                {{--<span class="fileinput-new"> Select Image</span>--}}
                                                                {{--<span class="fileinput-exists"> Change</span>--}}
                                                                {{--<input disabled type="file" name="image_url"> </span>--}}
                                                            {{--<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                        {{--<div class="form-actions">--}}
                                            {{--<button type="submit" class="btn blue">Save Changes</button>--}}
                                            {{--<button type="button" class="btn default">Cancel</button>--}}
                                        {{--</div>--}}
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        {{Form::open(['route' => ['clients.update',$client->id] , 'method' => 'put','files'=>true]) }}
                                        <input type="text" hidden name="passwords" value="1">

                                        <div class="form-group">
                                            <label class="control-label">Text Password</label>
                                            <input disabled type="text" name="password" class="form-control" required value="{{$client->text_password}}"/> </div>
                                        <div class="form-group">
                                            <label class="control-label">Pin Code</label>
                                            <input disabled type="text" name="pincode" class="form-control" required value="{{$client->pincode}}" /> </div>
                                        {{--<div class="form-actions">--}}
                                            {{--<button type="submit" class="btn blue">Save Changes</button>--}}
                                            {{--<button type="button" class="btn default">Cancel</button>--}}
                                        {{--</div>--}}
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        {{Form::open(['route' => ['clients.update',$client->id] , 'method' => 'put','files'=>true]) }}
                                        <input type="text" hidden name="private_info" value="1">
                                        <div class="form-group">
                                            <label class="control-label">E-Pin</label>
                                            <input disabled type="number" required name="epin" value="{{$client->epin}}" placeholder="" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">E-Money</label>
                                            <input disabled type="number" required name="emoney" value="{{$client->emoney}}" placeholder="" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">User Code</label>
                                            <input  type="text" disabled name="usercode" value="{{$client->usercode}}" placeholder="User Code" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Created At</label>
                                            <input type="text" disabled name="created_at" value="{{$client->created_at}}" placeholder="Created At" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Activation Date</label>
                                            <input disabled type="text" required name="activation_date" value="{{$client->activation_date}}" placeholder="Activation Date" class="form-control" />
                                        </div>


                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="input-group margin-top-10">
                                                <select class="form-control input-medium" name="status">
                                                    <option value="1" {{old('status') == 1 ? 'selected' : ''}} >Active</option>
                                                    <option value="0" {{old('status') == 0 ? 'selected' : ''}} >In Active</option>
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
                                            <label>Tree Position</label>
                                            <div class="input-group margin-top-10">
                                                <select class="form-control input-medium" name="position">
                                                    <option value="1" {{old('view') == 1 ? 'selected' : ''}} >Left</option>
                                                    <option value="0" {{old('view') == 0 ? 'selected' : ''}} >Right</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Visa Number</label>
                                            <input disabled type="text" name="visa_num" value="{{$client->visanum}}" placeholder="Visa Number" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Visa Date</label>
                                            <input type="text" disabled name="visa_date" value="{{$client->visadate}}" placeholder="Visa Date" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Account Number</label>
                                            <input type="text" disabled name="account_num" value="{{$client->account_num}}" placeholder="Account Number" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">All Come Left</label>
                                            <input type="text" disabled name="alloc_left" value="{{$client->allcom_left}}" placeholder="Allocate Left" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">All Come Right</label>
                                            <input type="text" disabled name="alloc_right" value="{{$client->allcom_right}}" placeholder="Allocate Right" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Exit Come Left</label>
                                            <input type="text" disabled name="exitcom_left" value="{{$client->exitcom_left}}" placeholder="Exit com Left" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Exit Come Right</label>
                                            <input type="text" disabled name="exitcom_right" value="{{$client->exitcom_right}}" placeholder="Exit com Right" class="form-control" />
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Save Changes</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                    <!-- Wallet TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Feeds</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_2_1" data-toggle="tab"> E-Pin </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_2_2" data-toggle="tab"> E-Money </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <!--BEGIN TABS-->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_2_1">
                                                        <div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                            <div class="portlet-body">
                                                                <div class="row number-stats margin-bottom-30">
                                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                                        <div class="stat-left">
                                                                            <div class="stat-number">
                                                                                <div class="title"> Total </div>
                                                                                <div class="number"> {{$e_pins->count() + $e_pin1->count()}} </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="table-scrollable table-scrollable-borderless">
                                                                    <table class="table table-hover table-light">
                                                                        <thead>
                                                                        <tr class="uppercase">
                                                                            <th > Date </th>
                                                                            <th> Sender </th>
                                                                            <th> Receiver </th>
                                                                            <th> Type </th>
                                                                            <th> Method </th>
                                                                            <th> value </th>
                                                                        </tr>
                                                                        </thead>
                                                                        @foreach($e_pins as $e_pin)
                                                                            <tr>
                                                                            <td class="fit">
                                                                                {{$e_pin->created_at->diffForHumans()}}
                                                                            </td>
                                                                            @if($e_pin->id_sender == 0 || $e_pin->id_sender == -1)
                                                                                <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                            @else
                                                                                @if($e_pin->sender != null)
                                                                                    <td><a href="{{route('clients.show',$e_pin->sender->id)}}">{{$e_pin->sender->username}}</a></td>
                                                                                @else
                                                                                    <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                @endif
                                                                            @endif
                                                                            @if($e_pin->id_client == 0 || $e_pin->id_client == -1)
                                                                                <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                            @else
                                                                                @if($e_pin->receiver !== null)
                                                                                    <td><a href="{{route('clients.show',$e_pin->receiver->id)}}">{{$e_pin->receiver->username}}</a></td>
                                                                                @else
                                                                                    <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                @endif
                                                                            @endif
                                                                            <td> {{$e_pin->commission_type}} </td>
                                                                            <td> {{$e_pin->type}} </td>
                                                                            <td>  <span class="bold theme-font">{{$e_pin->value}}</span> </td>
                                                                        </tr>
                                                                        @endforeach
                                                                        @foreach($e_pin1 as $e_pin)
                                                                            <tr>
                                                                                <td class="fit">
                                                                                    {{$e_pin->created_at->diffForHumans()}}
                                                                                </td>
                                                                                @if($e_pin->id_sender == 0 || $e_pin->id_sender == -1)
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_pin->sender != null)
                                                                                    <td><a href="{{route('clients.show',$e_pin->sender->id)}}">{{$e_pin->sender->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                @if($e_pin->id_client == 0 || $e_pin->id_client == -1)
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_pin->receiver !== null)
                                                                                        <td><a href="{{route('clients.show',$e_pin->receiver->id)}}">{{$e_pin->receiver->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                <td> {{$e_pin->commission_type}} </td>
                                                                                <td> {{$e_pin->type}} </td>
                                                                                <td>  <span class="bold theme-font">{{$e_pin->value}}</span> </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_2_2">
                                                        <div class="scroller" style="height: 320px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                                                            <div class="portlet-body">
                                                                <div class="row number-stats margin-bottom-30">
                                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                                        <div class="stat-left">
                                                                            <div class="stat-number">
                                                                                <div class="title"> Total </div>
                                                                                <div class="number"> {{$e_moneys->count() + $e_money1->count()}} </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="table-scrollable table-scrollable-borderless">
                                                                    <table class="table table-hover table-light">
                                                                        <thead>
                                                                        <tr class="uppercase">
                                                                            <th> Date </th>
                                                                            <th> Sender </th>
                                                                            <th> Receiver </th>
                                                                            <th> Type </th>
                                                                            <th> Method </th>
                                                                            <th> value </th>
                                                                        </tr>
                                                                        </thead>
                                                                        @foreach($e_moneys as $e_money)
                                                                            <tr>
                                                                                <td class="fit">
                                                                                    {{$e_money->created_at->diffForHumans()}}
                                                                                </td>
                                                                                @if($e_money->client_sender  == 0 || $e_money->client_sender == -1 )
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_money->sender != null)
                                                                                        <td><a href="{{route('clients.show',$e_money->sender->id)}}">{{$e_money->sender->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                @if($e_money->customer_id == 0 || $e_money->customer_id == -1 )
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_money->receiver !== null)
                                                                                        <td><a href="{{route('clients.show',$e_money->receiver->id)}}">{{$e_money->receiver->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                <td> {{$e_money->comtiontype}} </td>
                                                                                <td> {{$e_money->type}} </td>
                                                                                <td>  <span class="bold theme-font">{{$e_money->cash_money}}</span> </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        @foreach($e_money1 as $e_money)
                                                                            <tr>
                                                                                <td class="fit">
                                                                                    {{$e_money->created_at->diffForHumans()}}
                                                                                </td>
                                                                                @if($e_money->client_sender  == 0 || $e_money->client_sender == -1 )
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_money->sender != null)
                                                                                    <td><a href="{{route('clients.show',$e_money->sender->id)}}">{{$e_money->sender->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-danger"> User Not Found </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                @if($e_money->customer_id == 0 || $e_money->customer_id == -1 )
                                                                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                @else
                                                                                    @if($e_money->receiver != null)
                                                                                    <td><a href="{{route('clients.show',$e_money->receiver->id)}}">{{$e_money->receiver->username}}</a></td>
                                                                                    @else
                                                                                        <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                                                                    @endif
                                                                                @endif
                                                                                <td> {{$e_money->comtiontype}} </td>
                                                                                <td> {{$e_money->type}} </td>
                                                                                <td>  <span class="bold theme-font">{{$e_money->cash_money}}</span> </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--END TABS-->
                                            </div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
                                    <!-- END Wallet TAB -->
                                    <!-- Tree TAB -->
                                    <div class="tab-pane" id="tab_1_5">
                                        <!-- BEGIN PORTLET -->
                                        <div class="portlet light " style="padding:0">
                                            <div style="overflow: scroll;width: auto; height: auto; min-height: 500px; margin: auto;" id="chart_div"></div>
                                        </div>
                                        <!-- END PORTLET -->
                                    </div>
                                    <!-- END Tree TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Message Clients</h4>
            </div>
            {!! Form::open(['route' => ['admin.message.submit'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">
                <input type="hidden" name="user_id" value="{{$client->id}}">
                <div class="tab-pane active" id="personal-data">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control maxlength-handler" rows="8"  required name="message" maxlength="1000">{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green">Send</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="large123321" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{--<div class="modal-header">--}}
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
            {{--<h4 class="modal-title">Message Clients</h4>--}}
            {{--</div>--}}
            {!! Form::open(['route' => ['admin.message.submit'] , 'method' => 'post','id' => 'my_form' ,'class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bubble font-hide hide"></i>
                            <span class="caption-subject font-hide bold uppercase">{{$friend->client->username}}</span>
                        </div>
                    </div>
                    <div class="portlet-body" id="chats">
                        <div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible1="1">
                            <ul class="chats">
                                @foreach($friend->messages as $message)
                                    @if($message->msg_from == -1)
                                        <li class="out">
                                            <img class="avatar" alt="" src="{{asset('admin-panel/assets/layouts/layout/img/admin2.png')}}" />
                                            <div class="message">
                                                <span class="arrow"> </span>
                                                <a href="javascript:;" class="name"> Admin</a>
                                                <span class="datetime"> <small>{{ $message->created_at->diffForHumans() }}</small> </span>
                                                <span class="body"> {{$message->message}} </span>
                                            </div>
                                        </li>
                                    @else
                                    <li class="in">
                                        <img class="avatar" alt="" src="{{asset('admin-panel/assets/layouts/layout/img/admin1.png')}}" />
                                        <div class="message">
                                            <span class="arrow"> </span>
                                            <a href="javascript:;" class="name"> {{$friend->client->username}} </a>
                                            <span class="datetime"> <small>{{ $message->created_at->diffForHumans() }}</small>  </span>
                                            <span class="body"> {{$message->message}}</span>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <ul class="chats">
                                <li class="in">
                                    <div class="col-md-10">
                                        <div class="input-cont">
                                            <input type="hidden" name="user_id" value="{{$client->id}}">
                                            <input style="width: 733px;" class="form-control" type="text" name="message" placeholder="Type a message here..." />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <span class="arrow"> </span>
                                            <a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;" class="btn blue icn-only">
                                                <i class="fa fa-check icon-white"></i>
                                            </a>
                                        </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>--}}
            {{--<button type="submit" class="btn green">Send</button>--}}
            {{--</div>--}}
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

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->



    <script>
        $(document).ready(function()
        {
            $('#clickmewow').click(function()
            {
                $('#radio1003').attr('checked', 'checked');
            });
        })
    </script>
@endsection

{{-- end javascript --}}