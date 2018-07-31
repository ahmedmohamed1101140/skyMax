@extends('admin.layout')

@section('title', 'E-Learning')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"E-Learning Videos")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">E-Learning Products</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Products Data </div>

                    <div class="tools">
                        <a href="#large" data-toggle="modal">
                            <button type="button" class="btn btn-primary">Filter product</button>
                        </a>
                        <a href="{{route('videos.create')}}">
                            <button type="button" class="btn btn-primary">Create New product</button>
                        </a>
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
                                <th>ID</th>
                                <th class="hidden-xs">Name</th>
                                <th>details</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Shipping Phease</th>
                                <th>#Videos</th>
                                <th>Publish date</th>
                                <th>type</th>
                                <th>view</th>
                                <th>commission</th>
                                <th><i class="fa fa-edit"></i> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="highlight">
                                        <a href="{{route('videos.show',$product->id)}}"> {{$product->id}} </a>
                                    </td>
                                    <td >
                                        <a href="{{route('videos.show',$product->id)}}"> {{$product->name}} </a>
                                    </td>
                                    <td>
                                        {{strip_tags( substr($product->details,0,120))}}
                                    </td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->shipping_phease}}</td>
                                    <td>{{$product->videos->count()}}</td>
                                    <td>{{$product->date}}</td>
                                    <td>
                                        @if($product->type == 1)
                                            <span class="label label-success label-sm"> Qualified </span>
                                        @elseif($product->type == 2)
                                            <span class="label label-danger label-sm"> Premium </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="label label-sm label-{{$product->view == 0 ? 'danger' : 'success'}}"> {{$product->view == 1 ? 'Display' : 'Hidden'}} </span>
                                    </td>
                                    <td>
                                        {{$product->commission}}
                                    </td>
                                    <td class="text-center vcenter">
                                        <a href="{{route('videos.show',$product->id)}}" $product="edit"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['route' => ['videos.destroy',$product->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$product->id]) !!}
                                        <a href="javascript:{}" onclick='document.getElementById("Form{{$product->id}}" ).submit();' title="delete"><i class="fa fa-trash"></i></a>
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
        {{--<div class="text-center">--}}
            {{--{!! $products->links() !!}--}}
        {{--</div>--}}
        {{--<div class="text-center">--}}
            {{--<strong>Page : {{ $products->currentPage() }} OF{{ $products->lastPage() }}</strong>--}}
        {{--</div>--}}

    </div>

<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Filter Products</h4>
            </div>
            {!! Form::open(['route' => ['videos.search'] , 'method' => 'post','class'=>'form-horizontal form-row-seperated','files'=>true]) !!}
            <div class="tab-content">

                <div class="tab-pane active" id="personal-data">
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Product Name</label>
                                <span class="required"> * </span>
                                <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-align-justify"></i>
                                </span>
                                    <input type="text" name="name"  value="{{old('name')}}" id="name" class="form-control input-circle-right" placeholder="Name">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <span class="required"> * </span>
                                        <div class="input-group margin-top-10">
                                            <select  class="form-control input-medium" name="view">
                                                <option value="">Select...</option>
                                                <option value="1">Published</option>
                                                <option value="0">Not Published</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category:</label>
                                        <span class="required"> * </span>
                                        <div class="input-group margin-top-10">
                                            <select  class="form-control input-medium" name="category">
                                                <option value="">Select...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('price_from')}}"  class="form-control" name="price_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('price_to')}}"  name="price_to"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Discount Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('discount_from')}}"  class="form-control" name="discount_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('discount_to')}}" name="discount_to"> </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('amount_from')}}"  class="form-control" name="amount_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('amount_to')}}"  name="amount_to"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Products Limits Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('limits_from')}}"  class="form-control" name="limits_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('limits_to')}}"  name="limits_to"> </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Commission Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('commission_from')}}"  class="form-control" name="commission_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('to')}}"  name="commission_to">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shipping Phease Range</label>
                                        <span class="required"> * </span>
                                        <div class="input-group input-large " >
                                            <input type="text" value="{{old('shipping_from')}}"  class="form-control" name="shipping_from">
                                            <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" value="{{old('shipping_to')}}" name="shipping_to"> </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>

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