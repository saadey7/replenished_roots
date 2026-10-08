@extends('website.layouts.layout')
@section('title')
Shipping, Complaints, Cancellations and Return/Refund Policy
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Shipping, Complaints, Cancellations and Return/Refund Policy</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{url('/')}}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end">
                                    <span>Shipping & Policies</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one">
            <img src="{{asset('public/website/assets/img/others/video_shape01.png')}}" alt="shape">
        </div>
        <div class="video-shape two">
            <img src="{{asset('public/website/assets/img/others/video_shape02.png')}}" alt="shape">
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- policy-area -->
    <section class="contact-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content">
                        <h2 class="mb-4">Shipping, Complaints, Cancellations and Return/Refund Policy</h2>

                        <h4>Shipping</h4>
                        <h5>1. Domestic Shipping</h5>
                        <p>a. We deliver orders within Pakistan using reputable courier companies such as <strong>TCS, Leopards Courier,</strong> and <strong>Call Courier</strong>.</p>
                        <p>b. Orders will be delivered to the shipping address provided at checkout within <strong>3–7 working days</strong>. This is an estimated timeline and Replenished Root shall not be held responsible for courier delays or events beyond our control.</p>

                        <h5>2. International Shipping</h5>
                        <p>a. We deliver orders outside of Pakistan using trusted courier companies such as <strong>DHL, FedEx,</strong> and <strong>UPS</strong>.</p>
                        <p>b. Orders are typically delivered within <strong>7–21 working days</strong>, depending on the destination country and courier processing. Delays may occur due to customs or other international regulations outside our control.</p>
                        <p>c. Customers are responsible for any applicable <strong>customs duties, import taxes,</strong> or additional fees imposed by their local authorities.</p>

                        <h4>Complaints</h4>
                        <p>For any complaints, queries, or feedback regarding our website, products, or services, please contact us at:</p>
                        <p>📧 <a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a></p>
                        <p>We aim to respond to all complaints within <strong>3 working days</strong>.</p>
                        <p>If your complaint is related to a defective or incorrect product, please provide clear evidence such as receipts, photographs, or unboxing videos.</p>

                        <h4>Cancellations</h4>
                        <p>Orders can be <strong>cancelled within 24 hours</strong> of placement. After this period, cancellations cannot be accepted as processing begins immediately.</p>

                        <h4>Returns, Exchanges, and Refunds</h4>
                        <p>Replenished Root follows a <strong>no-return, no-exchange, and no-refund policy</strong> except in cases where the product you receive is defective, damaged, or different from what you ordered.</p>
                        <ul>
                            <li>Approved returns must be shipped to our official warehouse address (details provided upon approval of return request).</li>
                            <li>Returns must be initiated within <strong>7 days</strong> of receiving your order.</li>
                            <li>Returned products must be in <strong>unused, original condition</strong> with packaging intact.</li>
                            <li>Refunds (where approved) will be processed within <strong>7–10 working days</strong> after we receive and inspect the returned items.</li>
                            <li>Instead of a refund, we may issue <strong>store credit</strong> for use against future purchases.</li>
                            <li>Customers are responsible for all return shipping costs. Shipping charges are <strong>non-refundable</strong>. If a refund is approved, return shipping costs will be deducted from the refund amount.</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- policy-area-end -->

</main>
@endsection