@extends('website.layouts.layout')
@section('title')
Cart
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Cart Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Cart</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one"><img src="assets/img/others/video_shape01.png" alt="shape"></div>
        <div class="video-shape two"><img src="assets/img/others/video_shape02.png" alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- cart-area -->
    <div class="cart__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table cart__table">
                        <thead>
                            <tr>
                                <th class="product__thumb">&nbsp;</th>
                                <th class="product__name">Product</th>
                                <th class="product__price">Price</th>
                                <th class="product__quantity">Quantity</th>
                                <th class="product__subtotal">Subtotal</th>
                                <th class="product__remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product__thumb">
                                    <a href="shop-details.html"><img src="assets/img/products/home_shop_thumb01.png"
                                            alt=""></a>
                                </td>
                                <td class="product__name">
                                    <a href="shop-details.html">Antiaging and Longevity</a>
                                </td>
                                <td class="product__price">$13.00</td>
                                <td class="product__quantity">
                                    <div class="quickview-cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="product__subtotal">$13.00</td>
                                <td class="product__remove">
                                    <a href="#">×</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="product__thumb">
                                    <a href="shop-details.html"><img src="assets/img/products/home_shop_thumb02.png"
                                            alt=""></a>
                                </td>
                                <td class="product__name">
                                    <a href="shop-details.html">Time to Explore</a>
                                </td>
                                <td class="product__price">$19.00</td>
                                <td class="product__quantity">
                                    <div class="quickview-cart-plus-minus">
                                        <input type="text" value="1">
                                    </div>
                                </td>
                                <td class="product__subtotal">$19.00</td>
                                <td class="product__remove">
                                    <a href="#">×</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="cart__actions">
                                    <form action="#" class="cart__actions-form">
                                        <input type="text" placeholder="Coupon code">
                                        <button type="submit" class="btn btn-sm">Apply coupon</button>
                                    </form>
                                    <div class="update__cart-btn text-end f-right">
                                        <button type="submit" class="btn btn-sm">Update cart</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="cart__collaterals-wrap">
                        <h2 class="title">Cart totals</h2>
                        <ul class="list-wrap">
                            <li>Subtotal <span>$32.00</span></li>
                            <li>Total <span class="amount">$32.00</span></li>
                        </ul>
                        <a href="checkout.html" class="btn btn-sm">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area-end -->

</main>
@endsection