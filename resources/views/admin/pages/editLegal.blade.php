@extends('admin.layouts.layouts')
@section('title')
Edit Product
@endsection
@section('content')
<!-- Main Content -->
<style>
    .dropdown-toggle:after{
        display: none !important;
    }
</style>

<section class="content">
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit {{$data->contentName}} Content</h2>
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
                            <form class="SubmitForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Write Content Here</label>
                                    <input type="hidden" name="id" id="dataID" value="{{$data->id}}">
                                    <textarea name="legalcontent" class="form-control" id="summernote" cols="30" rows="10">{{$data->content}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary update">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
@include('admin.pages.toastr')
<script type="text/javascript">
 $(document).ready(function() {
    $('.SubmitForm').on('submit',function(e){
        e.preventDefault();
        $('.update').attr('disabled','disabled');
        let id = $('#dataID').val();
        let title = $('#title').val();
        let legalcontent = btoa(unescape(encodeURIComponent($('#summernote').val())));
        $.ajax({
            url: "https://quicsirv.com/admin/updateLegal",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
                contentName:title,
                content:legalcontent,
            },
            success:function(response){
                location.reload();
            },
            error: function(response) {
                console.log(response);
                alert(response);
            },
        });
            
    });
 });
</script>
@endsection