@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
    <div id="page-inside3" class="insd ">
        <div class="top-bg"></div>

        <div class="logo">
            <a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png"
                                                                          alt="SkyMax"></a>
        </div>
        <div class="transf">
            <a href="#squarespaceModal-5" data-toggle="modal" class="btn tran-btn">Transfer</a>
        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                <div class="wallet-box">
                    <div class="ft-box">
                        <div class="title">
                            <h3>Purchase</h3>
                        </div>
                        <div class="stats clearfix">
                            <div class="col-md-6 col-xs-6 ">
                                <h4>Total = {{auth()->user()->allcom_left + auth()->user()->allcom_right}}</h4>
                                <p>Right = <span></span>{{auth()->user()->allcom_right}}</p>
                                <p>left = <span></span>{{auth()->user()->allcom_left}}</p>
                            </div>
                            <div class="col-md-6 col-xs-6 ">
                                <h4>Total = {{auth()->user()->exitcom_left + auth()->user()->exitcom_right}}</h4>
                                <p>Right = <span></span>{{auth()->user()->exitcom_right}}</p>
                                <p>left = <span></span>{{auth()->user()->exitcom_left}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sd-box">
                        <div class="title">
                            <h3>Commissions</h3>
                        </div>
                        <div class="stats padd-25">
                            <div class="col-md-4 col-xs-4">
                                <h4>Binary Income</h4>
                                <p>{{$count_binary}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>Direct</h4>
                                <p>{{$count_direct}}</p>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <h4>I-Store</h4>
                                <p>{{$count_store}}</p>
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
                                    <span> E-Pin</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="wrapper mymodal">

                                <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                                    <li><a href="#tab1" class="active magent">All</a></li>
                                    <li><a href="#tab2" class=" magent">Credit</a></li>
                                    <li><a href="#tab3" class="magent">Debit</a></li>

                                </ul>
                                <section id="first-tab-group" class="tabgroup">
                                    <div id="tab1">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>From / To</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_pins as $e_pin)
                                                    <tr>
                                                        <td>{{$e_pin->id}}</td>
                                                        <td>{{$e_pin->type}}</td>
                                                        <td>{{$e_pin->commission_type}}</td>
                                                        @if($e_pin->sender == null || $e_pin->receiver == null)
                                                            <td>Admin</td>
                                                        @else
                                                        <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                        @endif
                                                        @if($e_pin->type == 'get')
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                        @else
                                                            <td class="rd">{{$e_pin->value}}</td>
                                                        @endif
                                                        <td>{{$e_pin->date}}</td>
                                                    </tr>
                                                @endforeach
                                                @foreach($e_pins1 as $e_pin)
                                                    <tr>
                                                        <td>{{$e_pin->id}}</td>
                                                        <td>{{$e_pin->type}}</td>
                                                        <td>{{$e_pin->commission_type}}</td>
                                                        @if($e_pin->sender == null || $e_pin->receiver == null)
                                                            <td>Admin</td>
                                                        @else
                                                            <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                        @endif
                                                        @if($e_pin->type == 'get')
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                        @else
                                                            <td class="rd">{{$e_pin->value}}</td>
                                                        @endif
                                                        <td>{{$e_pin->date}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab2">
                                        <div class="btn-group">
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">Transfers</a></li>
                                            </ul>
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>From / To</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_pins as $e_pin)
                                                    @if($e_pin->type == 'get')
                                                        <tr>
                                                            <td>{{$e_pin->id}}</td>
                                                            <td>{{$e_pin->type}}</td>
                                                            <td>{{$e_pin->commission_type}}</td>
                                                            @if($e_pin->sender == null || $e_pin->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                            @endif
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                            <td>{{$e_pin->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach($e_pins1 as $e_pin)
                                                    @if($e_pin->type == 'get')
                                                        <tr>
                                                            <td>{{$e_pin->id}}</td>
                                                            <td>{{$e_pin->type}}</td>
                                                            <td>{{$e_pin->commission_type}}</td>
                                                            @if($e_pin->sender == null || $e_pin->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                            @endif
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                            <td>{{$e_pin->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab3">
                                        <div class="btn-group">
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">Transfers</a></li>
                                                <li><a href="#">Registration</a></li>
                                                <li><a href="#">Shipping</a></li>
                                                <li><a href="#">Buy Premuim Products</a></li>
                                                <li><a href="#">Renewal</a></li>

                                            </ul>
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>From / To</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_pins as $e_pin)
                                                    @if($e_pin->type == 'post')
                                                        <tr>
                                                            <td>{{$e_pin->id}}</td>
                                                            <td>{{$e_pin->type}}</td>
                                                            <td>{{$e_pin->commission_type}}</td>
                                                            @if($e_pin->sender == null || $e_pin->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                            @endif
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                            <td>{{$e_pin->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach($e_pins1 as $e_pin)
                                                    @if($e_pin->type == 'post')
                                                        <tr>
                                                            <td>{{$e_pin->id}}</td>
                                                            <td>Get</td>
                                                            <td>{{$e_pin->commission_type}}</td>
                                                            @if($e_pin->sender == null || $e_pin->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_pin->sender->username}} / {{$e_pin->receiver->username}}</td>
                                                            @endif
                                                            <td class="bl">{{$e_pin->value}}</td>
                                                            <td>{{$e_pin->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less fa fa-2x fa-plus-circle"></i>
                                    <span>E-Money</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="wrapper mymodal">

                                <ul class="tabs clearfix" data-tabgroup="first-tab-group1">
                                    <li><a href="#tab11" class="active magent">All</a></li>
                                    <li><a href="#tab21" class=" magent">Credit</a></li>
                                    <li><a href="#tab31" class="magent">Debit</a></li>

                                </ul>
                                <section id="first-tab-group1" class="tabgroup1">
                                    <div id="tab11">

                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>Source</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_moneys as $e_money)
                                                    <tr>
                                                        <td>{{$e_money->id}}</td>
                                                        <td>{{$e_money->type}}</td>
                                                        <td>{{$e_money->comtiontype}}</td>
                                                        @if($e_money->sender == null || $e_money->receiver == null)
                                                            <td>Admin</td>
                                                        @else
                                                            <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                        @endif
                                                        @if($e_money->type == 'get')
                                                            <td class="bl">{{$e_money->cash_money}}</td>
                                                        @else
                                                            <td class="rd">{{$e_money->cash_money}}</td>
                                                        @endif
                                                        <td>{{$e_money->date}}</td>
                                                    </tr>
                                                @endforeach
                                                @foreach($e_moneys1 as $e_money)
                                                    <tr>
                                                        <td>{{$e_money->id}}</td>
                                                        <td>{{$e_money->type}}</td>
                                                        <td>{{$e_money->comtiontype}}</td>
                                                        @if($e_money->sender == null || $e_money->receiver == null)
                                                            <td>Admin</td>
                                                        @else
                                                            <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                        @endif
                                                        @if($e_money->type == 'get')
                                                            <td class="bl">{{$e_money->cash_money}}</td>
                                                        @else
                                                            <td class="rd">{{$e_money->cash_money}}</td>
                                                        @endif
                                                        <td>{{$e_money->date}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab21">
                                        <div class="btn-group">
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">Commissions</a></li>
                                                <li><a href="#">Shippings</a></li>

                                            </ul>
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>Source2</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_moneys as $e_money)
                                                    @if($e_money->type == 'get')
                                                        <tr>
                                                            <td>{{$e_money->id}}</td>
                                                            <td>{{$e_money->type}}</td>
                                                            <td>{{$e_money->comtiontype}}</td>
                                                            @if($e_money->sender == null || $e_money->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                            @endif
                                                            @if($e_money->type == 'get')
                                                                <td class="bl">{{$e_money->cash_money}}</td>
                                                            @else
                                                                <td class="rd">{{$e_money->cash_money}}</td>
                                                            @endif
                                                            <td>{{$e_money->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach($e_moneys1 as $e_money)
                                                    @if($e_money->type == 'get')
                                                        <tr>
                                                            <td>{{$e_money->id}}</td>
                                                            <td>{{$e_money->type}}</td>
                                                            <td>{{$e_money->comtiontype}}</td>
                                                            @if($e_money->sender == null || $e_money->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                            @endif
                                                            @if($e_money->type == 'get')
                                                                <td class="bl">{{$e_money->cash_money}}</td>
                                                            @else
                                                                <td class="rd">{{$e_money->cash_money}}</td>
                                                            @endif
                                                            <td>{{$e_money->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab31">
                                        <div class="btn-group">
                                            {{--<button type="button" class="btn btn-danger dropdown-toggle"--}}
                                                    {{--data-toggle="dropdown">--}}
                                                {{--Action <span class="caret"></span>--}}
                                            {{--</button>--}}
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Admin</a></li>
                                                <li><a href="#">Transfers</a></li>
                                                <li><a href="#">Buy Qualification Products</a></li>
                                            </ul>
                                        </div>
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Transaction ID</th>
                                                    <th>Type</th>
                                                    <th>Commission Type</th>
                                                    <th>Source2</th>
                                                    <th>Value</th>
                                                    <th>Date / Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($e_moneys as $e_money)
                                                    @if($e_money->type == 'post')
                                                        <tr>
                                                            <td>{{$e_money->id}}</td>
                                                            <td>{{$e_money->type}}</td>
                                                            <td>{{$e_money->comtiontype}}</td>
                                                            @if($e_money->sender == null || $e_money->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                            @endif
                                                            @if($e_money->type == 'get')
                                                                <td class="bl">{{$e_money->cash_money}}</td>
                                                            @else
                                                                <td class="rd">{{$e_money->cash_money}}</td>
                                                            @endif
                                                            <td>{{$e_money->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach($e_moneys1 as $e_money)
                                                    @if($e_money->type == 'post')
                                                        <tr>
                                                            <td>{{$e_money->id}}</td>
                                                            <td>{{$e_money->type}}</td>
                                                            <td>{{$e_money->comtiontype}}</td>
                                                            @if($e_money->sender == null || $e_money->receiver == null)
                                                                <td>Admin</td>
                                                            @else
                                                                <td>{{$e_money->sender->username}} / {{$e_money->receiver->username}}</td>
                                                            @endif
                                                            @if($e_money->type == 'get')
                                                                <td class="bl">{{$e_money->cash_money}}</td>
                                                            @else
                                                                <td class="rd">{{$e_money->cash_money}}</td>
                                                            @endif
                                                            <td>{{$e_money->date}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>

@endsection
<div class="modal fade" id="squarespaceModal-5" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">

                    <ul class="tabs clearfix" data-tabgroup="first-tab-group2">
                        <li><h4 class=" magent">Transfer By</h4></li>
                        <li><a href="#tab66" class="active magent">E-Money</a></li>
                        <li><a href="#tab77" class="magent">E-Pin</a></li>

                    </ul>
                    <section id="first-tab-group2" class="tabgroup2">
                        <div id="tab66">
                            <form method="post" action="{{url("transfer")}}">
                                @csrf
                                <input type="hidden" name="e_type_id" value="0">
                                <div class="form-group col-md-6  lft">
                                    <input required name="username" type="text" class="form-control"  placeholder="User Code">
                                </div>
                                <div class="form-group col-md-6 rght" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group nw-pd">
                                    <input required name="value" type="number" class="form-control"  placeholder="Amount">
                                </div>
                                <div class="form-group nw-pd">
                                    <input required name="pincode" type="password" class="form-control"  placeholder="Inside Password">
                                </div>

                                <button type="submit" class="btn nwbtn3">Transfer</button>

                            </form>
                        </div>
                        <div id="tab77">
                            <form method="post" action="{{url("transfer")}}">
                                @csrf
                                <input type="hidden" name="e_type_id" value="1">
                                <div class="form-group col-md-6  lft">
                                    <input required name="username" type="text" class="form-control"  placeholder="User Name">
                                </div>
                                <div class="form-group col-md-6 rght" >
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group nw-pd">
                                    <input required name="value" type="number" class="form-control"  placeholder="Amount">
                                </div>
                                <div class="form-group nw-pd">
                                    <input required name="pincode" type="password" class="form-control"  placeholder="Inside Password">
                                </div>

                                <button type="submit" class="btn nwbtn3">Transfer</button>

                            </form>
                        </div>


                    </section>
                </div>



            </div>
        </div>
    </div>
</div>
