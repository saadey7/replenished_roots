@extends('admin.layouts.layouts')
@section('title')
All Cities
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Delivery Fees</h2>
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
                          Add Delivery Fees
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delivery Fees</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="deliveryFeesStore" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                  <div class="col-lg-12 col-md-12 p-0 pb-2">
                                    <label for="description" class="form-label">Select Delivery Services</label>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select" name="name" id="category_id" required>
                                        <option selected disabled>Select Delivery Services</option>
                                        <option value="Cost of Logistics">Cost of Logistics</option>
                                        <option value="Fuel Cost">Fuel Cost</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Enter Price</label>
                                    <input type="text" class="form-control product-price" id="exampleInputName1" name="price">
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
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$data->name}}</td>
                                            <td style="vertical-align: middle;">{{$data->price}}</td>
                                            <td style="vertical-align: middle;">
                                                <div class="row">
                                                    <div class="col-6" style="padding-left: 0; text-align: center;">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$data->id}}">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Delivery Fees</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="deliveryFeesStore" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body text-left">
                                                                            <div class="col-lg-12 col-md-12 p-0 mb-3">
                                                                                <label for="description" class="form-label">Select Province</label>
                                                                                <select class="form-control show-tick ms select2" data-placeholder="Select" name="name" id="category_id" required>
                                                                                    <option selected disabled>{{$data->name}}</option>
                                                                                    <option value="Cost of Logistics">Cost of Logistics</option>
                                                                                    <option value="Fuel Cost">Fuel Cost</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputName1">Enter Price</label>
                                                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                                                <input type="text" class="form-control product-price" id="exampleInputName1" name="price" value="{{$data->price}}">
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
@endsection