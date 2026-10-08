@extends('website.layouts.layout')
@section('title')
Checkout
@endsection
@section('content')
<style>
    .country-name .list{
        height: 300px;
        overflow: scroll;
        box-shadow: 0px 13px 31px 11px #ccc;
    }
    .district-name .list{
        height: 300px;
        overflow: scroll;
        box-shadow: 0px 13px 31px 11px #ccc;
    }
</style>
    <section class="bannr-section" style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
        <div class="container">
            <div class="bannr-text">
                <h2>Checkout</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/cart') }}">Cart</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
        <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
        <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
        <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
    </section>

    <section class="gap">
        <div class="container">
            <form action="{{ url('/create-order') }}" method="POST" class="checkout-meta donate-page">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="pb-3">Billing details</h3>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="input-text" id="first-name" name="firstname"
                                        placeholder="First name *" type="text" value="{{ old('firstname') }}" required />
                                </div>
                                <div class="col-lg-6">
                                    <input class="input-text" id="last-name" name="lastname"
                                        placeholder="Last name *" type="text" value="{{ old('lastname') }}" required />
                                </div>
                            </div>
                            <input class="input-text" id="company-name" name="receiver_company_name"
                                placeholder="Company name (optional)" type="text" value="{{ old('receiver_company_name') }}" />
                            <input class="input-text" id="email" name="receiver_email"
                                placeholder="Email address *" type="email" value="{{ old('receiver_email') }}" required />

                            <select class="nice-select Advice country_to_state country-name" id="country-name"
                                name="receiver_country" required>
                                @foreach($getCountries as $country)
                                <option value="{{ $country->name }}" data-id="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>

                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="input-text" id="town-name" name="receiver_city"
                                        placeholder="Town / City *" type="text" value="{{ old('receiver_city') }}" required />
                                </div>
                                <div class="col-lg-6">
                                    <select class="nice-select Advice city district-name" id="district-name"
                                        name="receiver_district" required>
                                        <option value="">Select City/District</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input id="zip-code" name="receiver_zipCode" placeholder="ZIP Code *"
                                        type="text" value="{{ old('receiver_zipCode') }}" required />
                                </div>
                                <div class="col-lg-6">
                                    <input class="input-text" id="phone" name="receiver_phoneNo"
                                        placeholder="Phone *" type="tel" value="{{ old('receiver_phoneNo') }}" required />
                                </div>
                            </div>
                            <input id="street-address" name="receiver_address"
                                placeholder="House number and street name *" type="text"
                                value="{{ old('receiver_address') }}" required />
                        </div>
                        <div class="woocommerce-additional-fields">
                            <textarea class="input-text" id="note" name="comment"
                                placeholder="Order notes (optional), e.g. special notes for delivery.">{{ old('comment') }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="cart_totals-checkout" style="background-image: url({{ asset('public/website/assets/img/cbd-oil.jpg') }});">
                            <div class="cart_totals cart-Total">
                                <h4 class="pt-0">Cart Total</h4>
                                <table class="shop_table_responsive">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal:</th>
                                            <td>
                                                <span class="woocommerce-Price-amount">
                                                    <bdi>{{ $getCarts->first()->product->currency }}. {{ round($getCarts->sum('total'), 2) }}</bdi>
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
                                                    <bdi>{{ $getCarts->first()->product->currency }}. {{ round($getCarts->sum('total'), 2) }}</bdi>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout-side">
                                <h4>Payment Method</h4>
                                <ul>
                                    {{-- Cash on Delivery (temporarily disabled)
                                    <li>
                                        <input id="cash-on-delivery" name="payment_method" type="radio"
                                            value="cod" />
                                        <label for="cash-on-delivery">Cash on Delivery</label>
                                    </li>
                                    --}}
                                    <li>
                                        <input id="card-payment" name="payment_method" type="radio"
                                            value="card" checked required />
                                        <label for="card-payment">Card Payment</label>
                                    </li>
                                </ul>
                                <button class="btn" type="submit"><span>Place Order</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('page-script')
<script>
    window.addEventListener('load', function () {

        var countrySelect  = document.getElementById('country-name');
        var districtSelect = document.getElementById('district-name');
        var lastCountryId  = null;

        function refreshNiceSelect() {
            if (window.jQuery && jQuery.fn.niceSelect) {
                jQuery('#district-name').niceSelect('update');
            }
        }

        function loadCities() {
            var opt = countrySelect.options[countrySelect.selectedIndex];
            var countryId = opt ? opt.getAttribute('data-id') : null;
            if (!countryId || countryId === lastCountryId) return;
            lastCountryId = countryId;

            districtSelect.innerHTML = '<option value="">Loading...</option>';
            refreshNiceSelect();

            fetch("{{ url('/get-cities') }}/" + countryId, {
                headers: { "Accept": "application/json" }
            })
            .then(function (res) { return res.json(); })
            .then(function (res) {
                var html = '<option value="">Select City/District</option>';
                (Array.isArray(res) ? res : Object.values(res)).forEach(function (city) {
                    html += '<option value="' + city.name + '" data-id="' + city.id + '">' + city.name + '</option>';
                });
                districtSelect.innerHTML = html;
                refreshNiceSelect();
            })
            .catch(function (err) {
                console.error('Cities load failed:', err);
                districtSelect.innerHTML = '<option value="">Select City/District</option>';
                refreshNiceSelect();
                lastCountryId = null;
            });
        }

        if (window.jQuery) {
            jQuery('#country-name').on('change', loadCities);
        } else {
            countrySelect.addEventListener('change', loadCities);
        }

        // Load cities for the default selected country
        loadCities();
    });
</script>
@endsection