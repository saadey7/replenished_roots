@extends('website.layouts.layout')

@section('title')
Wishlist
@endsection

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
                        <h2 class="title">My Wishlist</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item active"><span>Wishlist</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- wishlist-area -->
    <div class="cart__area section-py-130">
        <div class="container">
            <div class="row">
                @if($getWishlist->count() > 0)
                @foreach ($getWishlist as $item)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="home-shop-item inner-shop-item">
                        <div class="home-shop-thumb">
                            <a href="{{url('product-detail')}}/{{$item->product->product_id}}">
                                <img src="{{$item->product->images[0]->image}}" alt="img">
                                @if ($item->product->is_discount)
                                <span class="discount"> -{{$item->product->discount}}%</span>
                                @endif

                            </a>
                        </div>
                        <div class="home-shop-content">
                            <div class="shop-item-cat"><a href="#">{{$item->product->type}}</a></div>
                            <h4 class="title">
                                <a href="{{url('product-detail')}}/{{$item->product->product_id}}"
                                    style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{$item->product->name}}</a>
                            </h4>
                            @if ($item->product->is_discount == 1)
                            <span class="home-shop-price">{{$item->product->currency}}{{moneyFormatPakistan($item->product->discount_price)}} <span class="old-price"
                                    style="font-size:17px; color:#faa432;"><del>{{$item->product->currency}}{{moneyFormatPakistan($item->product->price)}}</del></span></span>
                            @else
                            <span class="home-shop-price">{{$item->product->currency}}{{moneyFormatPakistan($item->product->price)}}</span>
                            @endif
                            <div class="home-shop-rating">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($item->product->reviews->avg('rating')))
                                    <i class="fas fa-star"></i>
                                    @elseif ($i - 0.5 <= $item->product->reviews->avg('rating'))
                                        <i class="fas fa-star-half-alt"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                                        <span class="total-rating">({{$item->product->reviews->count()}})</span>
                            </div>
                            <div class="shop-content-bottom">
                                <a href="{{url('/add_to_cart')}}" class="cart"
                                    onclick="event.preventDefault();
                                            document.getElementById('addToCart-form{{$item->product->id}}').submit();"><i
                                        class="flaticon-shopping-cart-1"></i></a>
                                <form id="addToCart-form{{$item->product->id}}" action="{{url('/add_to_cart')}}"
                                    method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                    <input type="hidden" name="quantity" value="1">
                                </form>
                                <a href="{{url('remove_wishlist_item')}}/{{$item->id}}"
                                    class="btn btn-two">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 text-center py-5">
                    <h4 class="mb-3">Your wishlist is empty</h4>
                    <p class="text-muted">Browse products and add them to your wishlist for later.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-shopping-bag me-1"></i> Start Shopping
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- wishlist-area-end -->

</main>
@endsection
