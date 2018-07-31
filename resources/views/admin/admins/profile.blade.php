@extends('admin.layout')

@section('title', "Admin Profile")

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
@section('page_title','Admin Profile')


{{-- End Breadcums--}}


@section('content')

    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> {{auth()->user()->username}}  |
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
                    <div class="profile">
                        <img src="{{asset('images/admin/'.auth()->user()->image)}}" class="img-responsive" alt="user_image"> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{auth()->user()->username}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-circle green btn-sm">Admin</button>
                        {{--{!! Form::open(['route' => ['clients.destroy',auth()->user()->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.auth()->user()->id]) !!}--}}
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

                    </div>
                    <!-- END STAT -->
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
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        {{Form::open(['route' => ['admin.profile.submit'] , 'method' => 'post','files'=>true]) }}
                                        <input type="text" hidden name="personal_info" value="1">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input  type="text" name="mail" required value="{{auth()->user()->mail}}" placeholder="Email" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label  class="control-label">User Name</label>
                                            <input  type="text" name="username" required value="{{auth()->user()->username}}" placeholder="User Name" class="form-control" /> </div>

                                        <div class="form-group">
                                            <label  class="control-label">Old Password</label>
                                            <input  type="password" name="old_password"   placeholder="Old Password" class="form-control" /> </div>


                                        <div class="form-group">
                                            <label  class="control-label">New Password</label>
                                            <input  type="password" name="new_password"  placeholder="New Password" class="form-control" /> </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Image</label><br><br>
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
                                        <br><br><br><br><br><br><br><br><br><br><br>

                                        <div class="form-actions">
                                        <button type="submit" class="btn blue">Save Changes</button>
                                        <button type="button" class="btn default">Cancel</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
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