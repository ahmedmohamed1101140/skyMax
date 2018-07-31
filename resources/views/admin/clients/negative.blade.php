@extends('admin.layout')

@section('title', 'Negative Accounts')

{{-- start css --}}
@section('css')
    {{--<link href="{{asset('admin-panel/'.LaravelLocalization::getCurrentLocale().'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />--}}
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <style>
        table > tbody > tr > td{
            vertical-align: middle !important;
        }
    </style>

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Negative Accounts")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Negative Accounts</h4>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Client Date</span>
                    </div>
                    <div class="tools">

                        <a data-toggle="modal" href="#large">
                            <button type="button" class="btn btn-primary">Filter</button>
                        </a>
                        {{--<a href="{{route('clients.create')}}">--}}
                            {{--<button type="button" class="btn btn-primary">Create New Client</button>--}}
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
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" />
                                        <span></span>
                                    </label>
                                </th>
                                <th>#</th>
                                <th class="hidden-xs">
                                    <i class="fa fa-user"></i> Name
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-briefcase"></i> Email
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-phone"></i> Phone
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-wallet"></i> E-Pin
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-wallet"></i> E-money
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-map-marker"></i> City
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th class="text-center">
                                    <i class="fa fa-edit"></i> Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" name="checkbox[]" class="checkboxes sub_chk" value="{{$client->id}}" data-id="{{$client->id}}" />
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{$client->id}}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('clients.show',$client->id)}}"> {{$client->fname}} {{$client->sname}} {{$client->lname}}  </a>
                                    </td>
                                    <td class="text-center">
                                        {{$client->mail}}
                                    </td>
                                    <td class="text-center">
                                        {{$client->phone}}
                                    </td>
                                    <td class="text-center">
                                        {{$client->epin}}
                                    </td>
                                    <td class="text-center">
                                        {{$client->emoney}}
                                    </td>
                                    <td class="text-center">
                                        {{$client->city}}
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-sm label-{{$client->activation == 0 ? 'danger' : 'success'}}"> {{$client->activation == 0 ? 'inactive' : 'active'}} </span>
                                    </td>
                                    <td class="text-center vcenter">
                                        <a href="{{route('clients.show',$client->id)}}" $client="edit"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['route' => ['clients.destroy',$client->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$client->id]) !!}
                                        <a href="javascript:{}" onclick='document.getElementById("Form{{$client->id}}" ).submit();' title="delete"><i class="fa fa-trash"></i></a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
        <div class="text-center">
            {!! $clients->links() !!}
        </div>
        <div class="text-center">
            <strong>Page : {{ $clients->currentPage() }} OF{{ $clients->lastPage() }}</strong>
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
                <div class="modal-body">
                    {!! Form::open(['route' => ['clients.search_negative'] , 'method' => 'post' ]) !!}
                    <div class="tab-content">

                        <div class="tab-pane active" id="personal-data">
                            <div class="portlet-body form">
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                    <input type="text" name="fname"  value="{{old('fname')}}" id="fname" class="form-control input-circle-right" placeholder="First Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Second Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                    <input type="text" name="sname"  value="{{old('sname')}}" id="sname" class="form-control input-circle-right" placeholder="Second Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Last Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                    <input type="text" name="lname"  value="{{old('lname')}}" id="lname" class="form-control input-circle-right" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client User Name</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                                    <input type="text" name="username"  value="{{old('username')}}" id="username" class="form-control input-circle-right" placeholder="User Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client User Code</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                    <input type="text" name="usercode"  value="{{old('usercode')}}" id="usercode" class="form-control input-circle-right" placeholder="User Code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Nation ID</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                                    <input type="number" name="nation_id"  value="{{old('nation_id')}}" id="nation_id" class="form-control input-circle-right" placeholder="Nation ID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Phone</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-mobile-phone"></i>
                                        </span>
                                                    <input type="number" name="phone"  value="{{old('phone')}}" id="phone" class="form-control input-circle-right" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Address</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-location-arrow"></i>
                                        </span>
                                                    <input type="text" name="address"  value="{{old('address')}}" id="address" class="form-control input-circle-right" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Mail</label>
                                                <span class="required"> * </span>
                                                <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                            <i class="fa fa-mail-forward"></i>
                                        </span>
                                                    <input type="email" name="mail"  value="{{old('mail')}}" id="mail" class="form-control input-circle-right" placeholder="Mail">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Activation:</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="activation">
                                                        <option value="">Select...</option>
                                                        <option value="1">Active Clients</option>
                                                        <option value="0">Not Active Clients</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client Position</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="position">
                                                        <option value="">Select...</option>
                                                        <option value="0">Right</option>
                                                        <option value="1"> Left</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Client View</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="view">
                                                        <option value="">Select...</option>
                                                        <option value="1">Displayed Users</option>
                                                        <option value="0"> Hidden Users</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Money Bank:</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="bank">
                                                        <option value="">Select...</option>
                                                        <option value="1">Top E-Money</option>
                                                        <option value="2">Top E-pin</option>
                                                        <option value="3">Less E-Money</option>
                                                        <option value="4">Less E-pin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Registration Date</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="date">
                                                        <option value="">Select...</option>
                                                        <option value="1">Newest Client</option>
                                                        <option value="2">Oldest Users</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Re-Activation Date</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="renew_Date">
                                                        <option value="">Select...</option>
                                                        <option value="1">Near Re-Activation</option>
                                                        <option value="2">Far Re-Activation</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User Type</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="type">
                                                        <option value="">Select...</option>
                                                        <option value="0">Pending</option>
                                                        <option value="1">Qualified</option>
                                                        <option value="2">Blocked</option>
                                                        <option value="3">Freeze</option>
                                                        <option value="4">Terminated</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Parent Type</label>
                                                <span class="required"> * </span>
                                                <div class="input-group margin-top-10">
                                                    <select  class="form-control input-medium" name="parent">
                                                        <option value="">Select...</option>
                                                        <option value="1">Admin Parent</option>
                                                        <option value="2">User Parent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-Money Range</label>
                                                <span class="required"> * </span>
                                                <div class="input-group input-large " >
                                                    <input type="number" value="{{old('money_from')}}"  class="form-control" name="money_from">
                                                    <span class="input-group-addon"> to </span>
                                                    <input type="number" class="form-control" value="{{old('money_to')}}"  name="money_to">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-Pin Range</label>
                                                <span class="required"> * </span>
                                                <div class="input-group input-large " >
                                                    <input type="number" value="{{old('pin_from')}}"  class="form-control" name="pin_from">
                                                    <span class="input-group-addon"> to </span>
                                                    <input type="number" class="form-control" value="{{old('pin_to')}}"  name="pin_to">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>



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
    <!-- /.modal -->
@endsection


{{-- Start javascript --}}
@section('js')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>--}}
    <script src="{{asset('admin-panel/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/ui-modals.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->



    <script type="text/javascript">

        $(document).ready(function () {

            $('.group-checkable').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });

            /////


            $('.delete_all').on('click', function(e) {

                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {

                    var check = confirm("Are you sure you want to delete those rows?");
                    if(check == true){
                        var join_selected_values = allVals.join(",");
//                        console.log(join_selected_values);
                        $('#items').val(join_selected_values);
                        $('#form-delete').submit();
                    }
                }
            });
///////////////////////////////////////////
        });

    </script>


@endsection

{{-- end javascript --}}