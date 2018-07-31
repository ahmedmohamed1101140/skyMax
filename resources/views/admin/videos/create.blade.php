@extends('admin.layout')

@section('title', 'E-Learning')

{{-- start css --}}
@section('css')
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/global/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('admin-panel/assets/layouts/layout/css/layout.min.css')}}'" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('admin-panel/assets/layouts/layout/css/custom.min.css')}}'" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->



@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Create Products")


{{-- End Breadcums--}}



@section('content')

    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Create E-Learning
        <small>product</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['videos.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true  ]) !!}
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i>Product Data </div>
                    <div class="actions btn-set">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Save</button>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-bordered">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab"> General </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="Product Name"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Name:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{old('name_ar')}}" name="name_ar" placeholder="Product Arabic Name"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="description" maxlength="1000">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="description_ar" maxlength="1000">{{old('description_ar')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Categories:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <div class="input-group margin-top-10">
                                                <select class="form-control input-medium" name="category">
                                                    <option value=""  selected disabled> Categories</option>
                                                    @foreach($categories  as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sub Category:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <div class="input-group margin-top-10">
                                                <select class="form-control input-medium" name="sub_category">
                                                    <option value=""  selected disabled> Sub Category</option>
                                                    @foreach($sub_categories  as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Amount:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{old('amount')}}" class="form-control" name="amount" placeholder="Amount"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Limit:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{old('limit')}}" class="form-control" name="limit" placeholder="Limit"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Price:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{old('price')}}" class="form-control" name="price" placeholder="Price"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Discount:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{old('discount')}}" class="form-control" name="discount" placeholder="Discount"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Type:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select  class="table-group-action-input form-control input-medium" name="type">
                                                <option value="">Select...</option>
                                                <option value="1">Qualified</option>
                                                <option value="2">Premium</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Status:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select class="table-group-action-input form-control input-medium" name="view">
                                                <option value="">Select...</option>
                                                <option value="1">Published</option>
                                                <option value="0">Not Published</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Commission:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{old('commission')}}" class="form-control" name="commission" placeholder="Commission"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Shipping Phease:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{old('shipping_phease')}}" class="form-control" name="shipping_phease" placeholder="Shipping Phease"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Cash Back:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{old('cash_back')}}" class="form-control" name="cash_back" placeholder="Cash Back"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"  alt="" /> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                            <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select Image</span>
                                                            <span class="fileinput-exists"> Change</span>
                                                            <input type="file" name="image_url"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->

@endsection


{{-- Start javascript --}}
@section('js')
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('admin-panel/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin-panel/assets/global/plugins/plupload/js/plupload.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->




@endsection

{{-- end javascript --}}