@extends('admin.layout')

@section('title', 'Messages')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Messages")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Messages</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>System Messages </div>

                    <div class="tools">
                        <a href="#large" data-toggle="modal">
                            <button type="button" class="btn btn-primary">Filter Messages</button>
                        </a>
                        {{--<a href="{{route('messages.create')}}">--}}
                            {{--<button type="button" class="btn btn-primary">Create New message</button>--}}
                        {{--</a>--}}
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

                                </th>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i>  Name
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Email
                                </th>
                                <th>
                                    <i class="fa fa-phone"></i> Phone
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Subject
                                </th>
                                <th>
                                    <i class="fa fa-mail-forward"></i>  Message
                                </th>
                                <th>
                                    <i class="fa fa-calendar"></i>  Date
                                </th>
                                <th>
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td class="highlight">
                                        <div class="success"></div>
                                    </td>
                                    <td >
                                        <a href="{{route('messages.show',$message->id)}}"> {{$message->name}} </a>
                                    </td>
                                    <td>
                                        {{$message->mail}}
                                    </td>
                                    <td>
                                        {{$message->phone}}
                                    </td>
                                    <td>
                                        <span class="label label-sm label-{{$message->view== 0 ? 'danger' : 'success'}}"> {{$message->view == 0 ? 'Not Read' : 'Read'}} </span>
                                    </td>
                                    <td>
                                        {{$message->subject}}
                                    </td>
                                    <td>
                                        {{strip_tags(substr($message->message,0,120))}}
                                    </td>
                                    <td>
                                        {{$message->date}}
                                    </td>
                                    <td>
                                        {{--<a href="{{route ('messages.edit',$message->id)}}" class="btn btn-outline btn-circle btn-sm purple">--}}
                                            {{--<i class="fa fa-edit"></i> Edit</a>--}}

                                        {!! Form::open(['route' => ['messages.destroy', $message->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
            {!! $messages->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $messages->currentPage() }} OF{{ $messages->lastPage() }}</strong>
        </div>

    </div>



<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Filter Products</h4>
            </div>
            {!! Form::open(['route' => ['messages.search'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">

                <div class="tab-pane active" id="personal-data">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Sender Name</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sender Mail</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                    <input type="text" name="mail"  value="{{old('mail')}}" id="mail" class="form-control input-circle-right" placeholder="Mail">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sender Phone</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-phone"></i>
                                </span>
                                    <input type="text" name="phone"  value="{{old('phone')}}" id="phone" class="form-control input-circle-right" placeholder="Phone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Message Subject</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                    <input type="text" name="subject"  value="{{old('subject')}}" id="subject" class="form-control input-circle-right" placeholder="Subject">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                    <input type="text" name="message"  value="{{old('message')}}" id="message" class="form-control input-circle-right" placeholder="Message">
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