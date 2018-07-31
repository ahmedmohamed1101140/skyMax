@extends('layouts.container_ar')
@section('title')SkyMax @endsection
@section('content')
    <div id="page-inside3" class="insd ">
        <div class="top-bg"></div>

        <div class="logo">
            <a href="{{url('/ar')}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png"
                                                                          alt="SkyMax"></a>
        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                <div class="wallet-box">
                    <div class="clearfix"></div>
                    <div class="sd-box">
                        <div class="title">
                            <h3>الطلبات</h3>
                        </div>
                        <div class="stats padd-25" style="height: 184px;">
                            <?php $pendding = 0;$shipping=0; $onway=0; $deliver=0; $cancel=0  ?>
                            @foreach ($orders as $order)
                                @if ( $order->status == 0)
                                    <?php $pendding++ ?>
                                @elseif($order->status == 1)
                                    <?php $shipping++ ?>
                                @elseif($order->status == 2)
                                    <?php $onway++ ?>
                                @elseif($order->status == 3)
                                    <?php $deliver++ ?>
                                @elseif($order->status == 4)
                                    <?php $cancel++ ?>
                                @endif
                            @endforeach
                            <div class="col-md-4 col-xs-4">
                                <h4>الكـل</h4>
                                <p>{{$orders->count()}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>قيد الانتظار
                                </h4>
                                <p>{{$pendding}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>جارى الشحن</h4>
                                <p>{{$shipping}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>على الطريق
                                </h4>
                                <p>{{$onway}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>تم التوصيل</h4>
                                <p>{{$deliver}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>ألغيت</h4>
                                <p>{{$cancel}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="contents">

        <div class="container">
            <div class="col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 no-pd ">

                <div class="panel-group trans-acc" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less fa fa-2x fa-minus-circle"></i>
                                    <span> طلباتك</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="wrapper mymodal">

                                {{--<ul class="tabs clearfix" data-tabgroup="first-tab-group">--}}
                                    {{--<li><a href="#tab1" class="active magent">All</a></li>--}}
                                    {{--<li><a href="#tab2" class=" magent">Pending</a></li>--}}
                                    {{--<li><a href="#tab3" class="magent">Shipping</a></li>--}}
                                    {{--<li><a href="#tab4" class="magent">Delivered</a></li>--}}
                                    {{--<li><a href="#tab5" class="magent">On Way</a></li>--}}
                                    {{--<li><a href="#tab6" class="magent">Canceled</a></li>--}}
                                {{--</ul>--}}
                                <section id="first-tab-group" class="tabgroup">
                                    <div id="tab1">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>رقم الطلب</th>
                                                    <th>الاسم</th>
                                                    <th>الهاتف</th>
                                                    <th>العنوان</th>
                                                    <th>المنتج</th>
                                                    <th>النوع</th>
                                                    <th>الحاله</th>
                                                    <th>الكميه</th>
                                                    <th>التاريخ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->client->username}}</td>
                                                        <td>{{$order->phone}}</td>
                                                        <td>{{$order->address}}</td>
                                                        <td><a href='{{url("products/$order->prod_id")}}'>{{$order->product->name_ar}}</a></td>
                                                        @if($order->product->type === '1')
                                                            <td class="bl">
                                                                مؤهل
                                                            </td>
                                                        @elseif($order->product->type === '2')
                                                            <td class="gr">
                                                                مميز
                                                            </td>
                                                        @endif
                                                        @if($order->status === 0)
                                                            <td class="bl">
                                                                قيد الانتظار
                                                            </td>
                                                        @elseif($order->status === 1)
                                                            <td class="bl">
                                                               جارى الشحن                                                            </td>
                                                        @elseif($order->status === 2)
                                                            <td class="bl">
                                                                على الطريق                                                            </td>
                                                        @elseif($order->status === 3)
                                                            <td class="rd">
                                                                تم التوصيل                                                            </td>
                                                        @elseif($order->status === 4)
                                                            <td class="rd">
   ألغيت                                                           </td>
                                                        @endif
                                                        <td class="blnc">{{$order->amount}}</td>
                                                        <td class="blnc"> {{$order->date}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{--<div id="tab2">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu" role="menu">--}}
                                                {{--<li><a href="#">All</a></li>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#">Transfers</a></li>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="table-responsive text-center">--}}
                                            {{--<table class="table table-bordered">--}}
                                                {{--<thead class="text-center">--}}
                                                {{--<tr>--}}
                                                    {{--<th>Transaction ID</th>--}}
                                                    {{--<th>Type</th>--}}
                                                    {{--<th>Commission Type</th>--}}
                                                    {{--<th>From / To</th>--}}
                                                    {{--<th>Value</th>--}}
                                                    {{--<th>Date / Time</th>--}}
                                                    {{--<th>Balance</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($e_pins as $e_pin)--}}
                                                    {{--@if($e_pin->type == 'get')--}}
                                                        {{--<tr>--}}
                                                            {{--<td>{{$e_pin->id}}</td>--}}
                                                            {{--<td>{{$e_pin->type}}</td>--}}
                                                            {{--<td>{{$e_pin->commission_type}}</td>--}}
                                                            {{--<td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>--}}
                                                            {{--<td class="bl">+{{$e_pin->value}}</td>--}}
                                                            {{--<td>{{$e_pin->date}}</td>--}}
                                                            {{--<td class="blnc">000 EGp</td>--}}
                                                        {{--</tr>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div id="tab3">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu" role="menu">--}}
                                                {{--<li><a href="#">All</a></li>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#">Transfers</a></li>--}}
                                                {{--<li><a href="#">Registration</a></li>--}}
                                                {{--<li><a href="#">Shipping</a></li>--}}
                                                {{--<li><a href="#">Buy Premuim Products</a></li>--}}
                                                {{--<li><a href="#">Renewal</a></li>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="table-responsive text-center">--}}
                                            {{--<table class="table table-bordered">--}}
                                                {{--<thead class="text-center">--}}
                                                {{--<tr>--}}
                                                    {{--<th>Transaction ID</th>--}}
                                                    {{--<th>Type</th>--}}
                                                    {{--<th>From / To</th>--}}
                                                    {{--<th>Value</th>--}}
                                                    {{--<th>Date / Time</th>--}}
                                                    {{--<th>Balance</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($e_pins as $e_pin)--}}
                                                    {{--@if($e_pin->type == 'post')--}}
                                                        {{--<tr>--}}
                                                            {{--<td>{{$e_pin->id}}</td>--}}
                                                            {{--<td>{{$e_pin->type}}</td>--}}
                                                            {{--<td>{{$e_pin->commission_type}}</td>--}}
                                                            {{--<td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>--}}
                                                            {{--<td class="rd">-{{$e_pin->value}}</td>--}}
                                                            {{--<td>{{$e_pin->date}}</td>--}}
                                                            {{--<td class="blnc">000 EGp</td>--}}
                                                        {{--</tr>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div id="tab4">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu" role="menu">--}}
                                                {{--<li><a href="#">All</a></li>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#">Transfers</a></li>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="table-responsive text-center">--}}
                                            {{--<table class="table table-bordered">--}}
                                                {{--<thead class="text-center">--}}
                                                {{--<tr>--}}
                                                    {{--<th>Transaction ID</th>--}}
                                                    {{--<th>Type</th>--}}
                                                    {{--<th>Commission Type</th>--}}
                                                    {{--<th>From / To</th>--}}
                                                    {{--<th>Value</th>--}}
                                                    {{--<th>Date / Time</th>--}}
                                                    {{--<th>Balance</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($e_pins as $e_pin)--}}
                                                {{--@if($e_pin->type == 'get')--}}
                                                {{--<tr>--}}
                                                {{--<td>{{$e_pin->id}}</td>--}}
                                                {{--<td>{{$e_pin->type}}</td>--}}
                                                {{--<td>{{$e_pin->commission_type}}</td>--}}
                                                {{--<td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>--}}
                                                {{--<td class="bl">+{{$e_pin->value}}</td>--}}
                                                {{--<td>{{$e_pin->date}}</td>--}}
                                                {{--<td class="blnc">000 EGp</td>--}}
                                                {{--</tr>--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div id="tab5">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu" role="menu">--}}
                                                {{--<li><a href="#">All</a></li>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#">Transfers</a></li>--}}
                                                {{--<li><a href="#">Registration</a></li>--}}
                                                {{--<li><a href="#">Shipping</a></li>--}}
                                                {{--<li><a href="#">Buy Premuim Products</a></li>--}}
                                                {{--<li><a href="#">Renewal</a></li>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="table-responsive text-center">--}}
                                            {{--<table class="table table-bordered">--}}
                                                {{--<thead class="text-center">--}}
                                                {{--<tr>--}}
                                                    {{--<th>Transaction ID</th>--}}
                                                    {{--<th>Type</th>--}}
                                                    {{--<th>From / To</th>--}}
                                                    {{--<th>Value</th>--}}
                                                    {{--<th>Date / Time</th>--}}
                                                    {{--<th>Balance</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($e_pins as $e_pin)--}}
                                                {{--@if($e_pin->type == 'post')--}}
                                                {{--<tr>--}}
                                                {{--<td>{{$e_pin->id}}</td>--}}
                                                {{--<td>{{$e_pin->type}}</td>--}}
                                                {{--<td>{{$e_pin->commission_type}}</td>--}}
                                                {{--<td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>--}}
                                                {{--<td class="rd">-{{$e_pin->value}}</td>--}}
                                                {{--<td>{{$e_pin->date}}</td>--}}
                                                {{--<td class="blnc">000 EGp</td>--}}
                                                {{--</tr>--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div id="tab6">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            {{--<ul class="dropdown-menu" role="menu">--}}
                                                {{--<li><a href="#">All</a></li>--}}
                                                {{--<li><a href="#">Admin</a></li>--}}
                                                {{--<li><a href="#">Transfers</a></li>--}}
                                                {{--<li><a href="#">Registration</a></li>--}}
                                                {{--<li><a href="#">Shipping</a></li>--}}
                                                {{--<li><a href="#">Buy Premuim Products</a></li>--}}
                                                {{--<li><a href="#">Renewal</a></li>--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="table-responsive text-center">--}}
                                            {{--<table class="table table-bordered">--}}
                                                {{--<thead class="text-center">--}}
                                                {{--<tr>--}}
                                                    {{--<th>Transaction ID</th>--}}
                                                    {{--<th>Type</th>--}}
                                                    {{--<th>From / To</th>--}}
                                                    {{--<th>Value</th>--}}
                                                    {{--<th>Date / Time</th>--}}
                                                    {{--<th>Balance</th>--}}
                                                {{--</tr>--}}
                                                {{--</thead>--}}
                                                {{--<tbody>--}}
                                                {{--@foreach($e_pins as $e_pin)--}}
                                                {{--@if($e_pin->type == 'post')--}}
                                                {{--<tr>--}}
                                                {{--<td>{{$e_pin->id}}</td>--}}
                                                {{--<td>{{$e_pin->type}}</td>--}}
                                                {{--<td>{{$e_pin->commission_type}}</td>--}}
                                                {{--<td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>--}}
                                                {{--<td class="rd">-{{$e_pin->value}}</td>--}}
                                                {{--<td>{{$e_pin->date}}</td>--}}
                                                {{--<td class="blnc">000 EGp</td>--}}
                                                {{--</tr>--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--</tbody>--}}
                                            {{--</table>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                </section>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>

    </div>

@endsection
