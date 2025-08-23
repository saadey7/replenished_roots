@extends('admin.layouts.layouts')
@section('title')
All Products
@endsection
<link type="text/css" rel="stylesheet" href="{{asset('public/imageUploader/image-uploader.min.css')}}">
<style>
.iui-cloud-upload {
    display: none !important;
}

.iui-close:before {
    content: \f654 !important;
}
</style>
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Products</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 text-right">
                    <a href="{{url('admin/add-product')}}" class="btn btn-primary">
                        Add Product
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <!--Product Show in Cards-->
                <!--@foreach($data as $pro)-->
                <!--<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">-->
                <!--    <div class="card">-->
                <!--        <div class="body product_item">-->
                <!-- @if(isset($pro->images[0]) && $pro->images[0]->image != null)
    <img src="{{ $pro->images[0]->image }}" alt="Product" class="img-fluid cp_img">
@else
    <img src="{{ asset('public/images/logo.png') }}" alt="Product" class="img-fluid cp_img">
@endif -->
                <!--            <div class="product_details">-->
                <!--                <h5 style="font-size: 16px; color: #000; height: 43px; overflow: hidden;" title="{{$pro->name}}">{{$pro->name}}</h5>-->
                <!--                <ul class="product_price list-unstyled">-->
                <!--                    <li class="old_price" title="Store Name" style="align-self: center;"><h6 style="margin-bottom: 0px;">{{$pro->type}}</h6></li>-->
                <!--                    <li class="new_price">${{$pro->price}}</li>-->
                <!--                </ul>      -->
                <!--<p style=>{{$pro->description}}</p>                                -->
                <!--            </div>-->
                <!--            <div class="action text-center">-->
                <!--                <a href="editPro/{{$pro->id}}" class="btn btn-primary waves-effect"><i class="zmdi zmdi-edit"></i></a>-->
                <!--                <button class="btn btn-danger waves-effect" data-toggle="modal" data-target="#delete_product{{$pro->id}}"><i class="zmdi zmdi-delete"></i></button>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>                -->
                <!--</div>-->
                <!-- Delete Modal -->
                <!--<div class="modal fade" id="delete_product{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                <!--    <div class="modal-dialog" role="document">-->
                <!--        <div class="modal-content">-->
                <!--        <div class="modal-header">-->
                <!--            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>-->
                <!--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--            <span aria-hidden="true">&times;</span>-->
                <!--            </button>-->
                <!--        </div>-->
                <!--        <form action="delete" method="POST" enctype="multipart/form-data">-->
                <!--            @csrf-->
                <!--            <div class="modal-body text-center">-->
                <!--                <input type="hidden" name="id" value="{{$pro->id}}">-->
                <!--                <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>-->
                <!--                <p>Are You Sure! You want to delete this product?</p>-->
                <!--            </div>-->
                <!--            <div class="modal-footer">-->
                <!--                <button type="submit" class="btn btn-danger">Delete</button>-->
                <!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                <!--            </div>-->
                <!--        </form>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--@endforeach-->

                <!--Product Show in Table-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Expire Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $pro)
                                        <tr>
                                            <td>
                                                @if(isset($pro->images[0]) && $pro->images[0]->image != null)
                                                <img src="{{$pro->images[0]->image}}" alt="" width="70" height="auto">
                                                @else
                                                <img src="{{asset('public/images/logo.png')}}" alt="" width="50"
                                                    height="auto">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{$pro->name}}</td>
                                            <td style="vertical-align: middle;">{{$pro->type}}</td>
                                            <td style="vertical-align: middle;">{{$pro->price}}</a></td>
                                            <td style="vertical-align: middle;">
                                                {{$pro->expire_date}}</td>
                                            <td style="vertical-align: middle;">
                                                <div class="row m-0">
                                                    <a href="edit-product/{{$pro->id}}"
                                                        class="btn btn-primary align-end"><i
                                                            class="zmdi zmdi-edit"></i></a>
                                                    <a href="view-product/{{$pro->id}}"
                                                        class="btn btn-info align-end"><i class="zmdi zmdi-eye"></i></a>

                                                    <button type="button" class="btn btn-danger align-start"
                                                        data-toggle="modal" data-target="#delete_product{{$pro->id}}">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>

                                                </div>
                                            </td>
                                        </tr>
                                        <!--Delete Modal -->
                                        <div class="modal fade" id="delete_product{{$pro->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Delete Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="delete" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body text-center">
                                                            <input type="hidden" name="id" value="{{$pro->id}}">
                                                            <i class="zmdi zmdi-delete"
                                                                style="font-size: 50px; color: red;"></i>
                                                            <p>Are You Sure! You want to delete this
                                                                product?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
</section>
@include('admin.pages.toastr')
@endsection