@extends('admin.layouts.layouts')
@section('title')
All Stores
@endsection
<link type="text/css" rel="stylesheet" href="{{asset('public/imageUploader/image-uploader.min.css')}}">
<style>
    .iui-cloud-upload{
        display: none !important;
    }
    .iui-close:before{
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
                    <h2>Stores</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-primary align-end" data-toggle="modal" data-target="#add_store">
                          Add Store
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_store" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Store</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="addStore" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputName1">Store Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name" >
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputImage1">Select Store Logo</label>
                                    <input type="file" class="dropify" name="logo">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Store Address</label>
                                    <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                @foreach($datas as $pro)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body product_item">
                            @if($pro->logo == null)
                                <img src="{{asset('public/images/logo.png')}}" alt="Product" class="img-fluid cp_img" style="height: 100px; object-fit: contain;">
                            @else
                                <img src="{{$pro->logo}}" alt="Product" class="img-fluid cp_img" style="height: 100px; object-fit: contain;">
                            @endif
                            <div class="product_details">
                                <a>{{$pro->name}}</a>
                                <p>{{$pro->address}}</p>                                
                            </div>
                            <div class="action text-center">
                                <button class="btn btn-primary waves-effect" data-toggle="modal" data-target="#edit_store{{$pro->id}}"><i class="zmdi zmdi-edit"></i></button>
                                <button class="btn btn-danger waves-effect" data-toggle="modal" data-target="#delete_store{{$pro->id}}"><i class="zmdi zmdi-delete"></i></button>
                            </div>
                        </div>
                    </div>                
                </div>
                <!-- Edit Modal -->
                <div class="modal fade" id="edit_store{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Store</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="updateStore" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputName1">Store Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$pro->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputImage1">Select Store Logo</label>
                                    <input type="file" class="dropify" name="logo" value="{{$pro->logo}}" data-default-file="{{$pro->logo}}">
                                    <input type="hidden" name="id" value="{{$pro->id}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Store Address</label>
                                    <textarea name="address" class="form-control" cols="30" rows="5">{{$pro->address}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal -->
                <div class="modal fade" id="delete_store{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Store</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="deleteStore" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body text-center">
                                <input type="hidden" name="id" value="{{$pro->id}}">
                                <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>
                                <p>Are You Sure! You want to delete this store?</p>
                                <p>If you delete this store then the products of this store will also be deleted.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('admin.pages.toastr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{asset('public/js/pages/forms/dropify.js')}}"></script>
@endsection