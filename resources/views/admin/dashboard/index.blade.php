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
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{url('/dashboard/pinCredit')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$pin_credit}}">0</span> </div>
                    <div class="desc"> Total E-Pin Credits Transaction </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('/dashboard/pinDebit')}}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$pin_depit}}">0</span>
                    </div>
                    <div class="desc"> Total E-Ping Debits Transaction </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{url('/dashboard/moneyDebit')}}">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$money_depit}}"></span> </div>
                    <div class="desc"> Total E-Money Debits Transaction </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard/moneyCredit')}}">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$money_credit}}">0</span>
                    </div>
                    <div class="desc"> Total Money Credit Transaction</div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{url('/dashboard/shipping')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$shipping}}">0</span>LE </div>
                    <div class="desc"> Total Shipping </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('/dashboard/registeration')}}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$registeration}}">0</span>LE
                    </div>
                    <div class="desc"> Total Registration </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{url('/dashboard/direct')}}">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$direct}}"></span>LE </div>
                    <div class="desc"> Total Direct Commission </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard/binary')}}">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$binary}}">0</span>LE
                    </div>
                    <div class="desc"> Total Binary Commission </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="{{url('/dashboard/qualified')}}">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$order_qualified}}">0</span> </div>
                    <div class="desc"> Total Qualified Orders </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('/dashboard/store')}}">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$order_store}}">0</span>
                    </div>
                    <div class="desc"> Total Perineum Orders </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{url('/dashboard/client_commission')}}">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$commission_clients}}"></span> </div>
                    <div class="desc"> Clients Get Product Commission </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard/store_commission')}}">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$store_commission}}">0</span>LE
                    </div>
                    <div class="desc"> Total Product Commission </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard/client_report')}}">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$clients}}">0</span>
                    </div>
                    <div class="desc"> Clients </div>
                </div>
            </a>
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
                            <th>Data</th>
                            <th>Number</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Data</th>
                            <th>Number</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <tr>
                            <td>Clients</td>
                            <td>{{$clients}}</td>
                        </tr>
                        <tr>
                            <td>Admin Debit E-Pin</td>
                            <td>{{$pin_depit}} LE</td>
                        </tr>
                        <tr>
                            <td>Admin Credit E-Pin</td>
                            <td>{{$pin_credit}} LE</td>
                        </tr><tr>
                            <td>Admin Debit E-Money</td>
                            <td>{{$money_depit}} LE</td>
                        </tr><tr>
                            <td>Admin Send E-Money</td>
                            <td>{{$money_credit}} LE</td>
                        </tr><tr>
                            <td>Shipping Phease Commissions</td>
                            <td>{{$shipping}} LE</td>
                        </tr><tr>
                            <td>Registeration Commission</td>
                            <td>{{$registeration}} LE</td>
                        </tr><tr>
                            <td>Qualified Orders</td>
                            <td>{{$order_qualified}}</td>
                        </tr><tr>
                            <td>I-Store Orders</td>
                            <td>{{$order_store}}</td>
                        </tr><tr>
                            <td>Direct Commissions</td>
                            <td>{{$direct}} LE</td>
                        </tr><tr>
                            <td>Binary Commissions</td>
                            <td>{{$binary}} LE</td>
                        </tr><tr>
                            <td>Clients Get I-Store Commission</td>
                            <td>{{$commission_clients}}</td>
                        </tr><tr>
                            <td>Money Sent from I-Store Commission</td>
                            <td>{{$store_commission}} LE</td>
                        </tr>

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