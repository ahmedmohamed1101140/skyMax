@extends('admin.layout')

@section('title', 'Roles')

{{-- start css --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Roles")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Roles</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Admin Roles </div>

                    <div class="tools">
                        <a href="#large" data-toggle="modal">
                            <button type="button" class="btn btn-primary">Create New Role</button>

                        </a>
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>

                                </th>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i>  Name
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> #Admins
                                </th>
                                <th>
                                    <i class="fa fa-phone"></i> #permissions
                                </th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>
                                    </td>
                                    <td >
                                        <a href="{{route('roles.show',$role->id)}}"> {{$role->name}} </a>
                                    </td>
                                    <td>
                                        {{$role->admins->count()}}
                                    </td>
                                    <td>
                                        {{$role->p_num}}
                                    </td>
                                    <td>
                                        {{--<a href="{{route ('messages.edit',$message->id)}}" class="btn btn-outline btn-circle btn-sm purple">--}}
                                        {{--<i class="fa fa-edit"></i> Edit</a>--}}

                                        {!! Form::open(['route' => ['roles.destroy', $role->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>


    </div>

<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Role</h4>
                </div>
                {!! Form::open(['route' => ['roles.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Permission</label><small>Check the permission you want the admin to access</small>
                                    <span class="required"> * </span>
                                    <div class="btn-group bootstrap-select bs-select form-control " style="width: 100%">
                                        <select  id="permissions" name="permissions[]" class="selectpicker" data-width="75%" data-live-search="true" multiple>
                                            <option value="dashboard">Dashboard</option>
                                            <option value="main_data">Site Main Data</option>
                                            <option value="tree">Users Tree</option>
                                            <option value="bank_account">Bank Accounts</option>
                                            <option value="transfer">Make Transfer</option>
                                            <option value="admin">Admin Page</option>
                                            <option value="admin_roles">Admin Roles</option>
                                            <option value="clients">Clients</option>
                                            <option value="negative_accounts">Negative Accounts</option>
                                            <option value="e-money">E-Money Transfer</option>
                                            <option value="e-pin">E-Pin Transfers</option>
                                            <option value="products">Products Page</option>
                                            <option value="e_learning">E-Learning Products</option>
                                            <option value="limited_products">Limited Products</option>
                                            <option value="orders">Orders</option>
                                            <option value="messages">User Messages </option>
                                            <option value="categories">Categories</option>
                                            <option value="sub_categories">Sub-Categories</option>
                                            <option value="countries">Countries</option>
                                            <option value="cities">Cities</option>
                                            <option value="states">States</option>
                                            <option value="slider">Slider</option>
                                            <option value="infinity">Infinity</option>
                                            <option value="process">Process & Procedure</option>
                                            <option value="founder">Infinity Founder</option>
                                            <option value="events">Events</option>
                                            <option value="events_requests">Events Requests</option>
                                            <option value="about_us">About Us</option>
                                            <option value="contact_us">Contact us</option>
                                        </select>
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
@endsection


{{-- Start javascript --}}
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
@endsection

{{-- end javascript --}}