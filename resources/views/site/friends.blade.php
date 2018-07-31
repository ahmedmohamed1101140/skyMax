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
            <a href="#squarespaceModal-5" data-toggle="modal" class="btn tran-btn">Add Friend</a>
        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                <div class="wallet-box">
                    <div class="ft-box">
                        <div class="title">
                            <h3>Friends</h3>
                        </div>
                        <div class="stats clearfix" style="margin-top: 37px;height: 59px;">
                            <div class="col-md-6 col-xs-6 ">
                                <h4>Total Friends = {{auth()->user()->friends->count()}}</h4>
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
                                    <span> Friend List</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="wrapper mymodal">
                                <section id="first-tab-group" class="tabgroup">
                                    <div id="tab1">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                <tr>
                                                    <th>Friend code</th>
                                                    <th>Name</th>
                                                    <th>Total Messages</th>
                                                    <th>New Messages</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach(auth()->user()->friends as $friend)
                                                        @if($friend->friend_id == '-1')
                                                            <tr>
                                                                <td>000</td>
                                                                <td>Admin</td>
                                                                <td class="bl">{{ $friend->messages->count() }}</td>
                                                                <?php $count=0 ?>
                                                                @foreach($new_messages as $item)
                                                                    @if($item == '-1')
                                                                        <?php $count++ ?>
                                                                    @endif
                                                                @endforeach
                                                                @if($count > 0)
                                                                    <td class="rd">New Messages</td>
                                                                @else
                                                                    <td class="bl">All Seen</td>
                                                                @endif
                                                                <td><a href='{{url("messages/$friend->conv_id")}}'>Messages</a></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>{{$friend->friend->usercode}}</td>
                                                                <td>{{ $friend->friend->username }}</td>
                                                                <td class="bl">{{ $friend->messages->count() }}</td>
                                                                <?php $count1=0 ?>
                                                                @foreach($new_messages as $item)
                                                                    @if($item == $friend->friend->id)
                                                                        <?php $count1++ ?>
                                                                    @endif
                                                                @endforeach
                                                                @if($count1 > 0)
                                                                    <td class="rd">New Messages</td>
                                                                @else
                                                                    <td class="bl">All Seen</td>
                                                                @endif
                                                                <td><a href='{{url("messages/$friend->conv_id")}}'>Messages</a></td>
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
                        <li><h4 class=" magent">User Code</h4></li>
                    </ul>
                    <section id="first-tab-group2" class="tabgroup2">
                        <div id="tab66">
                            <form method="post" action="{{url("addfriend")}}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <input required name="usercode" type="text" class="form-control"  placeholder="User Code">
                                </div>
                                <button type="submit" class="btn nwbtn3">Add</button>
                            </form>
                        </div>
                    </section>
                </div>



            </div>
        </div>
    </div>
</div>
