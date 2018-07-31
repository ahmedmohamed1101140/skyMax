<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/aslider.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
    <link href="{{asset('assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--ahmed-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/round-button-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tm_editable.css')}}">
    <!--ahmed-->

    @yield('css')


</head>

<body>

    {{--<script>--}}
        {{--swal("Good job!", "You clicked the button!", "success");--}}
    {{--</script>--}}
<script>

    var msg = '{{ Session::get('message') }}';
    var exist = '{{ Session::has('message') }}';
    var error = '{{ Session::has('error') }}';
    var error_msg = '{{ Session::get('error') }}';

    if(exist){
        swal("Good job!", msg , "success");
    }
    if(error){
        swal("Sorry!", error_msg , "error");
    }
</script>

<input type="hidden" id="csrf_token" value="{{csrf_token()}}">
<div id="site-wrapper">

    <header class="home">
        <div class="top-bar">

            <div class="container">
                <div class="col-md-8 col-sm-9 col-xs-12 no-pd">
                    <button id="primary-nav-button" type="button">Menu</button>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu clearfix">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/about')}}">About us</a></li>
                            <li><a href="{{url('/processes')}}">Processes &amp; Procedures</a></li>

                            <li><a href="#">Infinity</a>
                                <ul class="sub-menu">
                                    <li><a href="{{url('/infinity')}}">What’s Infinity</a></li>
                                    <li><a href="{{url('/founders')}}">Infinity Founders</a></li>
                                    <li><a href="{{url('/events')}}">Our Events</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('e_learning.index')}}">E-Learning</a></li>
                            <li><a href="{{url('/contact')}}">Contact us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-4 col-sm-3 col-xs-12 no-pd text-right">
                    <ul class="toplist">
                        @guest
                            <li><a href="#squarespaceModal" data-toggle="modal"><i class="fa fa-user"></i> Login</a>
                            </li>
                            <li><a href="{{url('/ar')}}" target="_self"><span class="en"><img src="{{asset("assets/")}}/img/ar.png" ></span></a></li>

                        @endguest
                        @auth
                            <li>
                                @if(count($new_messages) > 0)
                                    <a href="{{url('/userchat')}}">
                                        <span class="brs">
                                            <i class="fa fa-bell"></i>
                                            {{count($new_messages)}}
                                        </span>
                                    </a>
                                @else
                                    <a href="{{url('/userchat')}}">
                                        <i class="fa fa-bell"></i>
                                    </a>
                                @endif
                            </li>
                            <li>
                                <p class="white"> Welcome, {{auth()->user()->fname}} {{auth()->user()->sname}} {{auth()->user()->lname}}
                                    <span class="brs"><a href="#squarespaceModal-4" data-toggle="modal"><i
                                                    class="fa fa-bars"></i></a></span>
                                </p>
                            </li>
                        <li><a href="{{url('/ar')}}" target="_self"><span class="en"><img src="{{asset("assets/")}}/img/ar.png" ></span></a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>

    </header>



    <div id="app">
        @yield("content")
    </div>


    <footer>
        <div class="text-center">

            <div class="social_icons">
                <a class="btn_facebook"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a>
                <a class="btn_twitter"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a>
                <a class="btn_linkedin"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a>
                <a class="btn_odnoklassniki"><i class="fa fa-odnoklassniki"></i><i class="fa fa-odnoklassniki"></i></a>
                <a class="btn_google"><i class="fa fa-google"></i><i class="fa fa-google"></i></a>
            </div>

        </div>

        <div class="footer-area">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <p>Copyrights@SKYMAX.2018. <span>All Rights Reserved.</span> Powered By <a
                                    href="{{asset("assets/")}}/http://paladox.com" target="_blank">PALADOX</a></p>

                    </div>

                </div>
            </div>
        </div>

    </footer>

</div>


<!--modals-->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Login</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Register</a></li>

                                </ul>
                            </div>
                            <div class="panel-body" >
                                <h4 id="auth_message" class="color_danger text-center"></h4>
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab1">

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">

                                                <input value="{{ old('username') }}" name="username" type="text"
                                                       class="form-control" placeholder="User Name">
                                            </div>
                                            <div class="form-group">

                                                <input name="password" type="password" class="form-control"
                                                       placeholder="Password">

                                            </div>

                                            <div class="checkbox">
                                                <label class="chk">
                                                    <input name="remember"
                                                           {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <button type="submit" class="btn nwbtn">Sign in</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab2">

                                        <form id="register_form" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group col-md-4  lft">

                                                <input required id="name" value="{{ old('name') }}" name="name"
                                                       type="text"
                                                       class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-4 rght1">
                                                <input required id="middle_name" value="{{ old('mid_name') }}"
                                                       name="middle_name"
                                                       type="text"
                                                       class="form-control" placeholder="Middle Name">
                                            </div>
                                            <div class="form-group col-md-4  rght">

                                                <input required id="last_name" value="{{ old('last_name') }}"
                                                       name="last_name"
                                                       type="text"
                                                       class="form-control" placeholder="Last Name">
                                            </div>

                                            <div class="form-group col-md-4  lft">

                                                <select required id="country" class="form-control selecty"
                                                        name="country">
                                                    <option value="0" disabled selected>Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 rght1">

                                                <select required id="state" class="form-control selecty"
                                                        name="state">
                                                    <option value="0" disabled selected>State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name_eng}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4  rght">
                                                <input required id="city" name="city" type="text" class="form-control"
                                                       placeholder="city" value="{{ old('city')}}">
                                            </div>

                                            <div class="form-group col-sm-6 lft">
                                                <div class="form-control" style="height: 35px;">
                                                    <label style="margin-right: 25px" class="radio-inline">
                                                        <input style="margin-top:7px" checked type="radio" value="1" name="position">Left
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input style="margin-top:7px" type="radio" value="2" name="position">Right
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group nw-pd">

                                                <input required id="address" name="address" type="text"
                                                       class="form-control"
                                                       value="{{ old('address')}}"
                                                       placeholder="Address">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="Nationaid" maxlength="10" name="Nationaid"
                                                       type="number"
                                                       value="{{ old('Nationaid')}}"
                                                       class="form-control"
                                                       placeholder="National ID">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required style="line-height: 1" name="birth_date" type="date"
                                                       class="form-control"
                                                       id="datepicker"
                                                       placeholder="Date of birth">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="phone" maxlength="10" name="phone" type="text"
                                                       class="form-control"
                                                       value="{{ old('phone')}}"
                                                       placeholder="Phone">
                                            </div>
                                            <div class="form-group col-md-6  lft">

                                                <input required id="username" name="username" type="text"
                                                       class="form-control"
                                                       value="{{ old('username')}}"
                                                       placeholder="Username">
                                            </div>
                                            <div class="form-group nw-pd">

                                                <input required id="mail" name="mail" type="email"
                                                       class="form-control"
                                                       value="{{ old('mail')}}"
                                                       placeholder="E-mail">
                                            </div>


                                            <div class="form-group col-md-6 rght">

                                                <input required id="beneficiary" name="beneficiary" type="text"
                                                       class="form-control"
                                                       value="{{ old('beneficiary')}}"
                                                       placeholder="Beneficiary">
                                            </div>

                                            <div class="form-group col-md-6 rght">

                                                <input required id="relation" name="relation" type="text"
                                                       class="form-control"
                                                       value="{{ old('relation')}}"
                                                       placeholder="Relation">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="password" maxlength="20" name="password"
                                                       type="password"
                                                       class="form-control"
                                                       placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="password_confirmation" maxlength="20"
                                                       name="password_confirmation"
                                                       type="password" class="form-control"
                                                       placeholder="Re-Password">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="inside_password" maxlength="20"
                                                       name="inside_password"
                                                       type="password" class="form-control"
                                                       placeholder="Inside Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="inside_password_confirmation"
                                                       name="inside_password_confirmation" maxlength="20"
                                                       type="password"
                                                       class="form-control"
                                                       placeholder="Re-Inside Password">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="checkbox">
                                                <label class="chk">
                                                    <input id="terms" required type="checkbox"> I accept the <a href="#"
                                                                                                       target="_self">Terms
                                                        of Use.</a>
                                                </label>
                                            </div>
                                            <button id="submit_btn" type="submit" class="btn nwbtn">Sign up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
<div class="modal fade" id="squarespaceModal-4" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="my-menu clearfix">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="col-md-12 col-xs-12">
                        <h3 class="menu-title">My Menu</h3>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-xs-12">
                            <ul>
                                <li><a href="#squarespaceModal-6" data-toggle="modal">Profile</a></li>
                                <li><a href="{{url("userchat")}}" target="_self">Chat</a></li>
                                <li><a href="#squarespaceModal-7" data-toggle="modal">Renew Date </a><p style="color: red;">{{$renew_warning}}</p></li>
                                <li><a href="{{url("myproducts")}}" target="_self">My Orders</a></li>
                                <li><a href="{{url("team")}}" target="_self">Team</a></li>
                                <li><a href="{{url("wallet")}}" target="_self">Wallet</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{asset("assets/")}}/{{ route('users.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="menu-img">
                                <img src="{{asset("assets/")}}/img/menu.jpg" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="squarespaceModal-7" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="my-menu my-profile clearfix">
                    <button type="button" class="close back" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Back</span>
                    </button>
                    <div class="col-md-12 col-xs-12">
                        <h3 class="menu-title">My Profile</h3>
                        <div class="clearfix"></div>
                        @auth
                            <div class="col-md-12 col-xs-12">
                                <h3 class="ylw">Account Information:</h3>
                                <p><strong>Username:</strong> <span>{{auth()->user()->username}}</span></p>
                                <p><strong>Account ID:</strong> <span>{{auth()->user()->usercode}}</span></p>
                                <p><strong>E-Mail:</strong> <span>{{auth()->user()->mail}}</span></p>
                                <form method="post" action="{{ route('renewaccount') }}">
                                    @csrf
                                    <p><strong>Renew Date:</strong> <span>{{auth()->user()->renew_date}}{{$renew_warning}}</span></p>
                                    <button type="submit" class="btn btn-form nwbtn1 " >Renew My Account </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="squarespaceModal-6" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="my-menu my-profile clearfix">
                    <button type="button" class="close back" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Back</span>
                    </button>
                    <div class="col-md-12 col-xs-12">
                        <h3 class="menu-title">My Profile</h3>
                        <div class="clearfix"></div>
                        @auth
                        <div class="col-md-12 col-xs-12">
                            <h3 class="ylw">Account Information:</h3>
                            <p><strong>Username:</strong> <span>{{auth()->user()->username}}</span></p>
                            <p><strong>Account ID:</strong> <span>{{auth()->user()->usercode}}</span></p>
                            <p><strong>E-Mail:</strong> <span>{{auth()->user()->mail}}</span></p>
                            <form method="post" action="{{ route('updateprofile') }}">
                                @csrf
                                {{--<table class="tbl">--}}
                                    {{--<tr>--}}
                                        {{--<td><strong style="margin-right: 65px;">Old Password:</strong></td>--}}
                                        {{--<td><input type="password" name="old_password"></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                {{--<table class="tbl">--}}
                                    {{--<tr>--}}
                                        {{--<td><strong style="margin-right: 58px;">New Password:</strong></td>--}}
                                        {{--<td><input type="password" name="new_password"></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                {{--<table class="tbl">--}}
                                    {{--<tr>--}}
                                        {{--<td><strong style="margin-right: 22px;">Old inside Password:</strong></td>--}}
                                        {{--<td><input type="password" name="old_pincode"></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                {{--<table class="tbl">--}}
                                    {{--<tr>--}}
                                        {{--<td><strong style="margin-right: 15px;">New Inside Password:</strong></td>--}}
                                        {{--<td><input type="password" name="new_pincode"></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                {{--<table class="tbl">--}}
                                    {{--<tr>--}}
                                        {{--<td><strong>Password:</strong></td>--}}
                                        {{--<td><p class="meterReadings"><span id="meter01" contenteditable="false" class="meterEdit" >123456</span></p></td>--}}
                                        {{--<td><p class="unionPencil" data-edit-target="meter01"><span class="fa fa-pencil"></span></p></td>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                                <table class="tbl">
                                    <tr>
                                        <td><strong>Old Password:</strong></td>
                                        <!--ahmed-->
                                        <td>
                                             <span class="span60">
                                               <div class="tm_editable_container input-group theme1" id="text_demo" >
                                                    <input name="old_password" type="text" value ="This is text field" />
                                                </div>
                                            </span>
                                        </td>
                                        <!--ahmed-->
                                    </tr>
                                </table>
                                <table class="tbl">
                                    <tr>
                                        <td><strong>Password:</strong></td>
                                        <!--ahmed-->
                                        <td>
                                             <span class="span60">
                                               <div class="tm_editable_container input-group theme1" id="text_demo" >
                                                    <input name="new_password" type="text" value ="This is text field" />
                                                </div>
                                            </span>
                                        </td>
                                        <!--ahmed-->
                                    </tr>
                                </table>
                                <table class="tbl">
                                    <tr>
                                        <td><strong>Old Inside Password:</strong></td>
                                        <!--ahmed-->
                                        <td>
                                             <span class="span60">
                                               <div class="tm_editable_container input-group theme1" id="text_demo" >
                                                    <input type="text" name="old_pincode" value ="This is text field" />
                                                </div>
                                            </span>
                                        </td>
                                        <!--ahmed-->
                                    </tr>
                                </table>
                                <table class="tbl">
                                    <tr>
                                        <td><strong>Inside Password:</strong></td>
                                        <!--ahmed-->
                                        <td>
                                            <span class="span60">
                                                <div class="tm_editable_container input-group theme1" id="text_demo" >
                                                    <input type="text" name="new_pincode" value ="This is text field11" />
                                                </div>
                                            </span>
                                        </td>
                                        <!--ahmed-->
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-form nwbtn1 " >Update </button>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <h3 class="ylw">Account Information:</h3>
                            <p><strong>Name:</strong> <span>{{auth()->user()->fname}} {{auth()->user()->sname}} {{auth()->user()->lname}}</span></p>
                            <p><strong>User Code:</strong> <span>{{auth()->user()->usercode}} </span></p>

                            <p><strong>Address:</strong>
                                <span>{{auth()->user()->address}}</span>
                            </p>
                            <p><strong>Phone:</strong> <span>{{auth()->user()->phone}}</span></p>
                            <p><strong>Date of Birth:</strong>
                                <span>{{auth()->user()->dateofbirth}}</span>
                            </p>
                            <p><strong>National ID:</strong> <span>{{auth()->user()->Nationaid}}</span></p>

                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
<div class="modal fade" id="squarespaceModal-3" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="panel panel-primary">

                            <div class="panel-body">
                                <div class="event">
                                    <h3>Event Name</h3>
                                    <div id="myCarousel" class="carousel slide nwcarsl " data-interval="6500"
                                         data-ride="carousel">

                                        <!-- Carousel indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                            <div class="item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                            <div class="item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                        </div>
                                        <!-- Carousel nav -->
                                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                            <span class="fa fa-chevron-left"></span>
                                        </a>
                                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </div>
                                    <div class="descrp">
                                        <p><strong>01/01/2018</strong></p>
                                        <p><strong>03:00 PM - 04:00 PM</strong></p>
                                        <p><strong>Sheraton, Cairo, Egypt</strong></p>
                                        <p>Selection are all the exclusive content designed by our team ilont
                                            Additionally, if you are subscribed to our Premium account, when if you are
                                            subscribed to our Premium account, when if you are if u subscribed to our
                                            Premium account subscribed to our Premium account.</p>
                                        <form>
                                            <div class="form-group">

                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-6  lft">

                                                <input type="text" class="form-control" placeholder="Mobile">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input type="email" class="form-control" placeholder="E-mail">
                                            </div>
                                            <button class="btn nwbtn2" href="#">Request</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="url" data-url="{{url('')}}"></div>

<!--modals-->
<script src="{{asset("assets/")}}/js/jquery-3.1.0.min.js"></script>
<script src="{{asset("assets/")}}/js/jquery.noconflict.js" type="text/javascript"></script>
<script src="{{asset("assets/")}}/js/bootstrap.js" type="text/jscript"></script>
<script src="{{asset("assets/")}}/js/aslider.min.js"></script>
<script src="{{asset("assets/")}}/js/menu.js"></script>
<script src="{{asset("assets/")}}/js/edit.js"></script>
<script src="{{asset("assets/")}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset("assets/")}}/js/scroll.js"></script>
<script src="{{asset("assets/")}}/js/register.js"></script>
<script src="{{asset("assets/")}}/js/style.js"></script>
<script src="{{asset("assets/")}}/js/magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset("assets/")}}/js/tm_validator.js"></script>
<script type="text/javascript" src="{{asset("assets/")}}/js/tm_editable.js"></script>
<script type="text/javascript" src="{{asset("assets/")}}/js/chat.js"></script>
<script>

    jQuery(document).ready(function ($) {

        $('#myCarousel').carousel({
            interval: 5000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });


</script>
<!--tabs-->
<script>

    $('.tabgroup > div').hide();
    $('.tabgroup > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

    $('.tabgroup1 > div').hide();
    $('.tabgroup1 > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup1'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

    $('.tabgroup2 > div').hide();
    $('.tabgroup2 > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup2'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

</script>
<!--tabs-->
<!--accordion-->
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-minus-circle fa-plus-circle');
    }

    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
<!--accordion-->

<!--New JS-->
<script>
    jQuery(function ($) {
        "use strict";
        $(".expander-list").find("ul").hide().end().find(" .expander").text("+").end().find(".active").each(function () {
            $(this).parents("li ").each(function () {
                var $this = $(this),
                    $ul = $this.find("> ul"),
                    $name = $this.find("> .name a"),
                    $expander = $this.find("> .name .expander");
                $ul.show();
                $name.css("font-weight", "bold");
                $expander.html("&minus;")
            })
        }).end().find(" .expander").each(function () {
            var $this = $(this),
                hide = $this.text() === "+",
                $ul = $this.parent(".name").next("ul"),
                $name = $this.next("a");
            $this.click(function () {
                if ($ul.css("display") ==
                    "block") $ul.slideUp("slow");
                else $ul.slideDown("slow");
                $(this).html(hide ? "&minus;" : "+");
                hide = !hide
            })
        })
    });
    jQuery(function ($) {
        "use strict";
        $(".collapsed-block .expander").click(function (e) {
            var collapse_content_selector = $(this).attr("href");
            var expander = $(this);
            if (!$(collapse_content_selector).hasClass("open")) expander.addClass("open").html("&minus;");
            else expander.removeClass("open").html("+"); if (!$(collapse_content_selector).hasClass("open")) $(collapse_content_selector).addClass("open").slideDown("normal");
            else $(collapse_content_selector).removeClass("open").slideUp("normal");
            e.preventDefault()
        })
    });
</script>

<!--ahmed-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#text_demo, #textarea_demo, #checkbox_demo, #select_demo, .width_auto_demo').tm_editbale('init',{
            theme:'round-button-theme',
            outside_btn:{
                onshow:"&nbsp;<i class='fa fa-pencil'></i>&nbsp;",
                new_line:false,
                onhover:''
            },
            inside_btn:{
                new_line:false,
                ok:"<i class='fa fa-check'></i>",
                cancel:"<i class='fa fa-times'></i>"
            }
        });
        setTimeout(function(){
            $('#radio_demo').tm_editbale('init',{
                theme:'round-button-theme',
                outside_btn:{
                    onshow:"&nbsp;<i class='fa fa-pencil'></i>&nbsp;",
                    new_line:false,
                    onhover:''
                },
                inside_btn:{
                    new_line:false,
                    ok:"<i class='fa fa-check'></i>",
                    cancel:"<i class='fa fa-times'></i>"
                }
            });
        },350);
    });
</script>
<!--ahmed-->


    @yield('js')


</body>
</html>
