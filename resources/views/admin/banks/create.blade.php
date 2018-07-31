@extends('admin.layout')

@section('title', 'Bank')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Bank")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Bank Transfers</h4>

    <div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Send New Transfer</span>
                </div>
            </div>
            <div class="portlet-body form">
                {{Form::open(['route' => ['banks.store'] , 'method' => 'post','files'=>true]) }}
                    <div class="form-body">
                        Select Users <small>use users code</small>
                        <div class="form-group">
                            <select multiple data-role="tagsinput" name="clients[]">
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>E-pin</label>
                                    <div class="input-group">
                                        <input type="number" name="pin" value="0" id="pin" class="form-control" placeholder="E-Pin"> <br><br></div>

                                    <div class="form-group">
                                        <label>Options</label>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" value="1" name="epin" id="epin" checked> Credit
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" value="2" name="epin" id="epinx" > Debit
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>E-Money</label>
                                    <div class="input-group">
                                        <input type="number" name="money" value="0"  id="money" class="form-control " placeholder="E-Money"> <br><br></div>
                                    <div class="form-group">
                                        <label>Options</label>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" value="1" name="emoney" id="emoney" checked> Credit
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio"value="2" name="emoney" id="emoney"> Debit
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Send</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
@endsection


{{-- Start javascript --}}
@section('js')

     !-- BEGIN PAGE LEVEL PLUGINS -->
     <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
     <script src="{{asset('admin-panel/assets/global/plugins/typeahead/handlebars.min.js')}}'" type="text/javascript"></script>
     <script src="{{asset('admin-panel/assets/global/plugins/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>
     <!-- END PAGE LEVEL PLUGINS -->

     <!-- BEGIN PAGE LEVEL SCRIPTS -->
     <script src="{{asset('admin-panel/assets/pages/scripts/components-bootstrap-tagsinput.min.js')}}'" type="text/javascript"></script>
     <!-- END PAGE LEVEL SCRIPTS -->
@endsection

{{-- end javascript --}}