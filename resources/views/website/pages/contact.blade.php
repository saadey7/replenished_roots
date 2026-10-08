@extends('website.layouts.layout')
@section('title')
Contact Us
@endsection
@section('content')
<section class="bannr-section" style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
    <div class="container">
        <div class="bannr-text">
            <h2>Contact Us</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li aria-current="page" class="breadcrumb-item active">Contact Us</li>
            </ol>
        </div>
    </div>
    <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
    <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
    <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
</section>
<div class="gap footer-help contact-page">
    <div class="container">
        <div class="need-help">
            <h2>Need help?</h2>
            <p>Our customer service team will be happy to assist you.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="content-us">
                    <span>Email:</span>
                    <a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a>
                    <h6>Customer support via email</h6>
                    <i>
                        <svg height="682.66669" version="1.1" viewbox="0 0 682.66669 682.66669" width="682.66669"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <clippath clippathunits="userSpaceOnUse">
                                    <path d="M 0,512 H 512 V 0 H 0 Z"></path>
                                </clippath>
                            </defs>
                            <g transform="matrix(1.3333333,0,0,-1.3333333,0,682.66667)">
                                <g>
                                    <g clip-path="url(#clipPath3824)">
                                        <g transform="translate(409.9102,69.6396)">
                                            <path
                                                d="m 0,0 c 0,-32.939 -26.7,-59.64 -59.641,-59.64 h -64.599 c -22.59,0 -43.24,12.76 -53.34,32.97 L -190.92,0 -220.74,-59.64 -250.561,0 -280.38,-59.64 -310.2,0 -340.021,-59.64 -369.84,0 -399.66,-59.64"
                                                style="fill:none;stroke:#000000;stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                            </path>
                                        </g>
                                        <g transform="translate(266.25,246)">
                                            <path
                                                d="m 0,0 c 0,-5.522 -4.478,-10 -10,-10 -5.522,0 -10,4.478 -10,10 0,5.522 4.478,10 10,10 C -4.478,10 0,5.522 0,0"
                                                style="fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none">
                                            </path>
                                        </g>
                                        <g transform="translate(224.9414,278.2939)">
                                            <path
                                                d="m 0,0 c -12.175,14.184 -23.106,28.649 -32.062,42.666 -7.379,11.54 -5.149,26.83 4.541,36.521 l 33.66,33.659 c 7.24,7.24 7.24,18.98 0,26.22 l -79.21,79.21 c -7.241,7.24 -18.981,7.24 -26.231,0 l -20.04,-20.05 c -32.529,-32.53 -41.33,-82.16 -20.909,-123.39 36.34,-73.35 123.1,-197.78 267.149,-268.41 41.34,-20.27 91.92,-11.67 124.481,20.88 l 20.5,20.5 c 7.239,7.25 7.239,18.99 0,26.23 l -79.91,79.2 c -7.25,7.25 -18.99,7.25 -26.231,0 l -33.66,-33.65 c -9.68,-9.69 -24.97,-11.92 -36.519,-4.54 -10.185,6.506 -20.61,14.058 -30.994,22.375"
                                                style="fill:none;stroke:#000000;stroke-width:20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="content-us">
                    <span>Location</span>
                    <h6>Pakistan</h6>
                    <i>
                        <svg data-name="Layer 1" height="512" viewbox="0 0 24 24" width="512"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m12 22.72a.74.74 0 0 1 -.53-.22l-5.76-5.76a8.9 8.9 0 1 1 12.58 0l-5.76 5.76a.74.74 0 0 1 -.53.22zm0-19.67a7.4 7.4 0 0 0 -5.23 12.63l5.23 5.23 5.23-5.23a7.4 7.4 0 0 0 -5.23-12.63z">
                            </path>
                            <path
                                d="m12 13.75a3.75 3.75 0 1 1 3.75-3.75 3.75 3.75 0 0 1 -3.75 3.75zm0-6a2.25 2.25 0 1 0 2.25 2.25 2.25 2.25 0 0 0 -2.25-2.25z">
                            </path>
                        </svg>
                    </i>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="content-us mb-0">
                    <span>Write Us</span>
                    <a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a>
                    <h6>We reply to every message</h6>
                    <i>
                        <svg style="enable-background:new 0 0 512 512;" version="1.1" viewbox="0 0 512 512" x="0px"
                            xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" y="0px">
                            <path d="M485.743,85.333H26.257C11.815,85.333,0,97.148,0,111.589V400.41c0,14.44,11.815,26.257,26.257,26.257h459.487
                        c14.44,0,26.257-11.815,26.257-26.257V111.589C512,97.148,500.185,85.333,485.743,85.333z M475.89,105.024L271.104,258.626
                        c-3.682,2.802-9.334,4.555-15.105,4.529c-5.77,0.026-11.421-1.727-15.104-4.529L36.109,105.024H475.89z M366.5,268.761
                        l111.59,137.847c0.112,0.138,0.249,0.243,0.368,0.368H33.542c0.118-0.131,0.256-0.23,0.368-0.368L145.5,268.761
                        c3.419-4.227,2.771-10.424-1.464-13.851c-4.227-3.419-10.424-2.771-13.844,1.457l-110.5,136.501V117.332l209.394,157.046
                        c7.871,5.862,17.447,8.442,26.912,8.468c9.452-0.02,19.036-2.6,26.912-8.468l209.394-157.046v275.534L381.807,256.367
                        c-3.42-4.227-9.623-4.877-13.844-1.457C363.729,258.329,363.079,264.534,366.5,268.761z">
                            </path>
                        </svg>
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="gap no-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="heading two">
                    <h6>Get in Touch</h6>
                    <h2>We’re here to help</h2>
                    <p class="pb-0">For order assistance or customer support, please contact us at
                        replenishroots@gmail.com.</p>
                </div>
                <div class="other mt-0">
                    <img alt="img" src="{{ asset('public/website/assets/img/replenished-root/white-60x60.jpg') }}" />
                    <div>
                        <h4>Replenished Root</h4>
                        <p>Customer Support</p>
                    </div>
                </div>
                <img alt="img" class="signature" src="{{ asset('public/website/assets/img/signature.png') }}" />
                <ul class="social-media two">
                    <li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter icon"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g icon"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-7">
                <div class="content-style" style="background-image:url({{ asset('public/website/assets/img/cbd-oil.jpg') }});">
                    <h3>Have Any Question?</h3>
                    <form action="{{ url('/sendMail') }}" class="content-form" method="post" id="contact-form">
                        @csrf
                        <input name="name" placeholder="Complete Name" required="" type="text" />
                        <input name="email" placeholder="Email Address" required="" type="email" />
                        <input name="phone" placeholder="Phone No" required="" type="number" />
                        <textarea name="message" placeholder="Your Message"></textarea>
                        <button class="btn" type="submit">Send Message</button>
                    </form>
                    <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
                    <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
                </div>
            </div>
        </div>
        <div class="map">
            <iframe loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d96775.64909320256!2d-74.07601284005784!3d40.7127541344881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!3m2!1d40.7127753!2d-74.0059728!4m0!5e0!3m2!1sen!2s!4v1666373583310!5m2!1sen!2s"></iframe> --}}
        </div>
    </div>
</section>
@endsection