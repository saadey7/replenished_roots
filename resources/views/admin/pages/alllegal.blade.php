@extends('admin.layouts.layouts')
@section('title')
All Legal Content
@endsection
@section('content')
<!-- Main Content -->

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Legal Content</h2>
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
                          Add Content
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Content</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form class="submitForm" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-lg-12 col-md-12 p-0 pb-2">
                                        <label for="description" class="form-label">Select Content Title</label>
                                        <select class="form-control show-tick ms select2" data-placeholder="Select" name="title" id="title" required>
                                            <option selected disabled>Select Content Title</option>
                                            <option value="Term & Conditions">Term & Conditions</option>
                                            <option value="About Us">About Us</option>
                                            <option value="Privacy Policy">Privacy Policy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Write Content Here</label>
                                        <textarea name="legalcontent" class="form-control" id="summernote" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary add">Add</button>
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
                                            <th>Content Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $pro)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$pro->contentName}}</td>
                                            <td style="vertical-align: middle; width: 13%;">
                                                <div class="row">
                                                    <div class="col-6" style="padding-right: 0;">
                                                        <a href="editLegal/{{$pro->id}}" class="btn btn-primary align-end"><i class="zmdi zmdi-edit"></i></a>
                                                    </div>
                                                    <div class="col-6" style="padding-left: 0;">
                                                        <button type="button" class="btn btn-danger align-start" data-toggle="modal" data-target="#delete_product{{$pro->id}}">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <!-- Edit Modal -->
                                                        <div class="modal fade" id="delete_product{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="deletelegal" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body text-center">
                                                                        <input type="hidden" name="id" value="{{$pro->id}}">
                                                                        <i class="zmdi zmdi-delete" style="font-size: 50px; color: red;"></i>
                                                                        <p>Are You Sure! You want to delete this Content?</p>
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['picture', 'video', 'link']],
                ['misc', ['codeview']]
            ],
        });
    });
</script>
<script type="text/javascript">
 $(document).ready(function() {
    $('.submitForm').on('submit',function(e){
        e.preventDefault();
        if($('#title').val() == null){
            alert('Please Select Title');
        }else{
            $('.add').attr('disabled','disabled');
            let title = $('#title').val();
            let legalcontent = btoa(unescape(encodeURIComponent($('#summernote').val())));
            $.ajax({
                url: "https://quicsirv.com/admin/legalStore",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    contentName:title,
                    content:legalcontent,
                },
                success:function(response){
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                    // alert(response);
                },
            });   
        }
            
    });
 });
</script>
@endsection