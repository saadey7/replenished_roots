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
                    <form id="cart-form" action="{{ url('/cartUpdate') }}" method="POST">
                        @csrf
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
                                    <td>${{ $item->unit_price }}</td>
                                    <td class="product__quantity">
                                        <!-- OLD DESIGN restored -->
                                        <div class="quickview-cart-plus-minus">
                                            <input type="text" name="quantities[{{ $item->id }}]"
                                                value="{{ $item->quantity }}" class="qty-input">
                                        </div>
                                    </td>
                                    <td class="product__subtotal">${{ $item->total }}</td>
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
                    </form>
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

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    // === Update Row Subtotal ===
    function updateRowSubtotal(row) {
        let qtyInput = row.querySelector(".qty-input");
        let unitPrice = parseFloat(row.dataset.unitPrice);
        let quantity = parseInt(qtyInput.value) || 1;
        let subtotalCell = row.querySelector(".product__subtotal");

        let subtotal = (unitPrice * quantity).toFixed(2);
        subtotalCell.textContent = "$" + subtotal;

        updateCartTotals();
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

    // === Quantity input changes ===
    document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("input", function() {
            if (this.value < 1) this.value = 1;
            updateRowSubtotal(this.closest("tr"));
        });
    });

    // === AJAX Update Cart ===
    document.getElementById("cart-form").addEventListener("submit", function(e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);
        let updateBtn = document.getElementById("update-cart-btn");

        updateBtn.disabled = true;
        updateBtn.textContent = "Updating...";

        fetch(form.action, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    updateCartTotals();
                    alert(data.message);
                }
            })
            .catch(err => {
                console.error("Update error:", err);
                alert("Something went wrong. Try again!");
            })
            .finally(() => {
                updateBtn.disabled = false;
                updateBtn.textContent = "Update cart";
            });
    });

});
</script>
@endsection