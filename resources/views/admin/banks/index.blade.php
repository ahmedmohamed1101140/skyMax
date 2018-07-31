@extends('admin.layout')

@section('title', 'Bank')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Bank")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Bank Transfers</h4>

    <div class="portlet-body">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> E-Money Transfers Table</span>
                    </div>
                    <div class="tools">
                        <a data-toggle="modal" href="#large">
                            <button type="button" class="btn btn-primary">Filter</button>
                        </a>
                        <a href="{{route('banks.create')}}">
                            <button type="button" class="btn btn-primary">Create New Transfer</button>
                        </a>
                    </div>

                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> Date </th>
                            <th> Sender UserName </th>
                            <th> Receiver UserName </th>
                            <th> Type </th>
                            <th> Transfer Type </th>
                            <th> Method </th>
                            <th> Value </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($e_moneys as $e_money)
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="{{$e_money->id}}" />
                                        <span></span>
                                    </label>
                                </td>
                                <td>{{$e_money->date}}</td>
                                @if($e_money->client_sender  == 0 || $e_money->client_sender == -1 )
                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                @elseif($e_money->sender == null)
                                    <td> <span class="label label-sm label-danger"> Undefined User </span> </td>
                                @else
                                    <td>
                                    <a href="{{route('clients.show',$e_money->sender->id)}}"> {{$e_money->sender->username}}</a>
                                    </td>
                                @endif
                                @if($e_money->customer_id  == 0 || $e_money->customer_id == -1 )
                                    <td> <span class="label label-sm label-success"> ADMIN </span> </td>
                                @elseif($e_money->receiver == null)
                                    <td> <span class="label label-sm label-danger"> Undefined User </span> </td>
                                @else
                                    <td>
                                        <a href="{{route('clients.show',$e_money->receiver->id)}}"> {{$e_money->receiver->username}}</a>
                                    </td>
                                @endif
                                <td>
                                    <span class="label label-sm label-success"> E-Money </span>
                                </td>
                                <td class="center"> {{$e_money->comtiontype}} </td>
                                <td class="center"> {{$e_money->type}} </td>
                                <td class="center"> {{$e_money->cash_money}} </td>
                                <td>
                                    {!! Form::open(['route' => ['banks.destroy', $e_money->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
            <!-- END EXAMPLE TABLE PORTLET-->
            <div class="text-center">
                {!! $e_moneys->links() !!}
            </div>
            <div class="text-center">
                <strong>Page : {{ $e_moneys->currentPage() }} OF{{ $e_moneys->lastPage() }}</strong>
            </div>
    </div>

    <!-- /.modal -->
    <div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Filter Clients</h4>
                </div>
                {!! Form::open(['route' => ['banks.search'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sender User Name</label>
                                            <span class="required"> * </span>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                <input type="text" name="sender"  value="{{old('sender')}}" id="sender" class="form-control input-circle-right" placeholder="Sender User Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Receiver User Name</label>
                                            <span class="required"> * </span>
                                            <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                <input type="text" name="receiver"  value="{{old('receiver')}}" id="receiver" class="form-control input-circle-right" placeholder="Receiver User Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>View:</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="view">
                                                    <option value="">Select...</option>
                                                    <option value="1">Displayed</option>
                                                    <option value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Transfer Status</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="status">
                                                    <option value="">Select...</option>
                                                    <option value="0">Get</option>
                                                    <option value="1">Post</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Transfer Type</label>
                                            <span class="required"> * </span>
                                            <div class="input-group margin-top-10">
                                                <select  class="form-control input-medium" name="type">
                                                    <option value="">Select...</option>
                                                    <option value="1">Admin Transfer</option>
                                                    <option value="2">User Transfer</option>
                                                    <option value="3">Direct Commission</option>
                                                    <option value="4">Buying Products</option>
                                                    <option value="5">Binary Income</option>
                                                    <option value="6">Cash Back</option>
                                                    <option value="7">Product Commission</option>

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
                                                <input type="number" value="{{old('amount_from')}}"  class="form-control" name="amount_from">
                                                <span class="input-group-addon"> to </span>
                                                <input type="number" class="form-control" value="{{old('amount_to')}}"  name="amount_to">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
    <!-- /.modal -->
@endsection


{{-- Start javascript --}}
@section('js')
    <script src="{{asset('admin-panel/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>

@endsection

{{-- end javascript --}}