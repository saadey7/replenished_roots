{{-- @extends('website.layouts.layout')
@section('title')
Shop
@endsection
<style>
.filter_reset {
    float: right;
    position: absolute;
    top: -4px;
    right: 0px;
    background-color: #FD4B4B;
    border-radius: 4px;
    font-size: 15px;
    font-family: auto;
    padding: 5px 10px;
    color: white;
}
</style>
@section('content')
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
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Our Shop</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Our Shop</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one"><img src="{{asset('public/website/assets/img/others/video_shape01.png')}}"
                alt="shape"></div>
        <div class="video-shape two"><img src="{{asset('public/website/assets/img/others/video_shape02.png')}}"
                alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

    <div class="inner-shop-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-8 col-sm-8">
                    <aside class="shop-sidebar">
                        <div class="widget">
                            <h4 class="sidebar-title" style="position: relative;">Filter by Price <a
                                    href="{{url('shop')}}" class="filter_reset">Reset</a></h4>
                            <form method="GET" action="{{ url('shop') }}">
                                <div class="price_filter">
                                    <div id="slider-range"></div>
                                    <div class="price_slider_amount">
                                        <span>Price :</span>
                                        <input type="text" id="amount" placeholder="Add Your Price" />
                                        <input type="hidden" id="min_price" name="min_price"
                                            value="{{ request('min_price') }}">
                                        <input type="hidden" id="max_price" name="max_price"
                                            value="{{ request('max_price') }}">
                                        <input type="submit" class="btn" value="Filter">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="sidebar-title">CATEGORIES</h4>
                            <ul class="categories-list list-wrap">
                                @foreach ($getCategories as $item)
                                <li><a href="">{{$item}} <i class="fas fa-angle-double-right"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="sidebar-title">LATEST PRODUCTS</h4>
                            <div class="lp-post-list">
                                <ul class="lp-post-item list-wrap">
                                    @foreach ($datas->take(3) as $item)
                                    <li>
                                        <div class="lp-post-thumb">
                                            <a href="{{url('product-detail')}}/{{$item->product_id}}"><img
                                                    src="{{$item->images[0]->image}}" alt="img"></a>
                                        </div>
                                        <div class="lp-post-content">
                                            <!--<ul class="lp-post-rating list-wrap d-flex align-item-center">-->
                                            <!--    <li>-->
                                            <!--        @for ($i = 1; $i <= 5; $i++) -->
                                            <!--            @if ($i <=floor($item->reviews->avg('rating')))-->
                                            <!--            <i class="fas fa-star"></i>-->
                                            <!--            @elseif ($i - 0.5 <= $item->reviews->avg('rating'))-->
                                            <!--                <i class="fas fa-star-half-alt"></i>-->
                                            <!--            @else-->
                                            <!--                <i class="far fa-star"></i>-->
                                            <!--            @endif-->
                                            <!--        @endfor-->
                                            <!--    </li>-->
                                            <!--    <span class="total-rating" style="margin-left: 5px"> {{number_format($item->reviews->avg('rating'), 1)}} ({{$item->reviews->count()}})</span>-->
                                            <!--</ul>-->
                                            <h4 class="title"><a
                                                    href="{{url('product-detail')}}/{{$item->product_id}}">{{$item->name}}</a>
                                            </h4>
                                            @if ($item->is_discount)
                                            <span class="price">{{$item->currency}}{{moneyFormatPakistan($item->discount_price)}} <span
                                                    style="font-size:16px; color: #faa432;"><del>{{$item->currency}}{{moneyFormatPakistan($item->price)}}</del></span></span>
                                            @else
                                            <span class="price">{{$item->currency}}{{moneyFormatPakistan($item->price)}}</span>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <h4 class="sidebar-title">Product tags</h4>
                            <ul class="Product-tag-list list-wrap">
                                <li><a href="shop.html">Bone Support</a></li>
                                <li><a href="shop.html">Energy Support</a></li>
                                <li><a href="shop.html">Hair</a></li>
                                <li><a href="shop.html">Multivitamins</a></li>
                                <li><a href="shop.html">Pre-Workout</a></li>
                                <li><a href="shop.html">Protein</a></li>
                                <li><a href="shop.html">Skin & Nails</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-8 shop-sidebar-pad order-first">
                    <div class="shop-top-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="shop-top-left">
                                    <p class="woocommerce-result-count shop-show-result">
                                        Showing {{ $datas->firstItem() }}–{{ $datas->lastItem() }} of
                                        {{ $datas->total() }} results
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="shop-top-right selection">
                                    <form class="woocommerce-ordering mb-0" method="GET" action="{{ url('shop') }}">
                                        <select id="shortBy" name="orderby" class="orderby form-select"
                                            aria-label="Shop order"
                                            onchange="this.form.submit()">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by latest</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ReplenishedEoots-shop-product-main">
                        <div class="row">
                            @foreach ($datas as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="home-shop-item inner-shop-item">
                                    <div class="home-shop-thumb">
                                        <a href="{{url('product-detail')}}/{{$item->product_id}}">
                                            <img src="{{$item->images[0]->image}}" alt="img">
                                            @if ($item->is_discount)
                                            <span class="discount"> -{{$item->discount}}%</span>
                                            @endif

                                        </a>
                                    </div>
                                    <div class="home-shop-content">
                                        <div class="shop-item-cat"><a href="#">{{$item->type}}</a></div>
                                        <h4 class="title">
                                            <a href="{{url('product-detail')}}/{{$item->product_id}}"
                                                style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{$item->name}}</a>
                                        </h4>
                                        @if ($item->is_discount == 1)
                                        <span class="home-shop-price">{{$item->currency}}{{moneyFormatPakistan($item->discount_price)}} <span class="old-price"
                                                style="font-size:17px; color:#faa432;"><del>{{$item->currency}}{{moneyFormatPakistan($item->price)}}</del></span></span>
                                        @else
                                        <span class="home-shop-price">{{$item->currency}}{{moneyFormatPakistan($item->price)}}</span>
                                        @endif
                                        <!--<div class="home-shop-rating">-->
                                        <!--    @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($item->reviews->avg('rating')))-->
                                        <!--        <i class="fas fa-star"></i>-->
                                        <!--        @elseif ($i - 0.5 <= $item->reviews->avg('rating'))-->
                                        <!--            <i class="fas fa-star-half-alt"></i>-->
                                        <!--            @else-->
                                        <!--            <i class="far fa-star"></i>-->
                                        <!--            @endif-->
                                        <!--            @endfor-->
                                        <!--            <span class="total-rating">{{number_format($item->reviews->avg('rating'), 1)}} ({{$item->reviews->count()}})</span>-->
                                        <!--</div>-->
                                        <div class="shop-content-bottom">
                                            <a href="{{url('/add_to_cart')}}" class="cart"
                                                onclick="event.preventDefault();
                                                        document.getElementById('addToCart-form{{$item->id}}').submit();"><i
                                                    class="flaticon-shopping-cart-1"></i></a>
                                            <form id="addToCart-form{{$item->id}}" action="{{url('/add_to_cart')}}"
                                                method="POST" class="d-none">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->id}}">
                                                <input type="hidden" name="quantity" value="1">
                                            </form>
                                            <a href="{{url('product-detail')}}/{{$item->product_id}}"
                                                class="btn btn-two">Buy
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $datas->appends(request()->query())->links('partials.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection --}}
@extends('website.layouts.layout')
@section('title')
Shop
@endsection
@section('content')
@php
if (!function_exists('moneyFormatPakistan')) {
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
}
@endphp
<style>
    .current{
        color:#ffc53c;
    }
</style>
    <section class="bannr-section" style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
        <div class="container">
            <div class="bannr-text">
                <h2>Our Products</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Our Products</li>
                </ol>
            </div>
        </div>
        <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
        <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
        <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
    </section>
    <section class="gap">
        <div class="container">
            <div class="products-list">
                <h6>{{ $datas->total() }} products</h6>
                <div class="sort-by d-flex align-items-center">
                    <span>Sort By</span>
                    <form class="woocommerce-ordering mb-0" method="GET" action="{{ url('shop') }}">
                        @if(request('min_price') !== null)
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        @endif
                        @if(request('max_price') !== null)
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                        @endif
                        <select id="shortBy" name="orderby" class="nice-select Advice orderby"
                            aria-label="Shop order" onchange="this.form.submit()">
                            <option value="menu_order" {{ request('orderby', 'menu_order') == 'menu_order' ? 'selected' : '' }}>Default sorting</option>
                            <option value="popularity" {{ request('orderby') == 'popularity' ? 'selected' : '' }}>Sort by popularity</option>
                            <option value="rating" {{ request('orderby') == 'rating' ? 'selected' : '' }}>Sort by average rating</option>
                            <option value="date" {{ request('orderby') == 'date' ? 'selected' : '' }}>Sort by latest</option>
                            <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Sort by price: low to high</option>
                            <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Sort by price: high to low</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div aria-labelledby="v-pills-home-tab" class="tab-pane fade show active" id="v-pills-home"
                    role="tabpanel">
                    <div class="row">
                        @forelse ($datas as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="trending-products">
                                <div class="trending-products-img">
                                    <a href="{{ url('product-detail') }}/{{ $item->product_id }}">
                                        <img alt="{{ $item->name }}"
                                            src="{{ $item->images[0]->image ?? asset('public/images/logo.png') }}" />
                                    </a>
                                    @if ($item->is_discount)
                                    <span>-{{ $item->discount }}%</span>
                                    @endif
                                </div>
                                <div class="trending-products-text">
                                    <a href="{{ url('product-detail') }}/{{ $item->product_id }}"
                                        style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{ $item->name }}</a>
                                    {{-- Rating stars (hidden, same as old shop page)
                                    <ul class="star">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($item->reviews->avg('rating')))
                                            <li><i class="fa-solid fa-star"></i></li>
                                            @elseif ($i - 0.5 <= $item->reviews->avg('rating'))
                                            <li><i class="fa-solid fa-star-half-stroke"></i></li>
                                            @else
                                            <li><i class="fa-regular fa-star"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                    --}}
                                    @if ($item->is_discount == 1)
                                    <h4><del>{{ $item->currency }}{{ moneyFormatPakistan($item->price) }}</del>{{ $item->currency }}{{ moneyFormatPakistan($item->discount_price) }}</h4>
                                    @else
                                    <h4><del></del>{{ $item->currency }}{{ moneyFormatPakistan($item->price) }}</h4>
                                    @endif
                                </div>
                                <a class="add-to-cart" href="{{ url('/add_to_cart') }}"
                                    onclick="event.preventDefault(); document.getElementById('addToCart-form{{ $item->id }}').submit();">Add to Cart</a>
                                <form id="addToCart-form{{ $item->id }}" action="{{ url('/add_to_cart') }}"
                                    method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center py-5">No products found.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="center">
                {{ $datas->appends(request()->query())->links('partials.pagination') }}
            </div>
        </div>
    </section>
@endsection