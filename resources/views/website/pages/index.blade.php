@extends('website.layouts.layout')
@section('title')
Home
@endsection
@section('content')
<main class="main-area fix">

    <!-- banner-area -->
    <section class="banner-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-7 col-lg-8 col-md-10">
                    <div class="banner-content text-center">
                        <p class="banner-caption">.. Increased Energy With Replenished Roots ..</p>
                        <h2 class="title">Nourish Your Hormones, Naturally</h2>
                        <a href="{{url('shop')}}" class="btn btn-two">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="banner-images text-center">
                        <img src="{{asset('public/website/assets/img/banner/banner_img01.png')}}" alt="img"
                            class="main-img">
                        <img src="{{asset('public/website/assets/img/banner/banner_round_bg.png')}}" alt="img"
                            class="bg-shape">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape one">
            <img src="{{asset('public/website/assets/img/banner/banner_shape01.png')}}" alt="shape"
                class="wow bannerFadeInLeft" data-wow-delay=".2s" data-wow-duration="2s">
        </div>
        <div class="banner-shape two">
            <img src="{{asset('public/website/assets/img/banner/banner_shape02.png')}}" alt="shape"
                class="wow bannerFadeInRight" data-wow-delay=".2s" data-wow-duration="2s">
        </div>
        <div class="banner-shape three">
            <img src="{{asset('public/website/assets/img/banner/banner_shape03.png')}}" alt="shape"
                class="wow bannerFadeInDown" data-wow-delay=".2s" data-wow-duration="2s">
        </div>
        <div class="banner-shape four">
            <img src="{{asset('public/website/assets/img/banner/banner_shape04.png')}}" alt="shape"
                class="wow bannerFadeInDown" data-wow-delay=".2s" data-wow-duration="2s">
        </div>
    </section>
    <!-- banner-area-end -->

    <!-- brand-area -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-title text-center mb-50">
                        <p class="title">Perfect Brand is Featured on</p>
                    </div>
                </div>
            </div>
            <div class="row brand-active">
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_01.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_02.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_03.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_04.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_05.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_06.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="brand-item">
                        <a href="#"><img src="{{asset('public/website/assets/img/brand/brand_03.png')}}"
                                alt="brand"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- features-area -->
    <section id="features" class="features-area features-bg"
        data-background="{{asset('public/website/assets/img/bg/features_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-lg-5 order-0 order-lg-2">
                    <div class="features-img wow featuresRollOut" data-wow-delay=".3s">
                        <img src="{{asset('public/website/assets/img/others/features_img.png')}}" alt="">
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-7">
                    <div class="features-items-wrap">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-8">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <i class="flaticon-tape-measure"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="title">Hormone Balance Support</h4>
                                        <p>Nutrient-rich seeds formulated to help regulate estrogen and progesterone
                                            naturally.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <i class="flaticon-test"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="title">Phase Wise Formulation</h4>
                                        <p>Targeted blends for each cycle phase to support your body from
                                            menstruation to ovulation.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <i class="flaticon-weight"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="title">100% NATURAL INGREDIENTS</h4>
                                        <p>A thing added to something else in order to complete or enhance it.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8">
                                <div class="features-item">
                                    <div class="features-icon">
                                        <i class="flaticon-abs"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="title">100% Fat Blasting</h4>
                                        <p>A thing added to something else in order to complete or enhance it.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-area-end -->

    <!-- features-product -->
    <section id="paroller" class="features-products">
        <div class="container">
            @foreach ($products as $item)
            <div class="features-products-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="features-products-thumb">
                            <div class="main-img">
                                <img src="{{$item->images[0]->image}}" alt="img">
                            </div>
                            <img src="{{asset('public/website/assets/img/products/features_product_shape01.png')}}"
                                alt="img" class="shape-img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="features-product-content">
                            <h2 class="title"><a
                                    href="{{url('product-detail')}}/{{$item->product_id}}">{{$item->name}}</a></h2>
                            <h6 class="features-product-quantity">{{$item->type}}</h6>
                            <p
                                style="display: -webkit-box; -webkit-line-clamp: 6;   /* show only 3 lines */ -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                {{$item->description}}
                            </p>
                            <div class="features-product-bottom">
                                <a href="{{url('product-detail')}}/{{$item->product_id}}" class="btn">Shop Now</a>
                                @if ($item->is_discount == 1)
                                <span class="price">${{$item->discount_price}} <span
                                        class="old-price">${{$item->price}}</span></span>
                                @else
                                <span class="price">${{$item->price}}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="fp-shapes-wrap">
            <div class="fp-shape-one">
                <img src="{{asset('public/website/assets/img/others/features_sec_shape01.png')}}" alt="shape"
                    class="paroller" data-paroller-factor="0.25" data-paroller-factor-lg="0.20"
                    data-paroller-factor-md="0.25" data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                    data-paroller-direction="vertical">
            </div>
            <div class="fp-shape-two">
                <img src="{{asset('public/website/assets/img/others/features_sec_shape02.png')}}" alt="shape"
                    class="paroller" data-paroller-factor="-0.25" data-paroller-factor-lg="0.20"
                    data-paroller-factor-md="0.25" data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                    data-paroller-direction="vertical">
            </div>
            <div class="fp-shape-three">
                <img src="{{asset('public/website/assets/img/others/features_sec_shape03.png')}}" alt="shape"
                    class="paroller" data-paroller-factor="0.25" data-paroller-factor-lg="0.20"
                    data-paroller-factor-md="0.25" data-paroller-factor-sm="0.10" data-paroller-type="foreground"
                    data-paroller-direction="vertical">
            </div>
        </div>
        <div class="fp-circle one"></div>
        <div class="fp-circle two"></div>
        <div class="fp-circle three"></div>
        <div class="fp-circle four"></div>
        <div class="fp-circle five"></div>
    </section>
    <!-- features-product-end -->

    <!-- shop-area -->
    <section class="home-shop-area">
        <div class="container">
            <div class="row home-shop-active">
                @foreach ($products->take(5) as $item)
                <div class="col-xl-3">
                    <div class="home-shop-item">
                        <div class="home-shop-thumb">
                            <a href="shop-details.html">
                                <img src="{{$item->images[0]->image}}" alt="img">
                                @if ($item->is_discount)
                                <span class="discount"> -{{$item->discount}}%</span>
                                @endif

                            </a>
                            <div class="shop-thumb-shape"></div>
                        </div>
                        <div class="home-shop-content">
                            <h4 class="title">
                                <a href="{{url('product-detail')}}/{{$item->product_id}}"
                                    style="display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">{{$item->name}}</a>
                            </h4>

                            @if ($item->is_discount == 1)
                            <span class="home-shop-price">${{$item->discount_price}} <span class="old-price"
                                    style="font-size:17px; color:#faa432;"><del>${{$item->price}}</del></span></span>
                            @else
                            <span class="home-shop-price">${{$item->price}}</span>
                            @endif
                            <div class="home-shop-rating">
                                @for ($i = 1; $i <= 5; $i++) @if ($i <=floor($item->reviews->avg('rating')))
                                    <i class="fas fa-star"></i>
                                    @elseif ($i - 0.5 <= $item->reviews->avg('rating'))
                                        <i class="fas fa-star-half-alt"></i>
                                        @else
                                        <i class="far fa-star"></i>
                                        @endif
                                        @endfor
                                        <span class="total-rating">({{$item->reviews->count()}})</span>
                            </div>
                            <div class="shop-content-bottom">
                                <a href="#" class="cart"><i class="flaticon-shopping-cart-1"></i></a>
                                <a href="{{url('product-detail')}}/{{$item->product_id}}" class="btn btn-two">Buy
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- shop-area-end -->

    <!-- video-area -->
    <!-- <div class="video-area video-bg" data-background="{{asset('public/website/assets/img/bg/video_bg.jpg')}}">
            <div class="video-bg-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-btn">
                            <a href="https://www.youtube.com/watch?v=HQfF5XRVXjU" class="popup-video ripple-white"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-shape one"><img src="{{asset('public/website/assets/img/others/video_shape01.png')}}" alt="shape"></div>
            <div class="video-shape two"><img src="{{asset('public/website/assets/img/others/video_shape02.png')}}" alt="shape"></div>
        </div> -->
    <!-- video-area-end -->

    <!-- fact-area -->
    <section class="fact-area">
        <div class="container">
            <div class="fact-items-wrapper">
                <div class="row g-0 justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="fact-item">
                            <div class="chart" data-percent="65">
                                <span class="percentage">65<small>%</small></span>
                            </div>
                            <div class="fact-content">
                                <h4 class="title">Active Members</h4>
                                <span>Yes we did it asap software</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="fact-item">
                            <div class="chart" data-percent="90">
                                <span class="percentage">90<small>%</small></span>
                            </div>
                            <div class="fact-content">
                                <h4 class="title">Projects Done</h4>
                                <span>Yes we did it asap software</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="fact-item">
                            <div class="chart" data-percent="80">
                                <span class="percentage">80<small>%</small></span>
                            </div>
                            <div class="fact-content">
                                <h4 class="title">Get Rewards</h4>
                                <span>Yes we did it asap software</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-area-end -->

    <!-- Ingredients-area -->
    <!-- <section id="ingredient" class="ingredients-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="ingredients-img">
                            <img src="{{asset('public/website/assets/img/others/ingredients_img.png')}}" alt="img">
                            <img src="{{asset('public/website/assets/img/others/ingredients_shape.png')}}" alt="img" class="shape">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-9">
                        <div class="ingredients-items-wrap">
                            <div class="section-title mb-60">
                                <p class="sub-title">.. Increased Energy With Replenished Roots ..</p>
                                <h2 class="title">Replenished Roots Ingredients</h2>
                            </div>
                            <div class="row justify-content-center justify-content-lg-start">
                                <div class="col-md-6 col-sm-8">
                                    <div class="ingredients-item wow fadeInUp" data-wow-delay=".2s">
                                        <div class="ingredients-thumb">
                                            <img src="{{asset('public/website/assets/img/others/ingredients_item01.png')}}" alt="img">
                                        </div>
                                        <div class="ingredients-content">
                                            <h5 class="title">Helps You Stick To Your Diet</h5>
                                            <p>A thing added to something else in order to complete or enhance it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="ingredients-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="ingredients-thumb">
                                            <img src="{{asset('public/website/assets/img/others/ingredients_item02.png')}}" alt="img">
                                        </div>
                                        <div class="ingredients-content">
                                            <h5 class="title">Only 3g Net Carbs In Every Jar</h5>
                                            <p>A thing added to something else in order to complete or enhance it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="ingredients-item wow fadeInUp" data-wow-delay=".4s">
                                        <div class="ingredients-thumb">
                                            <img src="{{asset('public/website/assets/img/others/ingredients_item03.png')}}" alt="img">
                                        </div>
                                        <div class="ingredients-content">
                                            <h5 class="title">Ingredients To Fuel Your Body</h5>
                                            <p>A thing added to something else in order to complete or enhance it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-8">
                                    <div class="ingredients-item wow fadeInUp" data-wow-delay=".5s">
                                        <div class="ingredients-thumb">
                                            <img src="{{asset('public/website/assets/img/others/ingredients_item04.png')}}" alt="img">
                                        </div>
                                        <div class="ingredients-content">
                                            <h5 class="title">Clean Ingredients Only</h5>
                                            <p>A thing added to something else in order to complete or enhance it.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- Ingredients-area-end -->

    <!-- formula-area -->
    <section class="formula-area formula-bg" data-background="{{asset('public/website/assets/img/bg/formula_bg.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="formula-img">
                        <img src="{{asset('public/website/assets/img/others/formula_img.png')}}" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="formula-content">
                        <div class="section-title white-title mb-50">
                            <p class="sub-title">.. Replenished Roots Formula ..</p>
                            <h2 class="title">Why We Chose This Formula</h2>
                        </div>
                        <ul class="formula-list list-wrap">
                            <li>Tastes like dessert without added sugars or sugar alcohols</li>
                            <li>No artificial sweeteners, dairy, say or corn fiber</li>
                            <li>10G of collagen protein from grass-fed cows</li>
                            <li>Formulated to reduce blood sugar intact</li>
                            <li>Organic almond Butter, Sunflower Lecithin</li>
                            <li>No energy crashes. Collagen Protein, Stevia</li>
                            <li>10G of collagen protein from grass-fed cows</li>
                        </ul>
                        <a href="contact.html" class="btn btn-two">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- formula-area-end -->

    <!-- pricing-area -->
    <section id="pricing" class="pricing-area gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-55">
                        <p class="sub-title">.. Replenished Roots Plans ..</p>
                        <h2 class="title">SUPPLEMENT PACKAGES</h2>
                    </div>
                </div>
            </div>
            <div class="pricing-wrap">
                <div class="row align-items-end justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="pricing-item mb-30 regular">
                            <div class="pricing__box text-center">
                                <div class="pricing-hade">
                                    <span>1 Bottle Of</span>
                                    <h3 class="title">Replenished Roots</h3>
                                    <p>(1 x 250 veggie caps bottle)</p>
                                </div>
                                <div class="pricing-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_01.png')}}" alt="img">
                                </div>
                                <div class="pricing-price">
                                    <h4 class="price">$69</h4>
                                    <span>per <br> bottle</span>
                                </div>
                                <h5 class="total">($69 TOTAL)</h5>
                                <div class="price-savings">
                                    <h4 class="save">Save 14%</h4>
                                    <span>&nbsp;</span>
                                </div>
                                <div class="pricing-btn mb-15">
                                    <a href="contact.html">Buy Now <span>365 Day Full Money Back
                                            Guaranteed</span></a>
                                </div>
                                <div class="bottom-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_bottom_img.png')}}"
                                        alt="card">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="pricing-item mb-30 popular-plan">
                            <div class="pricing-title text-center mb-10">
                                <h4 class="title">★ Most Popular ★</h4>
                            </div>
                            <div class="pricing__box text-center">
                                <div class="pricing-hade">
                                    <span>3 Bottle Of</span>
                                    <h3 class="title">Replenished Roots</h3>
                                    <p>(3 x 250 veggie caps bottle)</p>
                                </div>
                                <div class="pricing-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_02.png')}}" alt="img">
                                </div>
                                <div class="pricing-price">
                                    <h4 class="price">$59</h4>
                                    <span>per <br> bottle</span>
                                </div>
                                <h5 class="total">($179 TOTAL)</h5>
                                <div class="price-savings">
                                    <h4 class="save">Save 25%</h4>
                                    <span>+ Free Shipping</span>
                                </div>
                                <div class="pricing-btn mb-15">
                                    <a href="contact.html">Buy Now <span>365 Day Full Money Back
                                            Guaranteed</span></a>
                                </div>
                                <div class="bottom-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_bottom_img.png')}}"
                                        alt="card">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="pricing-item mb-30 best-value-plan">
                            <div class="pricing-title text-center mb-10">
                                <h4 class="title">✓ Best Value</h4>
                            </div>
                            <div class="pricing__box text-center">
                                <div class="pricing-hade">
                                    <span>6 Bottle Of</span>
                                    <h3 class="title">Replenished Roots</h3>
                                    <p>(6 x 250 veggie caps bottle)</p>
                                </div>
                                <div class="pricing-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_03.png')}}" alt="img">
                                </div>
                                <div class="pricing-price">
                                    <h4 class="price">$49</h4>
                                    <span>per <br> bottle</span>
                                </div>
                                <h5 class="total">($299 TOTAL)</h5>
                                <div class="price-savings">
                                    <h4 class="save">Save 40%</h4>
                                    <span>+ Free Shipping</span>
                                </div>
                                <div class="pricing-btn mb-15">
                                    <a href="contact.html">Buy Now <span>365 Day Full Money Back
                                            Guaranteed</span></a>
                                </div>
                                <div class="bottom-img">
                                    <img src="{{asset('public/website/assets/img/others/pricing_bottom_img.png')}}"
                                        alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area testimonial-bg"
        data-background="{{asset('public/website/assets/img/bg/testimonial_bg.jpg')}}">
        <div class="testimonial-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-9 col-lg-11">
                    <div class="testimonial-active">
                        <div class="testimonial-item text-center">
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p>“Becoming more involved in administration within the (MidMichigan) health system over
                                the years, I had been researching options for further education that would assist in
                                this transition and fit my busy schedule</p>
                            <div class="testimonial-avatar-wrap">
                                <div class="testi-avatar-img">
                                    <img src="{{asset('public/website/assets/img/others/testi_avatar01.jpg')}}"
                                        alt="img">
                                </div>
                                <div class="testi-avatar-info">
                                    <h5 class="name">Janeta Cooper</h5>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p>“Becoming more involved in administration within the (MidMichigan) health system over
                                the years, I had been researching options for further education that would assist in
                                this transition and fit my busy schedule</p>
                            <div class="testimonial-avatar-wrap">
                                <div class="testi-avatar-img">
                                    <img src="{{asset('public/website/assets/img/others/testi_avatar02.jpg')}}"
                                        alt="img">
                                </div>
                                <div class="testi-avatar-info">
                                    <h5 class="name">Lempor Kooper</h5>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="testimonial-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p>“Becoming more involved in administration within the (MidMichigan) health system over
                                the years, I had been researching options for further education that would assist in
                                this transition and fit my busy schedule</p>
                            <div class="testimonial-avatar-wrap">
                                <div class="testi-avatar-img">
                                    <img src="{{asset('public/website/assets/img/others/testi_avatar03.jpg')}}"
                                        alt="img">
                                </div>
                                <div class="testi-avatar-info">
                                    <h5 class="name">Zonalos Neko</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- blog-post-area -->
    <!-- <section id="news" class="blog-post-area">
            <div class="container">
                <div class="blog-inner-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10">
                            <div class="blog-posts-wrapper">
                                <div class="section-title mb-50">
                                    <p class="sub-title">.. Replenished Roots News ..</p>
                                    <h2 class="title">Latest News</h2>
                                </div>
                                <div class="blog-post-item">
                                    <a href="blog-details.html">
                                        <div class="blog-post-thumb" data-background="{{asset('public/website/assets/img/blog/post_thumb01.jpg')}}">
                                        </div>
                                    </a>
                                    <div class="blog-post-content">
                                        <div class="content-top">
                                            <div class="tags"><a href="#">Tips & Tricks</a></div>
                                            <span class="date"><i class="far fa-clock"></i> 12 Days ago</span>
                                        </div>
                                        <h3 class="title"><a href="blog-details.html">hOW MUCH DO EAT YOU REALLY
                                                NEED...</a></h3>
                                        <div class="content-bottom">
                                            <ul class="list-wrap">
                                                <li class="user">Post By - <a href="#">Admin</a></li>
                                                <li class="comments"><i class="far fa-envelope"></i> 24</li>
                                                <li class="viewers"><i class="far fa-eye"></i> 77k</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-post-item">
                                    <a href="blog-details.html">
                                        <div class="blog-post-thumb" data-background="{{asset('public/website/assets/img/blog/post_thumb02.jpg')}}">
                                        </div>
                                    </a>
                                    <div class="blog-post-content">
                                        <div class="content-top">
                                            <div class="tags"><a href="#">Tips & Tricks</a></div>
                                            <span class="date"><i class="far fa-clock"></i> 12 Days ago</span>
                                        </div>
                                        <h3 class="title"><a href="blog-details.html">Supplementing your diet tOWARDS
                                                ...</a></h3>
                                        <div class="content-bottom">
                                            <ul class="list-wrap">
                                                <li class="user">Post By - <a href="#">Admin</a></li>
                                                <li class="comments"><i class="far fa-envelope"></i> 29</li>
                                                <li class="viewers"><i class="far fa-eye"></i> 87k</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-post-item">
                                    <a href="blog-details.html">
                                        <div class="blog-post-thumb" data-background="{{asset('public/website/assets/img/blog/post_thumb03.jpg')}}">
                                        </div>
                                    </a>
                                    <div class="blog-post-content">
                                        <div class="content-top">
                                            <div class="tags"><a href="#">Tips & Tricks</a></div>
                                            <span class="date"><i class="far fa-clock"></i> 12 Days ago</span>
                                        </div>
                                        <h3 class="title"><a href="blog-details.html">Dietary Supplement report
                                                market...</a></h3>
                                        <div class="content-bottom">
                                            <ul class="list-wrap">
                                                <li class="user">Post By - <a href="#">Admin</a></li>
                                                <li class="comments"><i class="far fa-envelope"></i> 29</li>
                                                <li class="viewers"><i class="far fa-eye"></i> 87k</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-10">
                            <div class="faq-wrapper">
                                <div class="section-title mb-50">
                                    <p class="sub-title">.. Ask Question ..</p>
                                    <h2 class="title">Get Every Answers</h2>
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item active-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <span class="count">01.</span> Replenished Roots ingredients provides a
                                                searchable ?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                There are many variations of passages of lorem ipsum that available but
                                                the majority have alteration in some form by injected humour. There are
                                                many variations of passages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <span class="count">02.</span> How to edit Replenished Roots themes ?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                There are many variations of passages of lorem ipsum that available but
                                                the majority have alteration in some form by injected humour. There are
                                                many variations of passages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <span class="count">03.</span> Replenished Roots app is a powerful
                                                application ?
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                There are many variations of passages of lorem ipsum that available but
                                                the majority have alteration in some form by injected humour. There are
                                                many variations of passages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <span class="count">04.</span> Latest version thorough Replenished Roots
                                                powerful ?
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                There are many variations of passages of lorem ipsum that available but
                                                the majority have alteration in some form by injected humour. There are
                                                many variations of passages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <span class="count">05.</span> How to Track My Order ?
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                There are many variations of passages of lorem ipsum that available but
                                                the majority have alteration in some form by injected humour. There are
                                                many variations of passages.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-bg-shape one"></div>
            <div class="blog-bg-shape two"></div>
        </section> -->
    <!-- blog-post-area-end -->

</main>
@endsection