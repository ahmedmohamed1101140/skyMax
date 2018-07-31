@extends('admin.layout')

@section('title', 'Products')

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
@section('page_title',"Products")


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
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-bordered">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_general" data-toggle="tab"> General </a>
                                </li>
                                <li>
                                    <a href="#tab_images" data-toggle="tab"> Images
                                        <span class="badge badge-success"> {{$product->images->count()}} </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab_orders" data-toggle="tab"> Orders
                                        <span class="badge badge-success"> {{$orders->count()}} </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_general">
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
                                            <button type="submit" class="btn blue">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    {!! Form::close() !!}

                                </div>

                                <div class="tab-pane" id="tab_images">
                                    <div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
                                        <a href="#large" data-toggle="modal" data-product_id="{{$product->id}}" class="btn btn-primary">
                                            <i class="fa fa-share"></i> Upload New Image </a>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="portlet light portlet-fit bordered">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class=" icon-layers font-green"></i>
                                                        <span class="caption-subject font-green bold uppercase">Product Images</span>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="mt-element-card mt-element-overlay">
                                                        <div class="row">
                                                            @foreach($product->images as $image)
                                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                                    <div class="mt-card-item">
                                                                        <div class="mt-card-avatar mt-overlay-1">
                                                                            <img src="{{asset('images/product/'.$image->image)}}">
                                                                            <div class="mt-overlay">
                                                                                <ul class="mt-info">
                                                                                    <li>
                                                                                        <a href="{{asset('images/product/'.$image->image)}}" class="btn default btn-outline" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                                                            <i class="icon-magnifier"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        {!! Form::open(['route' => ['albums.destroy', $image->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
                                                                                        <button class="btn default btn-outline">
                                                                                            <i class="icon-trash"></i> </button>
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

                                <div class="tab-pane" id="tab_orders">
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th>
                                                    Order Number
                                                </th>
                                                <th class="hidden-xs">
                                                    <i class="fa fa-user"></i> Customer Name
                                                </th>
                                                <th>
                                                    <i class="fa fa-phone"></i> Customer Phone
                                                </th>
                                                <th>
                                                    <i class="fa fa-map-marker"></i> Customer Address
                                                </th>
                                                <th>
                                                    <i class="fa fa-mail-forward"></i> Customer Mail
                                                </th>
                                                <th>
                                                    <i class="fa fa-user"></i>Visit client profile
                                                </th>
                                                <th>
                                                    <i class="fa fa-item"></i> Product Name
                                                </th>
                                                <th>
                                                    <i class="fa fa-toggle-on"></i> Product Type
                                                </th>
                                                <th>
                                                    <i class="fa fa-sort-amount-asc"></i> Order Amount
                                                </th>
                                                <th>
                                                    <i class="fa fa-times"></i> Order Date
                                                </th>
                                                <th>
                                                    <i class="fa fa-toggle-on"></i> Order view
                                                </th>
                                                <th>
                                                    <i class="fa fa-edit"></i> Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td class="highlight">
                                                        <a href="{{route('baskets.show',$order->id)}}"> ORDER {{$order->id}} </a>
                                                    </td>
                                                    <td >
                                                        {{$order->name}}
                                                    </td>
                                                    <td>
                                                        {{$order->phone}}
                                                    </td>
                                                    <td>
                                                        {{$order->address}}
                                                    </td>
                                                    <td>
                                                        {{$order->mail}}
                                                    </td>
                                                    <td>
                                                        <a href="{{route('clients.show',$order->client_id)}}"> {{$order->client->fname}} {{$order->client->sname}} {{$order->client->lname}}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('products.show',$order->prod_id)}}">{{$order->product->name}}</a>
                                                    </td>
                                                    <td>
                                                        @if($order->type == 1)
                                                            <span class="label label-success label-sm"> Qualified </span>
                                                        @elseif($order->type == 0)
                                                            <span class="label label-danger label-sm"> Premium </span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{$order->amount}}
                                                    </td>
                                                    <td>
                                                        {{$order->date}}
                                                    </td>
                                                    <td>
                                                        @if($order->view== 1)
                                                            <span class="label label-success label-sm"> Display </span>
                                                        @elseif($order->view == 0)
                                                            <span class="label label-danger label-sm"> Hide </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route ('baskets.edit',$order->id)}}" class="btn btn-outline btn-circle btn-sm purple">
                                                            <i class="fa fa-edit"></i> Edit</a>

                                                        {!! Form::open(['route' => ['baskets.destroy', $order->id ], 'method' => 'DELETE', 'style'=>'display: inline;']) !!}
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
                    <h4 class="modal-title">Add New Image</h4>
                </div>
                {!! Form::open(['route' => ['albums.store'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
                <div class="tab-content">

                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="tab-pane active" id="personal-data">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
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