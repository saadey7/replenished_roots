@extends('admin.layouts.layouts')
@section('title')
Add Product
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
                    <h2>Add New Product</h2>
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
                            <form action="{{url('admin/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Enter Product Name</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Enter Product Type</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="type">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Enter Product Price</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Enter Product Expire Date</label>
                                            <input type="date" class="form-control" id="exampleInputName1"
                                                name="expire_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Enter Tags <span style="font-size: 11px; color:#878787">( Type
                                                    a word and press Comma to add a
                                                    tag )</span></label>
                                            <div class="form-control">
                                                <input type="text" class="form-control" name="tags"
                                                    data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Enter Categories <span
                                                    style="font-size: 11px; color:#878787">( Type a word and press Comma
                                                    to add a
                                                    tag )</span></label>
                                            <div class="form-control">
                                                <input type="text" class="form-control" name="categories"
                                                    data-role="tagsinput">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <input id="is_discount" class="form-control" type="checkbox"
                                                name="is_discount">
                                            <label for="is_discount">
                                                Discount
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="discount_fields" style="display: none;">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Discount Percentage</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                name="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="discount_fields1" style="display: none;">
                                        <div class="form-group">
                                            <label for="exampleInputName1">Discount Price</label>
                                            <input type="text" class="form-control" id="exampleInputName1"
                                                name="discount_price">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputImage1">Select Multiple Images</label>
                                    <div class="input-images" required></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Enter Product Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div id="dynamic_rows">
                                    <label for="exampleInputName1">Product Additional Information</label>
                                    <div class="form-row m-0 align-items-center mb-2" style="gap: 4px">
                                        <div style="width: 47%;">
                                            <input type="text" class="form-control" name="add_info_name[]"
                                                placeholder="e.g calories">
                                        </div>
                                        <div style="width: 47%;">
                                            <input type="text" class="form-control" name="add_info_value[]"
                                                placeholder="e.g 110">
                                        </div>
                                        <div style="width: 5%">
                                            <button type="button" class="btn btn-success add_row"
                                                style="width: 100%; margin: 0px; padding: 11px 18px;">+</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
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

setInterval(function() {
    $(".iui-close").addClass("zmdi zmdi-close");

}, 500);
</script>
<script>
$(document).ready(function() {

    if ($('#is_discount').is(':checked')) {
        $('#discount_fields').css('display', 'block');
        $('#discount_fields1').css('display', 'block');
    } else {
        $('#discount_fields').css('display', 'none');
        $('#discount_fields1').css('display', 'none');
    }


    $('#is_discount').change(function() {
        if ($(this).is(':checked')) {
            $('#discount_fields').css('display', 'block');
            $('#discount_fields1').css('display', 'block');
        } else {
            $('#discount_fields').css('display', 'none');
            $('#discount_fields1').css('display', 'none');
        }
    });
});
</script>
<script>
$(document).ready(function() {
    // Add new row when + button is clicked
    $(document).on('click', '.add_row', function() {
        const newRow = `
        <div class="form-row m-0 align-items-center mb-2" style="gap: 4px">
            <div style="width: 47%;">
                <input type="text" class="form-control" name="add_info_name[]" placeholder="Label">
            </div>
            <div style="width: 47%;">
                <input type="text" class="form-control" name="add_info_value[]" placeholder="Value">
            </div>
            <div style="width: 5%;">
                <button type="button" class="btn btn-danger remove_row" style="width: 100%; margin: 0px; padding: 11px 18px;">-</button>
            </div>
        </div>
        `;

        // Insert new row after current row
        $(this).closest('.form-row').after(newRow);
    });

    // Remove row
    $(document).on('click', '.remove_row', function() {
        $(this).closest('.form-row').remove();
    });
});
</script>
@endsection