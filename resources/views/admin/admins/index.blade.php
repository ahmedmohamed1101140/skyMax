@extends('admin.layout')

@section('title', 'Admins')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Admins")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Admins</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Admins Data </div>

                    <div class="tools">
                        <a href="{{route('admins.create')}}">
                            <button type="button" class="btn btn-primary">Create New Admin</button>

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
                                    <i class="fa fa-user"></i> User Name
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Email
                                </th>
                                <th>
                                     Type
                                </th>
                                <th>
                                     View
                                </th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>
                                    </td>
                                    <td >
                                        <a href="{{route('admins.show',$admin->id)}}"> {{$admin->username}} </a>
                                    </td>
                                    <td>
                                        {{$admin->mail}}
                                    </td>
                                    <td>
                                        {{$admin->role->name}}
                                    </td>
                                    <td>
                                        <span class="label label-sm label-{{$admin->view== 0 ? 'danger' : 'success'}}"> {{$admin->view == 0 ? 'Hidden' : 'Display'}} </span>

                                    </td>
                                    <td>
                                        <a href="{{route ('admins.edit',$admin->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit</a>

                                        {!! Form::open(['route' => ['admins.destroy', $admin->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                        <button class="btn btn-outline btn-circle dark btn-sm black">
                                            <i class="fa fa-trash-o"></i> Delete</button>
                                        {!! Form::close() !!}
                                        <a href="#large" data-admin_id="{{$admin->id}}" data-toggle="modal" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-user-secret"></i> Roles</a>
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
        <div class="text-center">
            {!! $admins->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $admins->currentPage() }} OF{{ $admins->lastPage() }}</strong>
        </div>

    </div>


<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Assign Role</h4>
                </div>
                {!! Form::open(['route' => ['admins.update',$admin->id] , 'method' => 'put','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <input type="hidden" name="assign">
                                <div class="form-group">
                                    <label>Role:</label>
                                    <span class="required"> * </span>
                                    <div  class="input-group margin-top-10">
                                        <select   class="form-control input-medium" name="role">
                                            <option value="">Select...</option>
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
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

@endsection

{{-- end javascript --}}