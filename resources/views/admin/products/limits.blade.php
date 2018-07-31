@extends('admin.layout')

@section('title', 'Products')

{{-- start css --}}
@section('css')

@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Products")


{{-- End Breadcums--}}



@section('content')
    <h4 class="page-title">Products</h4>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bell-o"></i>Products Data </div>

                    <div class="tools">
                        <a href="{{route('products.create')}}">
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
                                <th>Amount</th>
                                <th>Publish date</th>
                                <th>type</th>
                                <th>view</th>
                                <th>commission</th>
                                <th><i class="fa fa-edit"></i> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($limited_products as $product)
                                <tr>
                                    <td class="highlight">
                                        <a href="{{route('products.show',$product->id)}}"> {{$product->id}} </a>
                                    </td>
                                    <td >
                                        <a href="{{route('products.show',$product->id)}}"> {{$product->name}} </a>
                                    </td>
                                    <td>
                                        {{strip_tags( substr($product->details,0,120))}}
                                    </td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->shipping_phease}}</td>
                                    <td>{{$product->amount}}</td>
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
                                        <a href="{{route('products.show',$product->id)}}" $product="edit"><i class="fa fa-edit"></i></a>
                                        {!! Form::open(['route' => ['products.destroy',$product->id] , 'method' => 'delete','style'=>'display: inline','id'=>'Form'.$product->id]) !!}
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


    </div>
@endsection


{{-- Start javascript --}}
@section('js')

@endsection

{{-- end javascript --}}