@extends('admin.layouts.layouts')
@section('title')
All Users
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Users</h2>
                    <!-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">HOm</li>
                    </ul> -->
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
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
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Address</th>
                                            <!--<th>Lastseen</th>-->
                                            <!--<th>Status</th>-->
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $user)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                @if($user->image == null)
                                                    <img src="{{asset('public/images/user.png')}}" alt="" width="50" height="auto">
                                                @else
                                                    <img src="{{$user->image}}" alt="" width="70" height="auto">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">{{$user->firstname}} {{$user->lastname}}</td>
                                            <td style="vertical-align: middle;"><a href="mailto:{{$user->email}}" style="color:black;"><strong>{{$user->email}}</strong></a></td>
                                            <td style="vertical-align: middle;">{{$user->phone_no}}</td>
                                            @if($user->address == null && $user->city == null && $user->province == null)
                                            <td style="vertical-align: middle;">Null</td>
                                            @else
                                            <td style="vertical-align: middle;">
                                                @if($user->address == null)
                                                    {{$user->city}}, {{$user->province}}
                                                @elseif($user->city == null)
                                                    {{$user->address}}, {{$user->province}}
                                                @elseif($user->province == null)
                                                    {{$user->address}}, {{$user->city}}
                                                @else 
                                                    {{$user->address}}, {{$user->city}}, {{$user->province}} 
                                                @endif
                                            </td>
                                            @endif
                                            <td style="vertical-align: middle;">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user{{$user->id}}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="delete_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="deleteUser" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body text-center">
                                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                                <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>
                                                                <p>Are You Sure! You want to delete this user?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
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