@extends('website.layouts.layout')
@section('title')
Terms and Conditions
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Terms and Conditions</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{url('/')}}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Terms and Conditions</span></li>
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

    <!-- terms-area -->
    <section class="contact-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content">
                        <h2 class="mb-4">Terms and Conditions</h2>

                        <h4>1. Introduction</h4>
                        <p>a. This website is owned and operated by <strong>Replenished Root</strong> (hereinafter referred to as “we”, “us” and “our”). Our principal place of business is located in Pakistan.</p>
                        <p>b. We offer this website, including all information, tools, products and services available from this website to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
                        <p>c. For order assistance or customer support, please contact us at <a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a>.</p>

                        <h4>2. Applicability and Updates</h4>
                        <p>a. By visiting our site and/or purchasing something from us, you engage in our “Service” and agree to be bound by these Terms and Conditions, including any additional terms referenced herein or available by hyperlink.</p>
                        <p>b. In consideration of your use of our website and services, you confirm that you are of legal age to form a binding contract and are not prohibited under the laws of Pakistan or any applicable jurisdiction.</p>
                        <p>c. We may update these Terms and Conditions from time to time. Each order you place will be subject to the latest version available on our website at that time.</p>

                        <h4>3. Terms of Usage</h4>
                        <p>a. You are prohibited from using this website or its content:</p>
                        <ul>
                            <li>for any unlawful purpose;</li>
                            <li>to solicit others to perform or participate in unlawful acts;</li>
                            <li>to violate any international, federal, provincial or state laws, rules, or regulations;</li>
                            <li>to infringe upon our intellectual property rights or those of others;</li>
                            <li>to submit false or misleading information;</li>
                            <li>to upload or transmit harmful code, malware, or anything that may disrupt website operations;</li>
                            <li>to collect personal information of others without consent;</li>
                            <li>for obscene, abusive, or discriminatory purposes.</li>
                        </ul>
                        <p>b. We reserve the right to terminate your use of the website or our services if you violate any prohibited uses.</p>

                        <h4>4. Intellectual Property</h4>
                        <p>All content, design, images, and materials on this website are the property of <strong>Replenished Root</strong>. Nothing in these Terms grants you any rights to use our intellectual property without prior written consent.</p>

                        <h4>5. Indemnity and Limitation of Liability</h4>
                        <p>a. You agree to indemnify and hold harmless Replenished Root, its affiliates, directors, employees, and partners from any claim or demand arising out of your breach of these Terms or violation of law.</p>
                        <p>b. While we make reasonable efforts to ensure accuracy, we do not guarantee that the information provided on this website is error-free or suitable for all purposes.</p>
                        <p>c. Your use of our products and services is at your own risk. We disclaim all warranties, express or implied, including fitness for a particular purpose.</p>
                        <p>d. We reserve the right to refuse or cancel any order due to stock unavailability, shipping restrictions, or circumstances beyond our control.</p>

                        <h4>6. Refund, Return & Cancellation Policy</h4>
                        <p>a. <strong>No Refund or Return:</strong> For health and safety reasons, once a box is opened, it cannot be returned or refunded.</p>
                        <p>b. <strong>No Cancellation:</strong> Orders cannot be cancelled once placed, as each order is prepared specifically according to individual medical needs.</p>
                        <p>c. If you receive a damaged or incorrect product, you must contact us within 24 hours of delivery at <a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a> with proof (photos) for review.</p>

                        <h4>7. Termination</h4>
                        <p>We may suspend or terminate your access to our services at any time, with or without notice, if you violate these Terms, provide false information, interfere with operations, or as required by law.</p>

                        <h4>8. Severability and Waiver</h4>
                        <p>If any portion of these Terms is found unenforceable, the remainder will still apply. Our failure to enforce any term is not a waiver of our rights.</p>

                        <h4>9. Governing Law</h4>
                        <p>These Terms and Conditions are governed by the laws of the Islamic Republic of Pakistan, and the courts of Pakistan will have exclusive jurisdiction over any disputes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- terms-area-end -->

</main>
@endsection