@extends('website.layouts.layout')
@section('title')
    Product Detail
@endsection
@section('content')
@php
if (!function_exists('moneyFormatPakistan')) {
    function moneyFormatPakistan($num)
    {
        $num = (string) $num;
        $lastThree = substr($num, -3);
        $restUnits = substr($num, 0, -3);

        if ($restUnits != '') {
            $restUnits = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $restUnits);
            return $restUnits . ',' . $lastThree;
        } else {
            return $lastThree;
        }
    }
}
@endphp
<style>
    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }
    .star-rating input {
        display: none;
    }
    .star-rating label {
        font-size: 30px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s;
    }
    .star-rating input:checked~label {
        color: gold;
    }
    .star-rating label:hover,
    .star-rating label:hover~label {
        color: gold;
    }
    .pd-thumbs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 15px;
    }
    .pd-thumbs .nav-link {
        padding: 0;
        border: 1px solid #eee;
        border-radius: 6px;
        background: #fff;
    }
    .pd-thumbs .nav-link.active {
        border-color: #28a745;
    }
</style>
    <section class="bannr-section" style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
        <div class="container">
            <div class="bannr-text">
                <h2>Product Details</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/shop') }}">Shop</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Product Details</li>
                </ol>
            </div>
        </div>
        <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
        <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
        <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
    </section>

    <section class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-info-img">
                        {{-- Main images --}}
                        <div class="tab-content" id="pdImageTabContent">
                            @foreach ($data->images as $key => $image)
                            <div class="tab-pane fade @if ($loop->first) show active @endif"
                                id="item-{{ $key }}" role="tabpanel" aria-labelledby="item-{{ $key }}-tab">
                                <img alt="{{ $data->name }}" src="{{ $image->image }}"
                                    style="width: 100%; height: 550px; object-fit: contain;" />
                            </div>
                            @endforeach
                        </div>
                        <img alt="img" class="info-img" src="{{ asset('public/website/assets/img/cbd.png') }}" />
                    </div>
                    {{-- Thumbnails --}}
                    @if ($data->images->count() > 1)
                    <ul class="nav nav-tabs pd-thumbs border-0" id="pdImageTab" role="tablist">
                        @foreach ($data->images as $key => $image)
                        <li class="nav-item" role="presentation">
                            <a href="#" class="nav-link @if ($loop->first) active @endif"
                                id="item-{{ $key }}-tab" data-bs-toggle="tab"
                                data-bs-target="#item-{{ $key }}" role="tab"
                                aria-controls="item-{{ $key }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                <img src="{{ $image->image }}" alt="img"
                                    style="width: 90px; height: 90px; object-fit: contain;">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="product-info">
                        <div class="d-flex align-items-center">
                            <h6><span>Available</span></h6>
                            {{-- Rating stars (hidden, same as old page)
                            <div class="start d-flex align-items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($data->reviews->avg('rating')))
                                    <i class="fa-solid fa-star"></i>
                                    @elseif ($i - 0.5 <= $data->reviews->avg('rating'))
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    @else
                                    <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span>( {{ $data->reviews->count() }} Review )</span>
                            --}}
                            <span style="color:red;"><i class="fa-light fa-fire"></i>
                                {{ number_format($averageRating ?? 0) }}k sold this week</span>
                        </div>
                        <h2>{{ $data->name }}</h2>
                        <h5>{{ $data->short_decs }}</h5>

                        <form id="addToCart-form{{ $data->id }}" class="variations_form"
                            action="{{ url('/add_to_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                            <div class="stock">
                                <span class="price">
                                    @if ($data->is_discount)
                                    <del>
                                        <span class="woocommerce-Price-amount">
                                            <bdi>{{ $data->currency }}{{ moneyFormatPakistan($data->price) }}</bdi>
                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>{{ $data->currency }}{{ moneyFormatPakistan($data->discount_price) }}</bdi>
                                        </span>
                                    </ins>
                                    @else
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>{{ $data->currency }}{{ moneyFormatPakistan($data->price) }}</bdi>
                                        </span>
                                    </ins>
                                    @endif
                                </span>
                                <h5 class="stock-status">- IN Stock</h5>
                            </div>
                            <h6><i class="fa-solid fa-check"></i>Product Information</h6>
                            <div class="quantity">
                                <h6>Quantity</h6>
                                <input class="input-text" min="1" name="quantity" step="1" type="number" value="1" />
                            </div>
                            <div class="wishlist">
                                <button class="single_add_to_cart_button btn" type="submit">Add to cart</button>
                                <a href="{{ url('/add_to_wishlist') }}"
                                    onclick="event.preventDefault(); document.getElementById('addToWishlist-form{{ $data->id }}').submit();">
                                    @if ($data->is_fav)
                                    <i class="fas fa-heart"></i>
                                    @else
                                    <i class="fa-regular fa-heart"></i>
                                    @endif
                                </a>
                            </div>
                            <ul class="product_meta">
                                <li><span class="theme-bg-clr">ID:</span>
                                    <ul class="pd-cat">
                                        <li><a href="javascript:void(0);">{{ $data->product_id }}</a></li>
                                    </ul>
                                </li>
                                <li><span class="theme-bg-clr">Type:</span>
                                    <ul class="pd-cat">
                                        <li><a href="javascript:void(0);">{{ $data->type }}</a></li>
                                    </ul>
                                </li>
                                <li><span class="theme-bg-clr">Brand:</span>
                                    <ul class="pd-cat">
                                        <li><a href="{{ url('/shop') }}">Replenished Roots</a></li>
                                    </ul>
                                </li>
                                <li><span class="theme-bg-clr">Tags:</span>
                                    <ul class="pd-tag">
                                        <li>
                                            <a href="#">Natural Blend</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><span class="theme-bg-clr">Categories:</span>
                                    <ul class="pd-tag">
                                        <li>
                                            <a href="#">Blend</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="#"><img alt="card" class="pt-3" src="{{ asset('public/website/assets/img/card.png') }}" /></a>
                        </form>

                        {{-- Wishlist form (outside the cart form, nested forms are not allowed) --}}
                        <form id="addToWishlist-form{{ $data->id }}" action="{{ url('/add_to_wishlist') }}"
                            method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="gap no-top">
        <div class="container">
            <div aria-orientation="vertical" class="tab-style nav nav-pills" id="v-pills-tab" role="tablist">
                <button aria-controls="v-pills-home" aria-selected="true" class="nav-link active"
                    data-bs-target="#v-pills-home" data-bs-toggle="pill" id="v-pills-home-tab" role="tab"
                    type="button">Description</button>
                <button aria-controls="v-pills-profile" aria-selected="false" class="nav-link"
                    data-bs-target="#v-pills-profile" data-bs-toggle="pill" id="v-pills-profile-tab" role="tab"
                    type="button">Additional Information</button>
                {{-- Reviews tab (hidden, same as old page). Uncomment to enable the reviews tab.
                <button aria-controls="v-pills-messages" aria-selected="false" class="nav-link"
                    data-bs-target="#v-pills-messages" data-bs-toggle="pill" id="v-pills-messages-tab" role="tab"
                    type="button">Reviews ({{ $data->reviews->count() }})</button>
                --}}
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div aria-labelledby="v-pills-home-tab" class="tab-pane fade show active" id="v-pills-home"
                    role="tabpanel">
                    <p>{!! nl2br(e($data->description)) !!}</p>
                </div>
                <div aria-labelledby="v-pills-profile-tab" class="tab-pane fade" id="v-pills-profile" role="tabpanel">
                    <ul class="specification">
                        <li>
                            <h6>Type</h6>{{ $data->type }}
                        </li>
                        <li>
                            <h6>Brand</h6>Replenished Roots
                        </li>
                    </ul>
                </div>
                <div aria-labelledby="v-pills-messages-tab" class="tab-pane fade" id="v-pills-messages" role="tabpanel">
                    <div class="comment">
                        @if ($data->reviews->count() > 0)
                        <ul>
                            @foreach ($data->reviews as $item)
                            @php
                                $avg = $item->rating;
                                $fullStars = floor($avg);
                                $halfStar = $avg - $fullStars >= 0.5;
                            @endphp
                            <li>
                                <img alt="user" src="{{ asset('public/website/assets/img/others/p_review_img01.png') }}" />
                                <div class="comment-data">
                                    <h4>{{ $item->user->firstname }} {{ $item->user->lastname }}</h4>
                                    <span>{{ date('F d, Y', strtotime($item->created_at)) }}</span>
                                    <p>{{ $item->review }}</p>
                                </div>
                                <div class="start">
                                    @for ($i = 1; $i <= $fullStars; $i++)
                                    <i class="fa-solid fa-star"></i>
                                    @endfor
                                    @if ($halfStar)
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    @endif
                                    @for ($i = $fullStars + $halfStar + 1; $i <= 5; $i++)
                                    <i class="fa-regular fa-star"></i>
                                    @endfor
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>No Reviews</p>
                        @endif
                    </div>
                    <div class="comment form-reviews">
                        <h3>Add Reviews</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form class="leave" action="{{ url('/store-feedback') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $data->id }}">
                            <div class="d-flex align-items-center mb-4">
                                <span>Select Rating:</span>
                                <div class="star-rating ps-md-4">
                                    <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                                    <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                                    <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                                    <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                                    <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input name="name" id="name" placeholder="Full Name *" type="text"
                                        value="@auth{{ Auth::guard('web')->user()->firstname }} {{ Auth::guard('web')->user()->lastname }}@endauth"
                                        required />
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input name="email" id="email" placeholder="Email Address *" type="email"
                                        value="@auth{{ Auth::guard('web')->user()->email }}@endauth" required />
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <input type="checkbox" id="checkbox" name="hide_email">
                                <label for="checkbox" class="ms-2 mb-0">Don’t show your email address</label>
                            </div>
                            <textarea name="review" id="comment" placeholder="Your Review *" required></textarea>
                            <button class="btn mt-4 mb-lg-0 mb-5" type="submit">Post Reviews</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related products --}}
    @if (isset($relatedProducts) && $relatedProducts->count() > 0)
    <section class="gap no-top">
        <div class="container">
            <div class="products-list">
                <h6>Related Products</h6>
            </div>
            <div class="row">
                @foreach ($relatedProducts->take(5) as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="trending-products">
                        <div class="trending-products-img">
                            <a href="{{ url('product-detail/' . $item->product_id) }}">
                                <img alt="{{ $item->name }}"
                                    src="{{ $item->images[0]->image ?? asset('public/images/logo.png') }}" />
                            </a>
                            @if ($item->is_discount)
                            <span>-{{ $item->discount }}%</span>
                            @endif
                        </div>
                        <div class="trending-products-text">
                            <a href="{{ url('product-detail/' . $item->product_id) }}"
                                style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{ $item->name }}</a>
                            @if ($item->is_discount == 1)
                            <h4><del>{{ $item->currency }}{{ moneyFormatPakistan($item->price) }}</del>{{ $item->currency }}{{ moneyFormatPakistan($item->discount_price) }}</h4>
                            @else
                            <h4><del></del>{{ $item->currency }}{{ moneyFormatPakistan($item->price) }}</h4>
                            @endif
                        </div>
                        <a class="add-to-cart" href="{{ url('/add_to_cart') }}"
                            onclick="event.preventDefault(); document.getElementById('relatedAddToCart-form{{ $item->id }}').submit();">Add to Cart</a>
                        <form id="relatedAddToCart-form{{ $item->id }}" action="{{ url('/add_to_cart') }}"
                            method="POST" class="d-none">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <input type="hidden" name="quantity" value="1">
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection