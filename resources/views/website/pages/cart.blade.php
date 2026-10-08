{{-- @extends('website.layouts.layout')

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
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item active"><span>Cart</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- cart-area -->
    <div class="cart__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Cart Form -->
                    <!--<form id="cart-form" action="{{ url('/cartUpdate') }}" method="POST">-->
                        <!--@csrf-->
                        <table class="table cart__table">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getCarts as $item)
                                <tr data-cart-id="{{ $item->id }}" data-unit-price="{{ $item->unit_price }}">
                                    <td>
                                        <a href="{{ url('product-detail/'.$item->product->product_id) }}">
                                            <img src="{{ $item->product->images[0]->image ?? asset('public/images/logo.png') }}"
                                                alt="" style="width: 60px; height:auto;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('product-detail/'.$item->product->product_id) }}">
                                            {{ $item->product->name }}
                                        </a>
                                    </td>
                                    <td>{{$item->product->currency}}{{ $item->unit_price }}</td>
                                    <td class="product__quantity">
                                        <!-- OLD DESIGN restored -->
                                        <div class="quickview-cart-plus-minus">
                                            <input type="text" name="quantities[{{ $item->id }}]" data-id="{{$item->id}}"
                                                value="{{ $item->quantity }}" class="qty-input">
                                        </div>
                                    </td>
                                    <td class="product__subtotal">{{$item->product->currency}}{{ $item->total }}</td>
                                    <td>
                                        <a href="{{url('remove_cart_item')}}/{{ $item->id }}" class="remove-item"
                                            data-id="{{ $item->id }}">×</a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end">
                                        <button type="submit" id="update-cart-btn" class="btn btn-sm">Update
                                            cart</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!--</form>-->
                </div>

                <!-- Cart Totals -->
                <div class="col-lg-4">
                    <div class="cart__collaterals-wrap">
                        <h2 class="title">Cart totals</h2>
                        <ul class="list-wrap">
                            <li>Subtotal <span id="cart-subtotal">${{ $getCarts->sum('total') }}</span></li>
                            <li>Total <span id="cart-total" class="amount">${{ $getCarts->sum('total') }}</span></li>
                        </ul>
                        <a href="{{ url('checkout') }}" class="btn btn-sm">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area-end -->

</main>
@endsection

@section('page-script')
<script>
    document.addEventListener("DOMContentLoaded", function () {

    // === Update Row Subtotal ===
    function updateRowSubtotal(row) {
        let qtyInput = row.querySelector(".qty-input");
        let unitPrice = parseFloat(row.dataset.unitPrice);
        let quantity = parseInt(qtyInput.value) || 1;
        let subtotalCell = row.querySelector(".product__subtotal");

        let subtotal = (unitPrice * quantity).toFixed(2);
        subtotalCell.textContent = "$" + subtotal;
    }

    // === Update Cart Totals ===
    function updateCartTotals() {
        let total = 0;
        document.querySelectorAll("tr[data-cart-id]").forEach(row => {
            let qty = parseInt(row.querySelector(".qty-input").value) || 1;
            let price = parseFloat(row.dataset.unitPrice);
            total += qty * price;
        });

        document.getElementById("cart-subtotal").textContent = "$" + total.toFixed(2);
        document.getElementById("cart-total").textContent = "$" + total.toFixed(2);
    }

    // === Send AJAX Request to Backend ===
    function ajaxUpdateCart(id, qty) {
        console.log('function run', id, qty);
        let quantities = {};
        document.querySelectorAll("tr[data-cart-id]").forEach(row => {
            let id = row.dataset.cartId;
            let qty = row.querySelector(".qty-input").value;
            quantities[id] = qty;
        });
        fetch("{{ url('/cartUpdate') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                quantities: quantities
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data.message);
        });
    }

    // === Input Change Event ===
    document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("input", function () {
            if (this.value < 1) this.value = 1;
            let row = this.closest("tr");
            updateRowSubtotal(row);
            updateCartTotals();
            ajaxUpdateCart(this.dataset.id, this.value);
        });
    });

    // === Plus / Minus Buttons (from quickview-cart-plus-minus) ===
    document.querySelectorAll(".quickview-cart-plus-minus").forEach(wrapper => {
        let input = wrapper.querySelector(".qty-input");
        let row = wrapper.closest("tr");

        wrapper.addEventListener("click", function (e) {
            console.log('checkinput value', parseInt(input.value));
            if (e.target.classList.contains("inc")) {
                input.value = parseInt(input.value);
            } else if (e.target.classList.contains("dec")) {
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value);
                }
            } else {
                return;
            }
            updateRowSubtotal(row);
            updateCartTotals();
            ajaxUpdateCart(input.dataset.id, input.value);
        });
    });

});

</script>
@endsection --}}
@extends('website.layouts.layout')

@section('title')
    Cart
@endsection

@section('content')
    <section class="bannr-section"
        style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
        <div class="container">
            <div class="bannr-text">
                <h2>Shop Cart</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Shop Cart</li>
                </ol>
            </div>
        </div>
        <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
        <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
        <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
    </section>

    <section class="gap">
        <div class="container">
            <form class="woocommerce-cart-form" id="cart-form" onsubmit="return false;">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="overflow-x:auto;overflow-y: hidden;">
                            <table class="shop_table table-responsive">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product Detail</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($getCarts as $item)
                                        <tr class="product" data-cart-id="{{ $item->id }}"
                                            data-unit-price="{{ $item->unit_price }}"
                                            data-currency="{{ $item->product->currency }}">
                                            <td class="product-name">
                                                <a href="{{ url('product-detail/' . $item->product->product_id) }}">
                                                    <img alt="{{ $item->product->name }}"
                                                        src="{{ $item->product->images[0]->image ?? asset('public/images/logo.png') }}"
                                                        style="width: 77px; height: auto;" />
                                                </a>
                                                <div>
                                                    <a href="{{ url('product-detail/' . $item->product->product_id) }}">
                                                        <span>{{ $item->product->name }}</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <span class="woocommerce-Price-amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">{{ $item->product->currency }}</span>{{ $item->unit_price }}</bdi>
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <input class="input-text qty-input" min="1" type="number"
                                                    name="quantities[{{ $item->id }}]" data-id="{{ $item->id }}"
                                                    value="{{ $item->quantity }}" />
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="woocommerce-Price-amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">{{ $item->product->currency }}</span><span
                                                            class="row-subtotal">{{ $item->total }}</span></bdi></span>
                                            </td>
                                            <td class="product-remove">
                                                <a href="{{ url('remove_cart_item') }}/{{ $item->id }}"
                                                    class="remove-item" data-id="{{ $item->id }}">×</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Your cart is empty.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if($getCarts->count() > 0)
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <a class="btn" href="{{ url('checkout') }}">Proceed To Checkout</a>
                                                <button type="button" class="btn update-cart" id="update-cart-btn">Update
                                                    Cart</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                    @if($getCarts->count() > 0)
                    <div class="col-lg-5">
                        <div class="coupon-area">
                            <h3>Apply Coupon</h3>
                            <div class="coupon">
                                <input class="input-text" name="coupon_code" placeholder="Coupon code" type="text" />
                                <button class="btn" name="apply_coupon" type="button"><span>Apply coupon</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="cart_totals">
                            <h4>Cart Totals</h4>
                            <table class="shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal:</th>
                                        <td>
                                            <span class="woocommerce-Price-amount">
                                                <bdi id="cart-subtotal">${{ $getCarts->sum('total') }}</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="Shipping">
                                        <th>Shipping:</th>
                                        <td>
                                            <span class="woocommerce-Price-amount amount">included</span>
                                        </td>
                                    </tr>
                                    <tr class="Total">
                                        <th>Total:</th>
                                        <td>
                                            <span class="woocommerce-Price-amount">
                                                <bdi id="cart-total" class="amount">${{ $getCarts->sum('total') }}</bdi>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a class="btn" href="{{ url('checkout') }}">
                                    <span>Proceed to checkout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </section>
@endsection

@section('page-script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // === Update Row Subtotal ===
            function updateRowSubtotal(row) {
                let qtyInput = row.querySelector(".qty-input");
                let unitPrice = parseFloat(row.dataset.unitPrice);
                let quantity = parseInt(qtyInput.value) || 1;
                let subtotalCell = row.querySelector(".row-subtotal");

                subtotalCell.textContent = (unitPrice * quantity).toFixed(2);
            }

            // === Update Cart Totals ===
            function updateCartTotals() {
                let total = 0;
                let currency = "$";
                document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                    let qty = parseInt(row.querySelector(".qty-input").value) || 1;
                    let price = parseFloat(row.dataset.unitPrice);
                    total += qty * price;
                    if (row.dataset.currency) currency = row.dataset.currency;
                });

                document.getElementById("cart-subtotal").textContent = currency + total.toFixed(2);
                document.getElementById("cart-total").textContent = currency + total.toFixed(2);
            }

            // === Send AJAX Request to Backend ===
            function ajaxUpdateCart() {
                let quantities = {};
                document.querySelectorAll("tr[data-cart-id]").forEach(row => {
                    quantities[row.dataset.cartId] = row.querySelector(".qty-input").value;
                });

                return fetch("{{ url('/cartUpdate') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            quantities: quantities
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log(data.message);
                    })
                    .catch(err => {
                        console.error('Cart update failed:', err);
                    });
            }

            // === Quantity change ===
            document.querySelectorAll(".qty-input").forEach(input => {
                input.addEventListener("input", function() {
                    if (this.value < 1) this.value = 1;
                    let row = this.closest("tr");
                    updateRowSubtotal(row);
                    updateCartTotals();
                    ajaxUpdateCart();
                });
            });

            // === Update Cart button ===
            // (delegated, so it works even if the theme JS re-renders the button)
            document.addEventListener("click", function(e) {
                let btn = e.target.closest("#update-cart-btn, .update-cart");
                if (!btn) return;
                e.preventDefault();
                console.log("Update cart clicked");
                ajaxUpdateCart().finally(() => window.location.reload());
            });

        });
    </script>
@endsection
