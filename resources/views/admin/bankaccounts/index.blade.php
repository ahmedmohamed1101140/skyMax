@extends('admin.layout')

@section('title', 'Bank Accounts')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Bank Accounts")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Bank Accounts</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Bank Accounts Data </div>

                    <div class="tools">
                        <a data-toggle="modal" href="#large">
                            <button type="button" class="btn btn-primary">Create New Bank Account </button>

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
                                    <i class="fa fa-user"></i> Name
                                </th>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i> Name AR
                                </th>
                                <th>
                                    <i class="fa fa-google-wallet"></i> type
                                </th>
                                <th>
                                    <i class="fa fa-credit-card"></i> number
                                </th>
                                <th>
                                    <i class="fa fa-toggle-on"></i> View
                                </th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>
                                    </td>
                                    <td >
                                         {{$account->name}}
                                    </td>
                                    <td >
                                         {{$account->name_ar}}
                                    </td>
                                    <td>
                                        {{$account->type}}
                                    </td>
                                    <td>
                                        {{$account->num}}
                                    </td>
                                    <td>
                                        @if($account->view == 1)
                                            <span class="label label-success label-sm"> Display </span>
                                            @elseif($account->view == 0)
                                            <span class="label label-danger label-sm"> Hiden </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{--<a href="{{route ('baccounts.edit',$account->id)}}" class="btn btn-outline btn-circle btn-sm purple">--}}
                                            {{--<i class="fa fa-edit"></i> Edit</a>--}}

                                        {!! Form::open(['route' => ['baccounts.destroy', $account->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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

    <!-- /.modal -->
    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Bank Account</h4>
                </div>
                {!! Form::open(['route' => ['baccounts.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">

                                <div class="form-group">
                                    <label>Account Name</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Account Name">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Account Arabic Name</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        <input type="text" name="name_ar"  value="{{old('name_ar')}}" id="name_ar" class="form-control input-circle-right" placeholder="Account Name Arabic">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Account Number</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        <input type="text" name="number"  value="{{old('number')}}" id="number" class="form-control input-circle-right" placeholder="Account Number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Account Type</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                            <span class="input-group-addon input-circle-left">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        <input type="text" name="type"  value="{{old('type')}}" id="type" class="form-control input-circle-right" placeholder="Account Type">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Transfer Status</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="view">
                                                    <option value="">Select...</option>
                                                    <option value="1">View</option>
                                                    <option value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
    <!-- /.modal -->
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}