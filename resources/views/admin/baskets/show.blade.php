@extends('admin.layout')

@section('title', 'Orders')

{{-- start css --}}
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Orders")


{{-- End Breadcums--}}



@section('content')
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Order View
        <small>view order details</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Order #{{$order->id}}
                                                <span class="hidden-xs">| {{$order->date}} </span>
                                            </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent green btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent blue btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                        <div class="btn-group">
                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i>
                                <span class="hidden-xs"> Tools </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Export to Excel </a>
                                </li>
                                <li>
                                    <a href="javascript:;"> Export to CSV </a>
                                </li>
                                <li>
                                    <a href="javascript:;"> Export to XML </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;"> Print Invoices </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab"> Details </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab"> Update
                                </a>
                            </li>
                            <li>
                                <a href="#tab_3" data-toggle="tab"> Print</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet yellow-crusta box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Order Details </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Order #: </div>
                                                    <div class="col-md-7 value"> {{$order->id}}
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Order Date & Time: </div>
                                                    <div class="col-md-7 value"> {{$order->date}} </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Order Status: </div>
                                                    <div class="col-md-7 value">
                                                        @if($order->status == '0')
                                                            <span class="label label-danger"> Pending </span>
                                                        @elseif($order->status == '1')
                                                            <span class="label label-info"> Shipping</span>
                                                        @elseif($order->status == '2')
                                                            <span class="label label-info"> On Way</span>
                                                        @elseif($order->status == '3')
                                                            <span class="label label-success"> Delivered</span>
                                                        @elseif($order->status == '4')
                                                            <span class="label label-danger"> Canceled </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Grand Total: </div>
                                                    <div class="col-md-7 value"> {{$product->price * $order->amount}}LE </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Payment Information: </div>
                                                    @if($order->type == '1')
                                                        <div class="col-md-7 value"> E-money</div>
                                                    @elseif($order->type == '0')
                                                        <div class="col-md-7 value"> E-pin</div>
                                                    @endif
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> AWD: </div>
                                                    <div class="col-md-7 value"> {{$order->awd}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="portlet blue-hoki box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Customer Information </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Customer Name: </div>
                                                    <div class="col-md-7 value"> {{$order->name}} </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Email: </div>
                                                    <div class="col-md-7 value"> {{$order->mail}} </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Address </div>
                                                    <div class="col-md-7 value"> {{$order->address}} </div>
                                                </div>
                                                <div class="row static-info">
                                                    <div class="col-md-5 name"> Phone Number: </div>
                                                    <div class="col-md-7 value"> {{$order->phone}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="portlet grey-cascade box">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i>Shopping Cart </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th> Product </th>
                                                            <th> Item Status </th>
                                                            <th> Price </th>
                                                            <th> Type </th>
                                                            <th> Quantity </th>
                                                            <th> Shipping Phease</th>
                                                            <th> Commission </th>
                                                            <th> Discount  </th>
                                                            <th> Cash Back </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="{{route('products.show',$product->id)}}"> {{$product->name}} </a>
                                                            </td>
                                                            <td>
                                                                <span class="label label-sm label-{{$product->view == 0 ? 'danger' : 'success'}}"> {{$product->view == 1 ? 'Display' : 'Hidden'}} </span>
                                                            </td>
                                                            <td> {{$product->price}} </td>
                                                            <td>
                                                                @if($product->type == 1)
                                                                    <span class="label label-success label-sm"> Qualified </span>
                                                                @elseif($product->type == 0)
                                                                    <span class="label label-danger label-sm"> Premium </span>
                                                                @endif
                                                            </td>
                                                            <td> {{$product->amount}} </td>
                                                            <td> {{$product->shipping_phease}} </td>
                                                            <td> {{$product->commission}} </td>
                                                            <td> {{$product->discount}} </td>
                                                            <td> {{$product->cash_back}} </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <div class="table-container">
                                        {{Form::open(['route' => ['baskets.update',$order->id] , 'method' => 'put','files'=>true]) }}
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="personal-data">
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="text" disabled name="name" required value="{{$order->name}}" id="name" class="form-control input-circle-right" placeholder="Name"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="mail" disabled name="mail" required value="{{$order->mail}}" id="mail" class="form-control input-circle-right" placeholder="Mail"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="number" disabled name="phone" required value="{{$order->phone}}" id="phone" class="form-control input-circle-right" placeholder="phone"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="text" disabled name="address" required value="{{$order->address}}" id="address" class="form-control input-circle-right" placeholder="Address"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="number" disabled name="amount" required value="{{$order->amount}}" id="amount" class="form-control input-circle-right" placeholder="Amount"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status:</label>
                                                        <div class="input-group margin-top-10">
                                                            <select class="form-control input-medium" name="status">
                                                                <option value="">Select...</option>
                                                                <option value="0">Pending</option>
                                                                <option value="1">Shipping</option>
                                                                <option value="2">On Way</option>
                                                                <option value="3">Delivered</option>
                                                                <option value="4">Canceled</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Awd</label>
                                                            <span class="required"> * </span>
                                                            <div class="input-group">
                                                        <span class="input-group-addon input-circle-left">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                                <input type="number" name="awd" required value="{{$order->awd}}" id="awd" class="form-control input-circle-right" placeholder="AWD"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                        {!! Form::close() !!}
                                </div>

                            <div class="tab-pane" id="tab_3">
                                <div class="table-container">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Customer Name</th>
                                            <th>Order Status</th>
                                            <th>Customer Phone</th>
                                            <th>Customer Address</th>
                                            <th>Customer Mail</th>
                                            <th>Visit client profile</th>
                                            <th>Product Name</th>
                                            <th>Product Type</th>
                                            <th>Order Amount</th>
                                            <th>Order Date</th>
                                            <th>Order view</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="{{route('baskets.show',$order->id)}}"> ORDER {{$order->id}} </a>
                                            </td>
                                            <td>
                                                {{$order->name}}
                                            </td>
                                            <td>
                                                @if($order->status == '0')
                                                    <span class="label label-danger"> Pending </span>
                                                @elseif($order->status == '1')
                                                    <span class="label label-info"> Shipping</span>
                                                @elseif($order->status == '2')
                                                    <span class="label label-info"> On Way</span>
                                                @elseif($order->status == '3')
                                                    <span class="label label-success"> Delivered</span>
                                                @elseif($order->status == '4')
                                                    <span class="label label-danger"> Canceled </span>
                                                @endif
                                            </td>


                                            <td>
                                                {{$order->phone}}
                                            </td>
                                            <td>
                                                {{$order->address}}
                                            </td>
                                            <td>
                                                {{$order->mail}}
                                            </td>
                                            <td>
                                                <a href="{{route('clients.show',$order->client_id)}}"> {{$order->client->fname}} {{$order->client->sname}} {{$order->client->lname}}</a>
                                            </td>
                                            <td>
                                                <a href="{{route('products.show',$order->prod_id)}}">{{$order->product->name}}</a>
                                            </td>
                                            <td>
                                                @if($order->product->type == 1)
                                                    <span class="label label-success label-sm"> Qualified </span>
                                                @elseif($order->product->type == 2)
                                                    <span class="label label-danger label-sm"> Premium </span>
                                                @endif

                                            </td>
                                            <td>
                                                {{$order->amount}}
                                            </td>
                                            <td>
                                                {{$order->created_at->diffForHumans()}}
                                            </td>
                                            <td>
                                                @if($order->view== 1)
                                                    <span class="label label-success label-sm"> Display </span>
                                                @elseif($order->view == 0)
                                                    <span class="label label-danger label-sm"> Hide </span>
                                                @endif
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
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
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->


@endsection

{{-- end javascript --}}