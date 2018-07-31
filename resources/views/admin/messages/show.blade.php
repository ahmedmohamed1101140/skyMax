@extends('admin.layout')

@section('title', "Messages")

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home', 'Home')
@section('page_title','Messages')


{{-- End Breadcums--}}


@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Message Inof </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <dl>
                        <dt>Name : {{$message->name}}</dt>
                        <dd>Mail : {{$message->mail}}</dd>
                        <dd>Phone : {{$message->phone}}</dd>
                        <dd>Date : {{$message->date}}</dd>
                        <dd>Status : <span class="label label-sm label-{{$message->view== 0 ? 'danger' : 'success'}}"> {{$message->view == 0 ? 'Un Read' : 'Read'}} </span></dd>

                    </dl>
                </div>
            </div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Message</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">

                            <div class="well">
                                <h4>Subject: {{$message->subject}}</h4>
                                Message: <br>
                                {{$message->message}}
                            </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection


{{-- Start javascript --}}
@section('js')
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

@endsection

{{-- end javascript --}}