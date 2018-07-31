@extends('layouts.container_ar')
@section('title')SkyMax | الاصدقاء@endsection
@section('content')
    <div id="page-inside3" class="insd ">
        <div class="top-bg"></div>

        <div class="logo">
            <a href="{{url('/ar')}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png"
                                                                          alt="SkyMax"></a>
        </div>
        <div class="transf">
            <a href="#squarespaceModal-5" data-toggle="modal" class="btn tran-btn">أبدا محادثه جديده</a>
        </div>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">

                <div class="wallet-box">
                    <div class="ft-box">
                        <div class="title">
                            <h3>الأصــدقاء</h3>
                        </div>
                        <div class="stats clearfix" style="margin-top: 37px;height: 59px;">
                            <div class="col-md-6 col-xs-6 ">
                                <h4>عدد الأصـــدقاء = {{auth()->user()->friends->count()}}</h4>
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
                                    <span> قـائمه الأصــدقاء</span>
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
                                                    <th>كـود الصـديق</th>
                                                    <th>الأسم</th>
                                                    <th>عــدد الرسائل</th>
                                                    <th>مـراسله</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(auth()->user()->friends as $friend)
                                                        @if($friend->friend_id == '-1')
                                                            <tr>
                                                                <td>000</td>
                                                                <td>الأدمــن</td>
                                                                <td class="bl">{{ $friend->messages->count() }}</td>
                                                                <td><a href='{{url("/ar/messages/$friend->conv_id")}}'>ارسـل رسـاله</a></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>{{$friend->friend->usercode}}</td>
                                                                <td>{{ $friend->friend->username }}</td>
                                                                <td class="bl">{{ $friend->messages->count() }}</td>
                                                                <td><a href='{{url("/ar/messages/$friend->conv_id")}}'>ارسـل رسـاله</a></td>
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
                        <li><h4 class=" magent">كـود العمـيل</h4></li>
                    </ul>
                    <section id="first-tab-group2" class="tabgroup2">
                        <div id="tab66">
                            <form method="post" action="{{url("ar/addfriend")}}">
                                @csrf
                                <div class="form-group col-md-12">
                                    <input required name="usercode" type="text" class="form-control"  placeholder="كـود العـميل">
                                </div>
                                <button type="submit" class="btn nwbtn3">إضـافه</button>
                            </form>
                        </div>
                    </section>
                </div>



            </div>
        </div>
    </div>
</div>
