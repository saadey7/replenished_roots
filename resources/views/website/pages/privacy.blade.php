@extends('website.layouts.layout')
@section('title')
Privacy Policy
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Privacy Policy</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{url('/')}}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Privacy Policy</span></li>
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

    <!-- privacy-policy-area -->
    <section class="contact-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content">
                        <h2 class="mb-4">Privacy Policy</h2>

                        <h4>1. Introduction</h4>
                        <p>a. This Privacy Policy (“Policy”) applies to the collection and processing of personal data (“Personal Data”) by <strong>ReplenishedRoot</strong> (“we”, “our”, “us”) in connection with our website and services. This Policy explains how we collect, use, and protect your Personal Data.</p>
                        <p>b. By visiting our website or purchasing something from us, you agree to the terms of this Privacy Policy.</p>

                        <h4>2. Personal Data We Collect</h4>
                        <p>a. Personal Data means any information that can identify an individual. It does not include anonymous data where the identity has been removed (e.g., IP address logs).</p>
                        <p>b. Information you may provide through our website includes:</p>
                        <ul>
                            <li><strong>Contact Data:</strong> your name, email, billing address, shipping address, and phone number.</li>
                            <li><strong>Profile Data:</strong> username and password (if you create an account).</li>
                            <li><strong>Communications:</strong> questions, feedback, or messages shared through our website, email, or social media (including WhatsApp, Instagram, and Facebook).</li>
                            <li><strong>Transactional Data:</strong> details about your orders, invoices, and payment history.</li>
                        </ul>

                        <h4>3. How We Use Your Personal Data</h4>
                        <p>We use your information to:</p>
                        <ul>
                            <li>a. Provide products and services offered by ReplenishedRoot.</li>
                            <li>b. Respond to inquiries, requests, and feedback.</li>
                            <li>c. Improve our website, services, and customer experience.</li>
                            <li>d. Process payments securely and prevent fraud.</li>
                            <li>e. Fulfill our legal and financial obligations.</li>
                            <li>f. Send newsletters, updates, or promotions (if you have opted in).</li>
                            <li>g. Handle disputes or enforce our agreements.</li>
                        </ul>

                        <h4>4. Sharing Your Personal Data</h4>
                        <p>To deliver our services, we may share your Personal Data with trusted third parties, including:</p>
                        <ul>
                            <li>Payment Processors & Financial Institutions (to process secure payments).</li>
                            <li>Courier/Logistics Providers (for product delivery).</li>
                            <li>Business Service Providers (such as web hosting or analytics platforms).</li>
                            <li>Regulatory Authorities (where legally required).</li>
                        </ul>
                        <p>We do not sell your Personal Data.</p>

                        <h4>5. Protecting Your Personal Data</h4>
                        <p>a. We take reasonable steps to secure your Personal Data through organizational, technical, and administrative safeguards.</p>
                        <p>b. If a data breach occurs, we will notify you and relevant regulators where required by law.</p>

                        <h4>6. Data Retention</h4>
                        <p>a. We keep your Personal Data only for as long as necessary to fulfill the purposes set out in this Policy, including compliance with legal and financial obligations.</p>
                        <p>b. If you maintain an account with us, we retain your information while your account is active or until you request deletion. Some data may be kept for legal or reporting purposes.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- privacy-policy-area-end -->

</main>
@endsection