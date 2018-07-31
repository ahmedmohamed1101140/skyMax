@extends('admin.layout')

@section('title', 'Events Requests')

{{-- start css --}}
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home','Home')
@section('page_title','Events Requests')


{{-- End Breadcums--}}


@section('content')

    {{--<div class="row">--}}
        {{--<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">--}}
            {{--<h3>Filters</h3>--}}
            {{--{{Form::open(['url' => ['/dashboard/reports/filters'] , 'method' => 'post','files'=>true]) }}--}}
            {{--<input type="hidden" name="binary" value="0">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label>Date Range</label>--}}
                        {{--<span class="required"> * </span>--}}
                        {{--<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">--}}

                            {{--<input type="text" value="{{old('from')}}"  class="form-control" name="from">--}}
                            {{--<span class="input-group-addon"> to </span>--}}
                            {{--<input type="text" class="form-control" value="{{old('to')}}"  name="to"> </div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-2"></div>--}}

                {{--<div class="col-md-2" style="margin-top: 22px;">--}}
                    {{--<button type="submit" class="btn blue">Filter</button>--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}

        {{--</div>--}}

    {{--</div>--}}
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Events</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>Registration Date</th>
                            <th>User Name</th>
                            <th>Registration Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Registration Date</th>
                            <th>User Name</th>
                            <th>Registration Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{$event->created_at->diffForHumans()}}</td>
                                @if($event->client == null)
                                    <td> <span class="label label-sm label-danger"> Undefined User </span> </td>
                                @else
                                    <td>
                                        <a href="{{route('clients.show',$event->sender->id)}}"> {{$event->sender->username}}</a>
                                    </td>
                                @endif
                                <td>
                                    <span class="center"> {{$event->name}} </span>
                                </td>
                                <td class="center"> {{$event->mail}} </td>
                                <td class="center"> {{$event->phone}} </td>
                                <td class="center"> {{$event->event->name}} </td>
                                <td>
                                    @if($event->status == 0)
                                        <span class="label label-sm label-warning"> Pending </span>
                                    @elseif($event->status == 1)
                                        <span class="label label-sm label-success"> Contact Accessed </span>
                                    @else
                                        <span class="label label-sm label-danger"> Canceled </span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route ('requests.edit',$event->id)}}" class="btn btn-outline btn-circle btn-sm green">
                                        <i class="fa fa-check"></i> Accept </a>
                                    {!! Form::open(['route' => ['requests.update', $event->id ], 'method' => 'PUT', 'style'=>'display: inline;']) !!}
                                    <button class="btn btn-outline btn-circle dark btn-sm red">
                                        <i class="fa  fa-remove"></i> Reject </button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => ['requests.destroy', $event->id ], 'method' => 'DELETE', 'style'=>'display: inline; margin-top: 8px;']) !!}
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
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


@endsection


{{-- Start javascript --}}
@section('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

@endsection

{{-- end javascript --}}