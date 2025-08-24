@extends('website.layouts.layout')
@section('title')
Checkout
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Checkout</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Checkout</span></li>
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

    <!-- checkout-area -->
    <div class="checkout__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon__code-wrap">
                        <div class="coupon__code-info">
                            <span><i class="far fa-bookmark"></i> Have a coupon?</span>
                            <a href="#" id="coupon-element">Click here to enter your code</a>
                        </div>
                        <form action="#" class="coupon__code-form">
                            <p>If you have a coupon code, please apply it below.</p>
                            <input type="text" placeholder="Coupon code">
                            <button type="submit" class="btn btn-sm">Apply coupon</button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="{{url('/create-order')}}" method="POST" class="customer__form-wrap">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <span class="title">Billing Details</span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="first-name">First name *</label>
                                    <input type="text" id="first-name" name="firstname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="last-name">Last name *</label>
                                    <input type="text" id="last-name" name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="form-grp">
                            <label for="company-name">Company name (optional)</label>
                            <input type="text" id="company-name" name="receiver_company_name">
                        </div>
                        <div class="form-grp select-grp">
                            <label for="country-name">Country / Region *</label>
                            <select id="country-name" name="receiver_country" class="country-name">
                                <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                <option value="United States (US)">United States (US)</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Portugal">Portugal</option>
                            </select>
                        </div>
                        <div class="form-grp">
                            <label for="street-address">Street address *</label>
                            <input type="text" id="street-address" placeholder="House number and street name"
                                name="receiver_address">
                        </div>
                        <div class="form-grp">
                            <label for="town-name">Town / City *</label>
                            <input type="text" id="town-name" name="receiver_city">
                        </div>
                        <div class="form-grp select-grp">
                            <label for="district-name">District *</label>
                            <select id="district-name" name="receiver_district" class="district-name">
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="California">California</option>
                                <option value="New York">New York</option>
                            </select>
                        </div>
                        <div class="form-grp">
                            <label for="zip-code">ZIP Code *</label>
                            <input type="text" id="zip-code" name="receiver_zipCode">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="phone">Phone *</label>
                                    <input type="number" id="phone" name="receiver_phoneNo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name="receiver_email">
                                </div>
                            </div>
                        </div>
                        <span class="title title-two">Additional Information</span>
                        <div class="form-grp">
                            <label for="note">Order notes (optional)</label>
                            <textarea id="note" name="comment"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="order__info-wrap">
                            <h2 class="title">YOUR ORDER</h2>
                            <ul class="list-wrap">
                                <li class="title">Product <span>Subtotal</span></li>
                                @foreach ($getCarts as $item)
                                <li>{{$item->product->name}} × {{$item->quantity}} <span>${{$item->total}}</span></li>
                                @endforeach
                                <li>Subtotal <span>${{$getCarts->sum('total')}}</span></li>
                                <li>Total <span>${{$getCarts->sum('total')}}</span></li>
                            </ul>
                            <p>Sorry, it seems that there are no available payment methods for your state. Please
                                contact us if you require assistance or wish to make alternate arrangements.</p>
                            <p>Your personal data will be used to process your order, support your experience throughout
                                this website, and for other purposes described in our <a href="#">privacy policy.</a>
                            </p>
                            <button type="submit" class="btn btn-sm">Place order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout-area-end -->

</main>
@endsection