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

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-12">
                                    <div class="preview preview-pic tab-content">
                                        @foreach($product->images as $key => $image)
                                        <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="product_{{ $key }}">
                                            <img src="{{ asset($image->image) }}" class="img-fluid"
                                                alt="Product Image" />
                                        </div>
                                        @endforeach
                                    </div>

                                    <ul class="preview thumbnail nav nav-tabs">
                                        @foreach($product->images as $key => $image)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                                href="#product_{{ $key }}">
                                                <img src="{{ asset($image->image) }}" alt="Product Thumbnail" />
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-xl-9 col-lg-8 col-md-12">
                                    <div class="product details">
                                        <h3 class="product-title mb-0">{{$product->name}}</h3>
                                        <h5 class="price mt-0">Current Price: <span
                                                class="col-amber">${{$product->price}}</span></h5>
                                        <div class="rating">
                                            <div class="stars">
                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($averageRating)) <span
                                                    class="zmdi zmdi-star col-amber"></span>
                                                    @elseif ($i - 0.5 <= $averageRating) <span
                                                        class="zmdi zmdi-star-half col-amber"></span>
                                                        @else
                                                        <span class="zmdi zmdi-star-outline"></span>
                                                        @endif
                                                        @endfor
                                            </div>
                                            <span class="m-l-10">{{ $reviewCount }} reviews</span>
                                        </div>

                                        <hr>
                                        <p class="product-description" style="display: -webkit-box;
    -webkit-line-clamp: 3;   /* show only 3 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;">{{$product->description}}</p>
                                        <h6 class="sizes mb-3">Tags:
                                            @foreach ($product->tags as $tag)
                                            <span class="size mr-0" title="{{$tag}}">{{$tag}}</span>
                                            @if (! $loop->last), @endif
                                            @endforeach
                                        </h6>
                                        <h6 class="sizes mb-3">Categories:
                                            @foreach ($product->categories as $category)
                                            <span class="size mr-0" title="{{ $category }}">{{ $category }}</span>
                                            @if (! $loop->last), @endif
                                            @endforeach
                                        </h6>
                                        <h6 class="sizes mb-3">Type:
                                            <span class="size" title="{{$product->type}}">{{$product->type}}</span>
                                        </h6>
                                        <h6 class="sizes mb-3">XPD:
                                            <span class="size"
                                                title="{{date('d M, Y', strtotime($product->expire_date))}}">{{date('d M, Y', strtotime($product->expire_date))}}</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#description">Description</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#review">Review</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#about">Additional
                                        Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="description">
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="tab-pane" id="review">
                                    @if ($product->reviews->count() > 0)
                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
                                        those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et
                                        Malorum" by Cicero are also reproduced in their exact original form, accompanied
                                    </p>
                                    @else
                                    <p>No Reviews</p>
                                    @endif
                                    <ul class="row list-unstyled c_review mt-4">
                                        @if ($product->reviews->count() > 0)
                                        @foreach ($product->reviews as $review)
                                        <li class="col-12">
                                            <div class="avatar">
                                                <a href="javascript:void(0);"><img class="rounded"
                                                        src="assets/images/xs/avatar2.jpg" alt="user" width="60"></a>
                                            </div>
                                            <div class="comment-action">
                                                <h5 class="c_name">Hossein Shams</h5>
                                                <p class="c_msg mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla
                                                    vel metus scelerisque ante sollicitudin commodo. </p>
                                                <div class="badge badge-primary">iPhone 8</div>
                                                <span class="m-l-10">
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                                </span>
                                                <small class="comment-date float-sm-right">Dec 21, 2019</small>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Name</th>
                                                <th>Value</th>
                                            </tr>
                                            @foreach ($product->additionalInfos as $info)
                                            <tr>
                                                <th>{{$info->name}}</th>
                                                <td>{{$info->value}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                </div>
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