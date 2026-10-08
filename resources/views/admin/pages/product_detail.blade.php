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
@php
function moneyFormatPakistan($num) {
    $num = (string)$num;
    $lastThree = substr($num, -3);
    $restUnits = substr($num, 0, -3);

    if ($restUnits != '') {
        $restUnits = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $restUnits);
        return $restUnits . "," . $lastThree;
    } else {
        return $lastThree;
    }
}
@endphp
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
                                                class="col-amber">${{moneyFormatPakistan($product->price)}}</span></h5>
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
                                        <p class="product-description">{{$product->short_desc}}</p>
                                        <h6 class="sizes mb-3">Tags:
                                            <span class="size mr-0" title="Natural Blend">Natural Blend</span>
                                        </h6>
                                        <h6 class="sizes mb-3">Categories:
                                            <span class="size mr-0" title="Blend">Blend</span>
                                        </h6>
                                        <h6 class="sizes mb-3">Type:
                                            <span class="size" title="{{$product->type}}">{{$product->type}}</span>
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
                                    @if ($product->reviews->count() == 0)
                                    <p>No Reviews</p>
                                    @endif
                                    <ul class="row list-unstyled c_review mt-4">
                                        @if ($product->reviews->count() > 0)
                                        @foreach ($product->reviews as $review)
                                        <li class="col-12">
                                            <div class="avatar">
                                                <a href="javascript:void(0);"><img class="rounded"
                                                        src="{{asset('public/images/xs/pl.jpg')}}" alt="user" width="60"></a>
                                            </div>
                                            <div class="comment-action">
                                                <h5 class="c_name">{{$review->user->firstname}} {{$review->user->lastname}}</h5>
                                                <p class="c_msg mb-0">{{$review->review}}</p>
                                                <span class="">
                                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($review->rating)) <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                    @elseif ($i - 0.5 <= $review->rating) 
                                                    <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-half col-amber"></i></a>
                                                        @else
                                                        <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline col-amber"></i></a>
                                                        @endif
                                                        @endfor
                                                </span>
                                                <small class="comment-date float-sm-right">{{date('M d, Y', strtotime($review->created_at))}}</small>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>
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