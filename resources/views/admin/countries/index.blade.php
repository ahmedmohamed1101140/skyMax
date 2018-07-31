@extends('admin.layout')

@section('title', "Countries")

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Countries")


{{-- End Breadcums--}}

@section('content')
    <h4 class="page-title">Countries</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Countries Table
                    </div>

                    <div class="tools">
                        <a  data-toggle="modal" href="#large">
                            <button type="button" class="btn btn-primary">Create New Country</button>

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
                                <th><i class="fa fa-item"></i> Name</th>
                                <th><i class="fa fa-item"></i> Arabic Name</th>
                                <th><i class="fa fa-item"></i> National ID</th>
                                <th><i class="fa fa-item"></i> Account Price</th>
                                <th><i class="fa fa-item"></i> Charges</th>
                                <th><i class="fa fa-toggle-on"></i> Status</th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td class="highlight">
                                        {{$country->name}}
                                    </td>
                                    <td class="highlight">
                                        {{$country->name_ar}}
                                    </td>
                                    <td class="highlight">
                                        {{$country->national_id}}
                                    </td>
                                    <td class="highlight">
                                        {{$country->account_price}}
                                    </td>
                                    <td class="highlight">
                                        {{$country->charges}}
                                    </td>
                                    <td class="highlight">
                                        <span class="label label-sm label-{{$country->view== 0 ? 'danger' : 'success'}}"> {{$country->view == 0 ? 'Hidden' : 'Display'}} </span>
                                    </td>
                                    <td>
                                        {{--<a href="{{route ('country.edit',$country->id)}}" class="btn btn-outline btn-circle btn-sm purple">--}}
                                        {{--<i class="fa fa-edit"></i> Edite </a>--}}
                                        {!! Form::open(['route' => ['countries.destroy', $country->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
            {!! Form::open(['route' => ['countries.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">

                <div class="tab-pane active" id="personal-data">
                    <div class="portlet-body form">
                        <div class="form-body">

                            <div class="form-group">
                                <label>Country Name</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Country Name">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Country Arabic Name</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="name_ar"  value="{{old('name_ar')}}" id="name_ar" class="form-control input-circle-right" placeholder="Country Arabic Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>National ID</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="number"  value="{{old('number')}}" id="number" class="form-control input-circle-right" placeholder="National ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Account Price</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="price"  value="{{old('price')}}" id="price" class="form-control input-circle-right" placeholder="Account Price">
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Charges</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" name="charges"  value="{{old('charges')}}" id="charges" class="form-control input-circle-right" placeholder="Charges">
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
                                                <option value="0">View</option>
                                                <option value="1">Hidden</option>
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