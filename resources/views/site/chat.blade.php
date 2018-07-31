@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')


    <div id="page-inside6" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{asset("assets/")}}/index.html" target="_self"><img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="container">
            <div class="event-title">
                <h1>SkyMax Community</h1>
                <p>If there's a particular spot in your website where you can win people over, it's your About Us page. Here's how to make it look good.
                </p>
            </div>

        </div>

    </div>
    <div class="contents">
        <div class="container">
            <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 no-pd">
                <div class="dash-pages support">
                    @if($messages->friend_id == '-1')
                        <h1>Admin</h1>
                    @elseif($messages->friend->id == auth()->user()->id)
                        <h1>{{$messages->client->fname}} {{$messages->client->sname}} {{$messages->client->lname}}</h1>
                    @else
                        <h1>{{$messages->friend->fname}} {{$messages->friend->sname}} {{$messages->friend->lname}}</h1>
                    @endif
                </div>
                <div class="chat-box clearfix">
                    <div class="msgs-wrapper scrollbar" id="style-1">
                        @foreach($messages->messages as $message)
                            @if($message->msg_from == auth()->user()->id)
                                <div class="left-msg">
                                    <div class="message-box ">
                                        <div class="message">
                                            <p>{{$message->message}}</p>
                                        </div>
                                    </div>
                                    <p><small>{{ $message->created_at->diffForHumans() }}</small></p>
                                </div>
                            @elseif($message->msg_from == '-1')
                                <div class="right-msg">
                                    <div class="message-box">
                                        <div class="message">
                                            <p>{{$message->message}}</p>
                                        </div>
                                    </div>
                                    <p><small>{{ $message->created_at->diffForHumans() }}</small></p>
                                </div>
                            @else
                                <div class="right-msg">
                                    <div class="message-box">
                                        <div class="message">
                                            <p>{{$message->message}}</p>
                                        </div>
                                    </div>
                                    <p><small>{{ $message->created_at->diffForHumans() }}</small></p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                    <div class="enter-message">
                        <form method="post" action="{{url("send_message")}}">
                            @csrf
                            <input type="hidden" name="conv_id" value="{{$messages->conv_id}}">

                            <input type="text" id="message" name="message" required class="msg" placeholder="Enter your message.."/>
                            {{--<a href="#" class="btn btn-org pull-right nw-pad ">Send</a>--}}
                            <button type="submit" style="margin-left: 15px;" class="btn btn-org pull-right nw-pad ">Send</button>
                            <div class="file-upload1">
                                {{--<label for="upload" class="file-upload__label btn btn-gry nw-pad "><i class="fa fa-paperclip"></i> Attach</label>--}}
                                {{--<input id="upload" class="file-upload__input" type="file" name="file-upload1">--}}
                            </div>
                        </form>
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
                        <h4>User Message</h4>
                        <li><a href="#tab77" class="active magent">Send To User</a></li>
                        <li><a href="#tab66" class="magent">Send To Admin</a></li>
                    </ul>
                    <section id="first-tab-group2" class="tabgroup2">
                        <div class="logregform" id="tab77">
                            <div class="feildcont">
                                <form method="post" action="{{url("userchat")}}" class="clearfix">
                                    @csrf
                                    <div>
                                        <label>User Name <em>*</em></label>
                                        <div class="form-group clearfix">
                                            <input type="text" name="username" class="effect-9 form-control">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Subject <em>*</em></label>
                                        <div class="form-group clearfix">
                                            <input type="text" name="subject" class="effect-9 form-control">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Message <em>*</em></label>
                                        <div class="form-group clearfix">
                                            <textarea rows="3" name="msg" class="effect-9 form-control"></textarea>
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="fbut">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="logregform" id="tab66">
                            <div class="feildcont">
                                <form method="post" action="{{url("userchat")}}" class="clearfix">
                                    @csrf
                                    <input hidden name="admin" >
                                    <div>
                                        <label>Subject <em>*</em></label>
                                        <div class="form-group clearfix">
                                            <input type="text" name="subject" class="effect-9 form-control">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label>Message <em>*</em></label>
                                        <div class="form-group clearfix">
                                            <textarea rows="3" name="msg" class="effect-9 form-control"></textarea>
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="fbut">Submit</button>
                                </form>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal fade" id="squarespaceModal-2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--<span aria-hidden="true">×</span>--}}
            {{--</button>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12 col-xs-12">--}}
                        {{--<div class="panel panel-primary">--}}
                            {{--<div class="panel-body">--}}
                                {{--<div class="event">--}}
                                    {{--@if($message->client_sender_id == auth()->user()->id)--}}
                                        {{--<p><strong>From : YOU</strong></p>--}}
                                        {{--<p><strong>To: {{$message->receveir->username}}</strong></p>--}}
                                    {{--@elseif($message->client_revevier_id == auth()->user()->id)--}}
                                        {{--<p><strong>From : {{$message->sender->username}}</strong></p>--}}
                                        {{--<p><strong>To: YOU</strong></p>--}}
                                    {{--@endif--}}
                                        {{--<br><br>--}}
                                    {{--<div class="descrp">--}}
                                        {{--<p><strong>{{$message->date}}</strong></p>--}}
                                        {{--Subject--}}
                                        {{--<p><strong>{{$message->subject}}</strong></p>--}}
                                        {{--<br><br>Message--}}
                                        {{--<p>{{$message->message}}</p>--}}
                                            {{--<a  class="btn nwbtn2" href="#squarespaceModal-5" data-toggle="modal" >Reply</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
