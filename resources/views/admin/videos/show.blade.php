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
@section('page_title',"E-Learning Products")


{{-- End Breadcums--}}



@section('content')

    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> {{$product->name}}
        <small>product</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-shopping-cart"></i>Product Data </div>
                    <div class="actions btn-set">
                        {!! Form::open(['route' => ['products.destroy',$product->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$product->id]) !!}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Product</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-bordered">
                        <ul class="nav nav-tabs">
                            <li >
                                <a href="#tab_general" data-toggle="tab"> General </a>
                            </li>
                            <li class="active" >
                                <a href="#tab_images" data-toggle="tab"> Videos
                                <span class="badge badge-success"> {{$product->videos->count()}} </span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane " id="tab_general">
                                {!! Form::open(['route' => ['products.update',$product->id] , 'method' => 'put','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Name:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$product->name}}" name="name" placeholder="Product Name"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Name:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" required value="{{$product->name_ar}}" name="name_ar" placeholder="Product Arabic Name"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="description" maxlength="1000">{{strip_tags($product->details)}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Arabic Description:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="8"  required name="description_ar" maxlength="1000">{{strip_tags($product->details_ar)}}</textarea>
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
                                        <label class="col-md-2 control-label">Amount:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{$product->amount}}" class="form-control" name="amount" placeholder="Amount"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Limit:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{$product->prod_limit}}" class="form-control" name="limit" placeholder="Limit"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Price:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" required value="{{$product->price}}" class="form-control" name="price" placeholder="Price"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Discount:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{$product->discount}}" class="form-control" name="discount" placeholder="Discount"> </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Type:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <select  class="table-group-action-input form-control input-medium" name="type">
                                                <option value="">Select...</option>
                                                <option value="1">Qualified</option>
                                                <option value="0">Premium</option>
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
                                            <input type="number" value="{{$product->commission}}" class="form-control" name="commission" placeholder="Commission"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Shipping Phease:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{$product->shipping_phease}}" class="form-control" name="shipping_phease" placeholder="Shipping Phease"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Cash Back:
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" value="{{$product->cash_back}}" class="form-control" name="cash_back" placeholder="Cash Back"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thumbnail</label>
                                        <div class="col-md-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="{{asset('images/product/'.$product->image)}}" alt="" /> </div>
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
                                    <button type="submit" class="btn blue">Update</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                                {!! Form::close() !!}

                            </div>

                            <div class="tab-pane active" id="tab_images">
                                 <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                    <a href="#large" data-toggle="modal" data-product_id="{{$product->id}}" class="btn btn-primary">
                                        <i class="fa fa-share"></i> Upload Files </a>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light portlet-fit bordered">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class=" icon-layers font-green"></i>
                                                    <span class="caption-subject font-green bold uppercase">Product Videos</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="mt-element-card mt-element-overlay">
                                                    <div class="row">
                                                        @foreach($product->videos as $video)
                                                            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                                                                <div class="mt-card-item">
                                                                    <div class="mt-card-avatar mt-overlay-1">
                                                                        <video width="320" height="240" controls>
                                                                            <source src="{{asset('images/videos/'.$video->name)}}" type="video/mp4">
                                                                            <source src="{{asset('images/videos/'.$video->name)}}" type="video/ogg">
                                                                            Your browser does not support the video tag.
                                                                        </video>

                                                                    </div>
                                                                    <div class="mt-card-content">
                                                                        <h3 class="mt-card-name">{{$video->title}}</h3>
                                                                        <p class="mt-card-desc font-grey-mint">{{$video->description}}</p>
                                                                        <div class="mt-card-social">
                                                                            <ul>
                                                                                {{--<li>--}}
                                                                                    {{--<a href="javascript:;">--}}
                                                                                        {{--<i class="fa fa-edit"></i>--}}
                                                                                    {{--</a>--}}
                                                                                {{--</li>--}}

                                                                                <li>
                                                                                    {!! Form::open(['route' => ['videos.destroy',$video->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$video->id]) !!}
                                                                                    <a href="javascript:{}" onclick='document.getElementById("Form{{$video->id}}" ).submit();' title="delete"><i class="fa fa-trash"></i></a>
                                                                                    {!! Form::close() !!}
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END CONTENT BODY -->



<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Video</h4>
                </div>
                {!! Form::open(['route' => ['videos.update',$product->id] , 'method' => 'put','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="text" name="title" required value="{{old('title')}}" id="title" class="form-control input-circle-right" placeholder="Title"></div>
                                </div>

                                <div class="form-group">
                                    <label>Arabic Title</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                        <input type="text" name="title_ar" required value="{{old('title_ar')}}" id="title_ar" class="form-control input-circle-right" placeholder="Arabic Title"></div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <span class="required"> * </span>
                                    <div class="input-group">
                                    <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-align-justify"></i>
                                    </span>
                                    <input type="text" name="description" required value="{{old('description')}}" id="discription" class="form-control input-circle-right" placeholder="Description"></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Video</label>
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

                                <div class="form-group">
                                    <label>Status:</label>
                                    <div class="input-group margin-top-10">
                                        <select required class="form-control input-medium" name="view">
                                            <option value="">Select...</option>
                                            <option value="1">Published</option>
                                            <option value="0">Not Published</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn green">Add</button>
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


    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('admin-panel/assets/pages/scripts/ecommerce-products-edit.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection

{{-- end javascript --}}