@extends('admin.layout')

@section('title', "City")

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Cities")


{{-- End Breadcums--}}

@section('content')
    <h4 class="page-title">Cities</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Cities Table</div>

                    <div class="tools">
                        <a href="{{route('cities.create')}}">
                            <button type="button" class="btn btn-primary">Create New City</button>

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
                                <th><i class="fa fa-toggle-on"></i> Status</th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cities as $city)
                                <tr>
                                    <td class="highlight">
                                        {{$city->name_eng}}
                                    </td>
                                    <td class="highlight">
                                        {{$city->name}}
                                    </td>
                                    <td class="highlight">
                                        <span class="label label-sm label-{{$city->view== 0 ? 'danger' : 'success'}}"> {{$city->view == 0 ? 'Hidden' : 'Display'}} </span>

                                    </td>
                                    <td>
                                        <a href="{{route ('cities.edit',$city->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edite </a>
                                        {!! Form::open(['route' => ['cities.destroy', $city->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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


@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}