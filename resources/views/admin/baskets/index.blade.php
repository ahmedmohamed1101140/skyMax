@extends('admin.layout')

@section('title', 'Orders')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Orders")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Orders</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Orders Data </div>

                    <div class="tools">
                        <a href="#large" data-toggle="modal">
                            <button type="button" class="btn btn-primary">Filter Orders</button>
                        </a>
                        <a href="{{route('baskets.create')}}">
                            <button type="button" class="btn btn-primary">Create New order</button>
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
                                    Order Number
                                </th>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i> Customer Name
                                </th>
                                <th>
                                    <i class="fa fa-phone"></i> Customer Phone
                                </th>
                                <th>
                                    <i class="fa fa-map-marker"></i> Customer Address
                                </th>
                                <th>
                                    <i class="fa fa-mail-forward"></i> Customer Mail
                                </th>
                                <th>
                                    <i class="fa fa-user"></i>Visit client profile
                                </th>
                                <th>
                                    <i class="fa fa-item"></i> Product Name
                                </th>
                                <th>
                                    <i class="fa fa-toggle-on"></i> Product Type
                                </th>
                                <th>
                                    <i class="fa fa-sort-amount-asc"></i> Order Amount
                                </th>
                                <th>
                                    <i class="fa fa-times"></i> Order Date
                                </th>
                                <th>
                                    <i class="fa fa-toggle-on"></i> Order view
                                </th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="highlight">
                                            <a href="{{route('baskets.show',$order->id)}}"> ORDER {{$order->id}} </a>
                                    </td>
                                    <td >
                                        {{$order->name}}
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
                                    <td>
                                        <a href="{{route ('baskets.show',$order->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                            <i class="fa fa-edit"></i> Edit</a>

                                        {!! Form::open(['route' => ['baskets.destroy', $order->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
        <div class="text-center">
            {!! $orders->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $orders->currentPage() }} OF{{ $orders->lastPage() }}</strong>
        </div>

    </div>


<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Filter Orders</h4>
                </div>
                {!! Form::open(['route' => ['baskets.search'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">

                                <div class="form-group">
                                    <label>Client Name</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                        <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Client Phone</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-mobile-phone"></i>
                                    </span>
                                        <input type="text" name="phone"  value="{{old('phone')}}" id="phone" class="form-control input-circle-right" placeholder="Phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Client Address</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-location-arrow"></i>
                                    </span>
                                        <input type="text" name="address"  value="{{old('address')}}" id="address" class="form-control input-circle-right" placeholder="Address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Client Mail</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-mail-forward"></i>
                                    </span>
                                        <input type="text" name="mail"  value="{{old('mail')}}" id="mail" class="form-control input-circle-right" placeholder="Mail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Order AWD</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                        <input type="text" name="awd"  value="{{old('awd')}}" id="awd" class="form-control input-circle-right" placeholder="AWD">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status:</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="view">
                                                    <option value="">Select...</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Not Published</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Order Status:</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="view">
                                                    <option value="">Select...</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1"> On Way</option>
                                                    <option value="2"> Delivered</option>
                                                    <option value="3"> Canceled</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Amount Range</label>
                                            <span class="required"> * </span>
                                            <div class="input-group input-large " >
                                                <input type="text" value="{{old('amount_from')}}"  class="form-control" name="amount_from">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" value="{{old('amount_to')}}"  name="amount_to"> </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Search</button>
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