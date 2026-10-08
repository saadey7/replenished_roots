@extends('admin.layouts.layouts')
@section('title')
All Delivery Schedule
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Delivery Schedule</h2>
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
                          Add New Schedule
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Schedule Time For Delivery</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="scheduleStore" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-lg-12 col-md-12 p-0 pb-2">
                                        <label for="description" class="form-label">Select Date:</label>
                                        <input type="date" class="form-control" name="date">
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
                                            <th>Date</th>
                                            <th>Available Times</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$data->date}}</td>
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-primary align-end" data-toggle="modal" data-target="#view_time{{$data->id}}">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="view_time{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Schedule Time For Delivery</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-lg-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>From Time</th>
                                                                                    <th>To Time</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($data->times as $time)
                                                                                <tr>
                                                                                    <td style="vertical-align: middle;">{{$time->from}}</td>
                                                                                    <td style="vertical-align: middle;">{{$time->to}}</td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle; width: 13%;">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-primary align-end" data-toggle="modal" data-target="#edit_time{{$data->id}}">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="edit_time{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Schedule Time For Delivery</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="updateschedule" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="col-lg-12 col-md-12 p-0 pb-2">
                                                                            <label for="description" class="form-label">Select Data:</label>
                                                                            <input type="date" class="form-control" name="date" value="{{$data->date}}">
                                                                            <input type="hidden" name="id" value="{{$data->id}}">
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
                                                    </div>
                                                    <div class="col-6" style="padding-left: 0;">
                                                        <button type="button" class="btn btn-danger align-start" data-toggle="modal" data-target="#delete_time{{$data->id}}">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="delete_time{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="deleteschedule" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body text-center">
                                                                        <input type="hidden" name="id" value="{{$data->id}}">
                                                                        <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>
                                                                        <p>Are You Sure! You want to delete this Schedule?</p>
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
@endsection