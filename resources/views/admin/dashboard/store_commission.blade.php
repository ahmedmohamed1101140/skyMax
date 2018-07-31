@extends('admin.layout')

@section('title', 'Dashboard')

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
@section('page_title','Dashboard')


{{-- End Breadcums--}}


{{-- Start page title --}}

@section('page_title','Dashboard')

@section('description','Statistics, chart , and all users activities on your website')

{{-- end page title --}}


@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$store_commission}}">0</span>LE </div>
                    <div class="desc"> Total I-Store Commission</div>
                </div>
            </a>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h3>Filters</h3>
            {{Form::open(['url' => ['/dashboard/reports/filters'] , 'method' => 'post','files'=>true]) }}
            <input type="hidden" name="store_commission" value="0">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date Range</label>
                        <span class="required"> * </span>
                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">

                            <input type="text" value="{{old('from')}}"  class="form-control" name="from">
                            <span class="input-group-addon"> to </span>
                            <input type="text" class="form-control" value="{{old('to')}}"  name="to"> </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2" style="margin-top: 22px;">
                    <button type="submit" class="btn blue">Filter</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Buttons</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Sender User Name</th>
                            <th>Receiver User Name</th>
                            <th>Type</th>
                            <th>Transfer Type</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Sender User Name</th>
                            <th>Receiver User Name</th>
                            <th>Type</th>
                            <th>Transfer Type</th>
                            <th>Value</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($store_commissions as $e_money)
                            <tr>
                                <td>{{$e_money->date}}</td>
                                @if($e_money->client_sender  == 0 || $e_money->client_sender == -1 )
                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                @elseif($e_money->sender == null)
                                    <td> <span class="label label-sm label-danger"> Undefined User </span> </td>
                                @else
                                    <td>
                                        <a href="{{route('clients.show',$e_money->sender->id)}}"> {{$e_money->sender->username}}</a>
                                    </td>
                                @endif
                                @if($e_money->customer_id  == 0 || $e_money->customer_id == -1 )
                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                @elseif($e_money->receiver == null)
                                    <td> <span class="label label-sm label-danger"> Undefined User </span> </td>
                                @else
                                    <td>
                                        <a href="{{route('clients.show',$e_money->receiver->id)}}"> {{$e_money->receiver->username}}</a>
                                    </td>
                                @endif
                                <td>
                                    <span class="label label-sm label-success"> E-Money </span>
                                </td>
                                <td class="center"> {{$e_money->comtiontype}} </td>
                                <td class="center"> {{$e_money->cash_money}} </td>
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