@extends('admin.layouts.layouts')
@section('title')
Edit Product
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
                    <h2>Edit Product</h2>
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
                            <form action="{{url('admin/update')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                  <div class="form-group">
                                    <label for="exampleInputName1">Select Store</label>
                                    <select class="form-control show-tick ms select2" data-placeholder="Select Store" name="store_id">
                                        <option selected hidden value="{{$data->store_id}}">{{$data->store->name}}</option>
                                        @foreach($stores as $store)
                                        <option value="{{$store->id}}">{{$store->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Enter Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$data->name}}">
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputImage1">Select Multiple Images</label>
                                    <div class="input-images"></div>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Enter Product Price</label>
                                    <input type="number" step="any" class="form-control" id="exampleInputName1" name="price" value="{{$data->price}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputName1">Enter Product Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="10">{{$data->description}}</textarea>
                                  </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
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
    var ImgArray = <?php echo $data->images ?>;
    let preloaded = [
        @foreach($data->images as $img)
           {id: {{$img->id}}, src: "{{$img->image}}" },
        @endforeach
 ];

$('.input-images').imageUploader({
    preloaded: preloaded,
    imagesInputName: 'images',
    preloadedInputName: 'old'
});



 setInterval(function() {
$(".iui-close").addClass("zmdi zmdi-close");
   
}, 500);
</script>
@endsection