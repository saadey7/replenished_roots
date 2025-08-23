@extends('admin.layouts.layouts')
@section('title')
All Province
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
                    <h2>Provinces</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-primary align-end" data-toggle="modal" data-target="#add_product">
                          Add Province
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Province</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="provinceStore" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="form-group">
                                    <label for="exampleInputName1">Enter Province Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="province" >
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Province Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            <td>{{$data->province}}</td>
                                            <td style="vertical-align: middle;">
                                                <div class="row">
                                                    <div class="col-6" style="padding-left: 0; text-align: end;">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_pro{{$data->id}}">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="edit_pro{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Province</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="updateProvince" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body text-left">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                                            <label for="exampleInputName1">Enter Province Name</label>
                                                                            <input type="text" class="form-control" id="exampleInputName1" name="province" value="{{$data->province}}">
                                                                         </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6" style="padding-left: 0;">
                                                        <button type="button" class="btn btn-danger align-start" data-toggle="modal" data-target="#delete_pro{{$data->id}}">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="delete_pro{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Province</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="deleteProvince" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body text-center">
                                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                                        <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>
                                                                        <p>Are You Sure! You want to delete this Provice?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
</section>
@include('admin.pages.toastr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('public/imageUploader/image-uploader.min.js')}}"></script>
<script>
    
    $('.input-images').imageUploader();
    // $("#images-1681719994645").on("change", function() {
    //     $(".iui-close").addClass("zmdi zmdi-close");
    // });
   
    $('.input-images2').imageUploader();
    

</script>
@endsection