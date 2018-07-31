{{--<a href="javascript:;" class="page-quick-sidebar-toggler">--}}
    {{--<i class="icon-login"></i>--}}
{{--</a>--}}
{{--<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">--}}
    {{--<div class="page-quick-sidebar">--}}
        {{--<ul class="nav nav-tabs">--}}

            {{--<li classx  ="active">--}}
                {{--<a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Clients--}}
                    {{--<span class="badge badge-success">7</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
        {{--<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">--}}
            {{--<div class="page-quick-sidebar-alerts-list">--}}
                {{--<h3 class="list-heading">General</h3>--}}
                {{--<ul class="feeds list-items">--}}
                    {{--@foreach($friends as $friend)--}}
                    {{--<li>--}}
                        {{--<a data-toggle="modal" href="#large123" data-friend="{{$friend}}">--}}
                            {{--<div class="col1">--}}
                                {{--<div class="cont">--}}
                                    {{--<div class="cont-col1">--}}
                                        {{--<div class="label label-sm label-success">--}}
                                            {{--<i class="fa fa-user"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="cont-col2">--}}
                                        {{--<div class="desc"> {{$friend->client->username}}</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<!-- /.modal -->--}}
{{--<div class="modal fade bs-modal-lg" id="large123" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-lg">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
                {{--<h4 class="modal-title">Message Clients</h4>--}}
            {{--</div>--}}
            {{--{!! Form::open(['route' => ['admin.message.submit'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}--}}
            {{--<div class="tab-content">--}}
                {{--<!-- BEGIN PORTLET-->--}}
                {{--<div class="portlet light bordered">--}}
                    {{--<div class="portlet-title">--}}
                        {{--<div class="caption">--}}
                            {{--<i class="icon-bubble font-hide hide"></i>--}}
                            {{--<span class="caption-subject font-hide bold uppercase">{{$friend->client->username}}</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="portlet-body" id="chats">--}}
                        {{--<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible1="1">--}}
                            {{--<ul class="chats">--}}
                                {{--@foreach($friend->messages as $message)--}}
                                    {{--@if($message->msg_from == -1)--}}
                                    {{--<li class="out">--}}
                                        {{--<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />--}}
                                        {{--<div class="message">--}}
                                            {{--<span class="arrow"> </span>--}}
                                            {{--<a href="javascript:;" class="name"> Admin</a>--}}
                                            {{--<span class="datetime"> <small>{{ $message->created_at->diffForHumans() }}</small> </span>--}}
                                            {{--<span class="body"> {{$message->message}} </span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--@endif--}}
                                    {{--<li class="in">--}}
                                    {{--<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar1.jpg" />--}}
                                    {{--<div class="message">--}}
                                        {{--<span class="arrow"> </span>--}}
                                        {{--<a href="javascript:;" class="name"> {{$friend->client->username}} </a>--}}
                                        {{--<span class="datetime"> <small>{{ $message->created_at->diffForHumans() }}</small>  </span>--}}
                                        {{--<span class="body"> {{$message->message}}</span>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="chat-form">--}}
                            {{--<div class="input-cont">--}}
                                {{--<input class="form-control" type="text" placeholder="Type a message here..." /> </div>--}}
                            {{--<div class="btn-cont">--}}
                                {{--<span class="arrow"> </span>--}}
                                {{--<a href="" class="btn blue icn-only">--}}
                                    {{--<i class="fa fa-check icon-white"></i>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- END PORTLET-->--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>--}}
                {{--<button type="submit" class="btn green">Send</button>--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        {{--<!-- /.modal-content -->--}}
    {{--</div>--}}
    {{--<!-- /.modal-dialog -->--}}
{{--</div>--}}
{{--<!-- /.modal -->--}}