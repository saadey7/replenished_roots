@extends('website.layouts.layout')
@section('title')
Product Detail
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Shop Details</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Shop Details</span></li>
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

    <!-- shop-details-area -->
    <section class="inner-shop-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="inner-shop-details-flex-wrap">
                        <div class="inner-shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">

                                @foreach($data->images as $key => $image)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="item-{{ $key }}"
                                    role="tabpanel" aria-labelledby="item-{{ $key }}-tab">

                                    <div class="inner-shop-details-img">
                                        <img src="{{ $image->image }}" alt="img"
                                            style="width: 605px; height: 580px;  object-fit: contain;">
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="inner-shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                @foreach($data->images as $key => $image)
                                <li class="nav-item" role="presentation">
                                    <a href="#" class="nav-link @if($loop->first) active @endif"
                                        id="item-{{ $key }}-tab" data-bs-toggle="tab" data-bs-target="#item-{{ $key }}"
                                        role="tab" aria-controls="item-{{ $key }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">

                                        <img src="{{ $image->image }}" alt="img"
                                            style="width: 112px; height: 119px; object-fit: contain;">
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-shop-details-content">
                        <h4 class="title">{{$data->name}}</h4>
                        <div class="inner-shop-details-meta">
                            <ul class="list-wrap">
                                <li>Brands : <a href="shop.html">Replenished Roots</a></li>
                                <li class="inner-shop-details-review">
                                    <div class="rating">
                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($data->reviews->avg('rating')))
                                            <i class="fas fa-star"></i>
                                            @elseif ($i - 0.5 <= $data->reviews->avg('rating'))
                                                <i class="fas fa-star-half-alt"></i>
                                                @else
                                                <i class="far fa-star"></i>
                                                @endif
                                                @endfor
                                    </div>
                                    <span>({{$averageRating ?? 0}})</span>
                                </li>
                                <li>ID : <span>{{$data->product_id}}</span></li>
                            </ul>
                        </div>
                        <div class="inner-shop-details-price">
                            @if ($data->is_discount)
                            <h2 class="price">${{$data->discount_price}} <span
                                    style="font-size:16px;"><del>${{$data->price}}</del></span></h2>
                            @else
                            <h2 class="price">${{$data->price}}</h2>
                            @endif
                            <h5 class="stock-status">- IN Stock</h5>
                        </div>
                        <p
                            style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                            {{$data->description}}</p>
                        <div class="inner-shop-details-list">
                            <ul class="list-wrap">
                                <li>Type : <span>{{$data->type}}</span></li>
                                <li>XPD : <span>{{date('d M, Y', strtotime($data->expire_date))}}</span></li>
                                <li>CO : <span>Replenished Roots</span></li>
                            </ul>
                        </div>
                        <div class="inner-shop-perched-info">
                            <div class="sd-cart-wrap">
                                <form action="#">
                                    <div class="quickview-cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </form>
                            </div>
                            <a href="cart.html" class="cart-btn">add to cart</a>
                            <a href="shop-details.html" class="wishlist-btn" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Wishlist"><i class="far fa-heart"></i></a>
                        </div>
                        <div class="inner-shop-details-bottom">
                            <span>Tag :
                                @foreach ($data->tags as $item)
                                <a href="#">{{$item}}</a>
                                @endforeach
                            </span>
                            <span>
                                <span>Categories :
                                    @foreach ($data->categories as $item)
                                    <a href="#">{{$item}}</a>
                                    @endforeach
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" role="tab" aria-controls="description"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="information-tab" data-bs-toggle="tab"
                                    data-bs-target="#information" role="tab" aria-controls="information"
                                    aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="review-tab" data-bs-toggle="tab"
                                    data-bs-target="#review" role="tab" aria-controls="review"
                                    aria-selected="false">Reviews ({{$data->reviews->count()}})</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContentTwo">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="product-desc-content">
                                    <p>{{$data->description}}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="information" role="tabpanel"
                                aria-labelledby="information-tab">
                                <div class="product-desc-content">
                                    <table class="table table-sm">
                                        <tbody>
                                            @foreach ($data->additionalInfos as $item)
                                            <tr>
                                                <th scope="row">{{$item->name}}</th>
                                                <td>{{$item->value}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="product-desc-content">
                                    <div class="reviews-comment">
                                        @if ($data->reviews->count() > 0)
                                        @foreach ($data->reviews as $item)
                                        <div class="review-info">
                                            <div class="review-img">
                                                <img src="{{asset('public/website/assets/img/others/p_review_img01.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="review-content">
                                                @php
                                                $avg = $item->rating;
                                                $fullStars = floor($avg);
                                                $halfStar = ($avg - $fullStars) >= 0.5;
                                                @endphp

                                                <ul class="review-rating list-wrap">
                                                    <li>
                                                        {{-- Full stars --}}
                                                        @for($i = 1; $i <= $fullStars; $i++) <i class="fas fa-star"></i>
                                                            @endfor

                                                            {{-- Half star --}}
                                                            @if($halfStar)
                                                            <i class="fas fa-star-half-alt"></i>
                                                            @endif

                                                            {{-- Empty stars --}}
                                                            @for($i = $fullStars + $halfStar + 1; $i <= 5; $i++) <i
                                                                class="far fa-star"></i>
                                                                @endfor
                                                    </li>
                                                </ul>
                                                <div class="review-meta">
                                                    <h6>{{$item->user->firstname}} {{$item->user->lastname}}
                                                        <span>-{{date('F d, Y', strtotime($item->created_at))}}</span>
                                                    </h6>
                                                </div>
                                                <p>{{$item->review}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="review-info">
                                            <p>No Reviews</p>
                                        </div>
                                        @endif


                                    </div>
                                    <div class="add-review">
                                        <h4 class="title">Add a review</h4>
                                        <form action="#">
                                            <p>Your email address will not be published.Required fields are marked
                                                <span>*</span>
                                            </p>
                                            <div class="from-grp">
                                                <label for="name">Your name <span>*</span></label>
                                                <input type="text" id="name">
                                            </div>
                                            <div class="from-grp">
                                                <label for="email">Your email <span>*</span></label>
                                                <input type="text" id="email">
                                            </div>
                                            <div class="from-grp checkbox-grp">
                                                <input type="checkbox" id="checkbox">
                                                <label for="checkbox">Don’t show your email address</label>
                                            </div>
                                            <div class="form-rating">
                                                <label>your rating</label>
                                                <ul class="list-wrap">
                                                    <li>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="from-grp">
                                                <label for="comment">Write Your review <span>*</span></label>
                                                <textarea id="comment" cols="30" rows="10"></textarea>
                                            </div>
                                            <button class="btn">Submit Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- related-products -->
    <div class="related-products-area pb-120">
        <div class="container">
            <div class="related-products-wrap">
                <h2 class="title">Related Products</h2>
                <div class="row related-product-active">
                    <div class="col-xl-3">
                        <div class="home-shop-item">
                            <div class="home-shop-thumb">
                                <a href="shop-details.html">
                                    <img src="{{asset('public/website/assets/img/products/home_shop_thumb01.png')}}"
                                        alt="img">
                                    <span class="discount"> -15%</span>
                                </a>
                                <div class="shop-thumb-shape"></div>
                            </div>
                            <div class="home-shop-content">
                                <h4 class="title"><a href="shop-details.html">Box Full of Muscles</a></h4>
                                <span class="home-shop-price">$85.99</span>
                                <div class="home-shop-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="total-rating">(30)</span>
                                </div>
                                <div class="shop-content-bottom">
                                    <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                    <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="home-shop-item">
                            <div class="home-shop-thumb">
                                <a href="shop-details.html">
                                    <img src="{{asset('public/website/assets/img/products/home_shop_thumb02.png')}}"
                                        alt="img">
                                </a>
                                <div class="shop-thumb-shape yellow"></div>
                            </div>
                            <div class="home-shop-content">
                                <h4 class="title"><a href="shop-details.html">Protein Powder 2kg</a></h4>
                                <span class="home-shop-price">$55.99</span>
                                <div class="home-shop-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="total-rating">(30)</span>
                                </div>
                                <div class="shop-content-bottom">
                                    <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                    <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="home-shop-item">
                            <div class="home-shop-thumb">
                                <a href="shop-details.html">
                                    <img src="{{asset('public/website/assets/img/products/home_shop_thumb03.png')}}"
                                        alt="img">
                                    <span class="discount"> -15%</span>
                                </a>
                                <div class="shop-thumb-shape purple"></div>
                            </div>
                            <div class="home-shop-content">
                                <h4 class="title"><a href="shop-details.html">Amino Energy Health 2kg</a></h4>
                                <span class="home-shop-price">$79.99</span>
                                <div class="home-shop-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="total-rating">(24)</span>
                                </div>
                                <div class="shop-content-bottom">
                                    <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                    <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="home-shop-item">
                            <div class="home-shop-thumb">
                                <a href="shop-details.html">
                                    <img src="{{asset('public/website/assets/img/products/home_shop_thumb04.png')}}"
                                        alt="img">
                                </a>
                                <div class="shop-thumb-shape gray"></div>
                            </div>
                            <div class="home-shop-content">
                                <h4 class="title"><a href="shop-details.html">Antiaging and Longevity</a></h4>
                                <span class="home-shop-price">$79.99</span>
                                <div class="home-shop-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="total-rating">(24)</span>
                                </div>
                                <div class="shop-content-bottom">
                                    <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                    <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="home-shop-item">
                            <div class="home-shop-thumb">
                                <a href="shop-details.html">
                                    <img src="{{asset('public/website/assets/img/products/home_shop_thumb05.png')}}"
                                        alt="img">
                                </a>
                                <div class="shop-thumb-shape blue"></div>
                            </div>
                            <div class="home-shop-content">
                                <h4 class="title"><a href="shop-details.html">SERIOUR MASS 2kg</a></h4>
                                <span class="home-shop-price">$39.99</span>
                                <div class="home-shop-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="total-rating">(12)</span>
                                </div>
                                <div class="shop-content-bottom">
                                    <a href="cart.html" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                    <a href="shop-details.html" class="btn btn-two">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- related-products-end -->


</main>
@endsection