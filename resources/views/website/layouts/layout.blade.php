<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Replenished Root | Seed Cycling Blends</title>
    <link href="{{asset('public/website/assets/img/favicon.png')}}" rel="icon" />
    <link href="{{asset('public/website/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/website/assets/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/website/assets/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/website/assets/css/slick.css')}}" rel="stylesheet" />
    <link href="{{asset('public/website/assets/css/slick-theme.css')}}" rel="stylesheet" />
    <!-- fancybox -->
    <link href="{{asset('public/website/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/website/assets/css/nice-select.css')}}" rel="stylesheet" />
    <link href="{{asset('public/website/assets/css/splitting.css')}}" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link href="{{asset('public/website/assets/css/fontawesome.min.css')}}" rel="stylesheet" />
    <!-- style -->
    <link href="{{asset('public/website/assets/css/style.css')}}" rel="stylesheet" />
    <!-- responsive -->
    <link href="{{asset('public/website/assets/css/responsive.css')}}" rel="stylesheet" />
    <script src="{{asset('public/website/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('public/website/assets/js/preloader.js')}}"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-database.js"></script>
    <script>
        // Your Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyCF8mKFD_u2JxKJWH9Pka7JuZVWYrYQB-g",
            authDomain: "replenished-607cb.firebaseapp.com",
            databaseURL: "https://replenished-607cb-default-rtdb.firebaseio.com/",
            projectId: "replenished-607cb",
            storageBucket: "replenished-607cb.firebasestorage.app",
            messagingSenderId: "420146780341",
            appId: "1:420146780341:web:1388200fb9384ebd3106fc",
            measurementId: "G-Z50MQPNTX8"
        };
        
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
    <style>
        .user-dropdown { position: relative; display: inline-block; }
        .user-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            min-width: 160px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
            padding: 10px;
            z-index: 999;
        }
        .user-menu.show { display: block; }
        .user-menu-name { display: block; padding: 6px 10px; font-weight: 600; color: #333; border-bottom: 1px solid #eee; margin-bottom: 6px; }
        .user-menu-btn { display: block; width: 100%; text-align: left; background: none; border: 0; padding: 8px 10px; color: #008136; font-weight: 600; cursor: pointer; text-decoration: none; }
        .user-menu-btn:hover { background: #f3f3f3; }
        .image-blur { filter: blur(6px); }
    </style>
</head>
@php
    $user = Auth::guard('web')->user();
    if($user){
    $getCarts = App\Models\Cart::where('user_id', $user->id)->with('product')->get();
    }else{
    $getCarts = [];
    }
@endphp
<body>
    <div class="preloader">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <!-- preloader end -->
    <header @if(Request::is('/')) class="two" @endif>
        <div style="background-color: #008136;">
            <div class="container">
                <div class="top-bar">
                    <div class="content-header">
                        <i>
                            <svg height="512" id="outline" viewbox="0 0 48 48" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m41.211 37.288a4.112 4.112 0 1 1 4.109-4.112 4.114 4.114 0 0 1 -4.109 4.112zm0-6.724a2.612 2.612 0 1 0 2.609 2.612 2.613 2.613 0 0 0 -2.609-2.612z">
                                </path>
                                <path
                                    d="m19.542 37.288a4.112 4.112 0 1 1 4.108-4.112 4.115 4.115 0 0 1 -4.108 4.112zm0-6.724a2.612 2.612 0 1 0 2.608 2.612 2.614 2.614 0 0 0 -2.608-2.612z">
                                </path>
                                <path
                                    d="m46.621 33.926h-2.051a.75.75 0 0 1 0-1.5h1.839v-3.977a3.16 3.16 0 0 0 -.4-1.536l-4.06-7.279a.4.4 0 0 0 -.349-.205h-5.533v13h1.786a.75.75 0 0 1 0 1.5h-2.536a.75.75 0 0 1 -.75-.75v-14.5a.75.75 0 0 1 .75-.75h6.283a1.9 1.9 0 0 1 1.66.974l4.059 7.28a4.662 4.662 0 0 1 .589 2.266v4.19a1.289 1.289 0 0 1 -1.287 1.287z">
                                </path>
                                <path
                                    d="m16.183 33.926h-7.191a.75.75 0 0 1 -.75-.75v-5.768a.75.75 0 0 1 1.5 0v5.018h6.441a.75.75 0 0 1 0 1.5z">
                                </path>
                                <path
                                    d="m8.992 24.747a.75.75 0 0 1 -.75-.75v-5.036a.75.75 0 0 1 1.5 0v5.039a.75.75 0 0 1 -.75.747z">
                                </path>
                                <path
                                    d="m35.317 33.926h-12.417a.75.75 0 0 1 0-1.5h11.667v-19.621h-24.825v3.089a.75.75 0 0 1 -1.5 0v-3.227a1.364 1.364 0 0 1 1.363-1.362h25.1a1.364 1.364 0 0 1 1.362 1.362v20.509a.75.75 0 0 1 -.75.75z">
                                </path>
                                <path d="m11.957 28.158h-9.519a.75.75 0 0 1 0-1.5h9.519a.75.75 0 0 1 0 1.5z"></path>
                                <path d="m19.542 24.747h-13.283a.75.75 0 0 1 0-1.5h13.283a.75.75 0 0 1 0 1.5z"></path>
                                <path d="m5.846 20.787h-5.187a.75.75 0 1 1 0-1.5h5.187a.75.75 0 0 1 0 1.5z"></path>
                                <path d="m14.163 16.644h-9.156a.75.75 0 1 1 0-1.5h9.156a.75.75 0 0 1 0 1.5z"></path>
                            </svg>
                        </i>
                        <h4>Pakistan delivery available<a href="#">See Our Shipping</a></h4>
                    </div>
                    <ul class="social-media">
                        <li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter icon"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                    <div class="collnumber">
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
                        </i><a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a>
                        <div class="login">
                            <a href="{{ url('/contact-us') }}">Email Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-bar">
            <div class="container">
                <div class="two-bar">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                @if(Request::is('/'))
                                <img alt="logo" src="{{asset('public/website/assets/img/logo-drak.png')}}" />
                                @else
                                <img alt="logo" src="{{asset('public/website/assets/img/logo.png')}}" />
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="bar-menu">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar-links">
                            <li class="navbar-dropdown">
                                <a href="{{ url('/') }}">home</a>
                                <!-- <div class="dropdown">
                                    <a href="index.html">Featured Home</a>
                                    <a href="index-2.html">Wellness</a>
                                    <a href="our-products.html">Products</a>
                                </div> -->
                            </li>
                            <li class="navbar-dropdown">
                                <a href="{{ url('/about-us') }}">About</a>
                            </li>
                            <li class="navbar-dropdown">
                                <a href="{{ url('/services') }}">Services</a>
                                <!-- <div class="dropdown">
                                    <a href="service.html">Seed Blend Guidance</a>
                                    <a href="product-details.html">Blend Details</a>
                                </div> -->
                            </li>
                            <!-- <li class="navbar-dropdown">
                                <a href="#">Pages</a>
                                <div class="dropdown">
                                    <a href="team-details.html">Product Support</a>
                                    <a href="pricing-plans.html">Pricing Plans</a>
                                    <a href="faqs.html">FAQs</a>
                                    <a href="404.html">404</a>
                                </div>
                            </li> -->
                            <li class="navbar-dropdown">
                                <!-- <span>Featured</span> -->
                                <a href="#">Shop</a>
                                <div class="dropdown">
                                    <a href="{{ url('/shop') }}">Products</a>
                                    <!-- <a href="product-details.html">Product Details</a> -->
                                    <a href="{{ url('/cart') }}">Cart</a>
                                    <!-- <a href="{{ url('/checkout') }}">Checkout</a> -->
                                </div>
                            </li>
                            <!-- <li class="navbar-dropdown">
                                <a href="#">News</a>
                                <div class="dropdown">
                                    <a href="our-blog.html">Journal</a>
                                    <a href="our-blog.html">Article</a>
                                </div>
                            </li> -->
                            <li class="navbar-dropdown">
                                <a href="{{ url('/contact-us') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="header-search">
                        <div class="header-search-button search-box-outer">
                            <a class="search-btn" href="javascript:void(0)">
                                <svg height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <g data-name="12">
                                        <path
                                            d="m21.71 20.29-2.83-2.82a9.52 9.52 0 1 0 -1.41 1.41l2.82 2.83a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zm-17.71-8.79a7.5 7.5 0 1 1 7.5 7.5 7.5 7.5 0 0 1 -7.5-7.5z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="user-dropdown">
                            <a class="user" href="javascript:void(0)" id="userToggle">
                                <i>
                                    <svg viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m437.019531 74.980469c-48.351562-48.351563-112.640625-74.980469-181.019531-74.980469s-132.667969 26.628906-181.019531 74.980469c-48.351563 48.351562-74.980469 112.640625-74.980469 181.019531s26.628906 132.667969 74.980469 181.019531c48.351562 48.351563 112.640625 74.980469 181.019531 74.980469s132.667969-26.628906 181.019531-74.980469c48.351563-48.351562 74.980469-112.640625 74.980469-181.019531s-26.628906-132.667969-74.980469-181.019531zm-325.914062 354.316406c8.453125-72.734375 70.988281-128.890625 144.894531-128.890625 38.960938 0 75.597656 15.179688 103.15625 42.734375 23.28125 23.285156 37.964844 53.6875 41.742188 86.152344-39.257813 32.878906-89.804688 52.707031-144.898438 52.707031s-105.636719-19.824219-144.894531-52.703125zm144.894531-159.789063c-42.871094 0-77.753906-34.882812-77.753906-77.753906 0-42.875 34.882812-77.753906 77.753906-77.753906s77.753906 34.878906 77.753906 77.753906c0 42.871094-34.882812 77.753906-77.753906 77.753906zm170.71875 134.425782c-7.644531-30.820313-23.585938-59.238282-46.351562-82.003906-18.4375-18.4375-40.25-32.269532-64.039063-40.9375 28.597656-19.394532 47.425781-52.160157 47.425781-89.238282 0-59.414062-48.339844-107.753906-107.753906-107.753906s-107.753906 48.339844-107.753906 107.753906c0 37.097656 18.84375 69.875 47.464844 89.265625-21.886719 7.976563-42.140626 20.308594-59.566407 36.542969-25.234375 23.5-42.757812 53.464844-50.882812 86.347656-34.410157-39.667968-55.261719-91.398437-55.261719-147.910156 0-124.617188 101.382812-226 226-226s226 101.382812 226 226c0 56.523438-20.859375 108.265625-55.28125 147.933594zm0 0"></path>
                                    </svg>
                                </i>
                            </a>
                            <div class="user-menu" id="userMenu">
                                @auth('web')
                                    <span class="user-menu-name">{{ $user->firstname }}</span>
                                    <form action="{{ url('/logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="user-menu-btn">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ url('/login') }}" class="user-menu-btn">Login</a>
                                @endauth
                            </div>
                        </div>
                        
                        <div class="donation">
                            <a class="pr-cart" href="JavaScript:void(0)" data-count="{{ count($getCarts) }}">
                                <svg enable-background="new 0 0 512 512" height="512" viewbox="0 0 512 512" width="512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="m337.034 420.796c.835.139 1.665.207 2.484.207 7.2 0 13.555-5.2 14.778-12.537l15-90c1.362-8.171-4.158-15.9-12.33-17.262-8.172-1.366-15.9 4.158-17.262 12.33l-15 90c-1.362 8.172 4.158 15.901 12.33 17.262z">
                                        </path>
                                        <path
                                            d="m158.704 408.466c1.223 7.337 7.577 12.537 14.778 12.537.819 0 1.649-.067 2.484-.207 8.172-1.362 13.692-9.09 12.33-17.262l-15-90c-1.362-8.172-9.089-13.691-17.262-12.33-8.172 1.362-13.692 9.09-12.33 17.262z">
                                        </path>
                                        <path
                                            d="m497 181h-52.791l-115.496-144.37c-5.174-6.467-14.613-7.518-21.083-2.342-6.469 5.175-7.518 14.614-2.342 21.083l100.503 125.629h-299.582l100.504-125.629c5.175-6.469 4.126-15.909-2.342-21.083-6.47-5.176-15.909-4.126-21.083 2.342l-115.497 144.37h-52.791c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h18.686l56.892 199.121c1.839 6.44 7.725 10.879 14.422 10.879h302c6.697 0 12.583-4.439 14.423-10.879l56.891-199.121h18.686c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-101.314 270h-279.372l-51.428-180h382.229zm86.314-210c-51.385 0-403.32 0-452 0v-30h452z">
                                        </path>
                                        <path
                                            d="m256 421c8.284 0 15-6.716 15-15v-90c0-8.284-6.716-15-15-15s-15 6.716-15 15v90c0 8.285 6.716 15 15 15z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                            <div class="cart-popup">
                                @if(count($getCarts) > 0)
                                    @php $cartTotal = 0; @endphp
                                    <ul>
                                        @foreach($getCarts as $cart)
                                            @php
                                                $price = $cart->product->price ?? 0;
                                                $qty = $cart->quantity ?? 1;
                                                $cartTotal += $price * $qty;
                                            @endphp
                                            <li class="d-flex align-items-center position-relative">
                                                <div class="p-img light-bg">
                                                    <img alt="img" src="{{ asset('public/' . ($cart->product->image ?? 'website/assets/img/replenished-root/orange-100x100.jpg')) }}" />
                                                </div>
                                                <div class="p-data">
                                                    <h3 class="font-semi-bold">{{ $cart->product->name ?? 'Product' }}</h3>
                                                    <p class="theme-clr font-semi-bold">{{ $qty }} x Rs. {{ number_format($price) }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="cart-total d-flex align-items-center justify-content-between">
                                        <span class="font-semi-bold">Total:</span>
                                        <span class="font-semi-bold">Rs. {{ number_format($cartTotal) }}</span>
                                    </div>
                                    <div class="cart-btns d-flex align-items-center justify-content-between">
                                        <a class="font-bold" href="{{ url('/cart') }}">View Cart</a>
                                        <a class="font-bold theme-bg-clr text-white checkout" href="{{ url('/checkout') }}">Checkout</a>
                                    </div>
                                @else
                                    <p class="text-center py-3 mb-0">The cart is empty</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Request::is('/'))
        <div class="container">
            <div class="three-bar">
                <div class="reviews">
                    <ul>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                        <li><i class="fa-solid fa-star"></i></li>
                    </ul>
                    <h5>Replenished Root Support</h5>
                </div>
                <div class="content-header">
                    <i>
                        <svg height="256" version="1.1" viewbox="0 0 256 256" width="256" xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path
                                    d="M 40.051 84.916 c -0.232 0 -0.464 -0.04 -0.688 -0.122 L 1.312 70.858 C 0.524 70.57 0 69.819 0 68.98 V 20.748 c 0 -0.653 0.319 -1.265 0.854 -1.64 c 0.536 -0.374 1.22 -0.464 1.833 -0.238 l 38.051 13.935 c 0.788 0.289 1.312 1.039 1.312 1.878 v 48.233 c 0 0.653 -0.319 1.266 -0.854 1.64 C 40.856 84.793 40.456 84.916 40.051 84.916 z M 4 67.583 l 34.051 12.471 V 36.081 L 4 23.61 V 67.583 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 40.051 84.916 c -0.404 0 -0.805 -0.123 -1.146 -0.36 c -0.536 -0.374 -0.854 -0.986 -0.854 -1.64 V 34.683 c 0 -1.104 0.896 -2 2 -2 s 2 0.896 2 2 v 45.371 l 7.339 -2.688 c 1.034 -0.381 2.186 0.152 2.565 1.19 c 0.38 1.037 -0.153 2.186 -1.19 2.565 l -10.027 3.672 C 40.516 84.876 40.283 84.916 40.051 84.916 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 78.103 44.279 c -1.104 0 -2 -0.896 -2 -2 V 23.61 L 40.739 36.561 c -1.037 0.38 -2.186 -0.153 -2.566 -1.19 c -0.38 -1.038 0.153 -2.186 1.19 -2.566 L 77.415 18.87 c 0.611 -0.227 1.297 -0.136 1.833 0.238 c 0.535 0.375 0.854 0.986 0.854 1.64 v 21.531 C 80.103 43.383 79.207 44.279 78.103 44.279 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 40.051 36.683 c -0.233 0 -0.466 -0.041 -0.688 -0.122 L 1.312 22.626 C 0.524 22.337 0 21.587 0 20.748 s 0.524 -1.589 1.312 -1.878 L 39.364 4.936 c 0.443 -0.163 0.932 -0.163 1.375 0 L 78.79 18.87 c 0.788 0.289 1.313 1.039 1.313 1.878 s -0.524 1.589 -1.313 1.878 L 40.739 36.561 C 40.517 36.643 40.284 36.683 40.051 36.683 z M 7.816 20.748 l 32.235 11.805 l 32.235 -11.805 L 40.051 8.943 L 7.816 20.748 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 20.064 42.452 c -1.104 0 -2 -0.896 -2 -2 V 27.364 c 0 -0.843 0.529 -1.596 1.322 -1.881 l 38.356 -13.824 c 1.036 -0.377 2.185 0.164 2.56 1.203 c 0.374 1.039 -0.165 2.185 -1.204 2.56 L 22.064 28.769 v 11.683 C 22.064 41.556 21.169 42.452 20.064 42.452 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 66.608 73.149 c -0.53 0 -1.039 -0.211 -1.414 -0.586 l -6.236 -6.236 c -0.781 -0.781 -0.781 -2.047 0 -2.828 s 2.047 -0.781 2.828 0 l 4.822 4.822 l 11.058 -11.059 c 0.781 -0.781 2.047 -0.781 2.828 0 s 0.781 2.047 0 2.828 L 68.022 72.563 C 67.647 72.938 67.139 73.149 66.608 73.149 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                                <path
                                    d="M 69.727 85.187 c -11.18 0 -20.274 -9.095 -20.274 -20.273 c 0 -11.18 9.095 -20.274 20.274 -20.274 C 80.905 44.639 90 53.733 90 64.913 C 90 76.092 80.905 85.187 69.727 85.187 z M 69.727 48.639 c -8.974 0 -16.274 7.301 -16.274 16.274 s 7.301 16.273 16.274 16.273 S 86 73.887 86 64.913 S 78.7 48.639 69.727 48.639 z"
                                    stroke-linecap="round"
                                    style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                    transform=" matrix(1 0 0 1 0 0) "></path>
                            </g>
                        </svg>
                    </i>
                    <h4>Pakistan delivery available</h4>
                </div>
                <div class="content-header">
                    <i>
                        <svg height="512" viewbox="0 0 48 48" width="512" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m41.211 37.288a4.112 4.112 0 1 1 4.109-4.112 4.114 4.114 0 0 1 -4.109 4.112zm0-6.724a2.612 2.612 0 1 0 2.609 2.612 2.613 2.613 0 0 0 -2.609-2.612z">
                            </path>
                            <path
                                d="m19.542 37.288a4.112 4.112 0 1 1 4.108-4.112 4.115 4.115 0 0 1 -4.108 4.112zm0-6.724a2.612 2.612 0 1 0 2.608 2.612 2.614 2.614 0 0 0 -2.608-2.612z">
                            </path>
                            <path
                                d="m46.621 33.926h-2.051a.75.75 0 0 1 0-1.5h1.839v-3.977a3.16 3.16 0 0 0 -.4-1.536l-4.06-7.279a.4.4 0 0 0 -.349-.205h-5.533v13h1.786a.75.75 0 0 1 0 1.5h-2.536a.75.75 0 0 1 -.75-.75v-14.5a.75.75 0 0 1 .75-.75h6.283a1.9 1.9 0 0 1 1.66.974l4.059 7.28a4.662 4.662 0 0 1 .589 2.266v4.19a1.289 1.289 0 0 1 -1.287 1.287z">
                            </path>
                            <path
                                d="m16.183 33.926h-7.191a.75.75 0 0 1 -.75-.75v-5.768a.75.75 0 0 1 1.5 0v5.018h6.441a.75.75 0 0 1 0 1.5z">
                            </path>
                            <path
                                d="m8.992 24.747a.75.75 0 0 1 -.75-.75v-5.036a.75.75 0 0 1 1.5 0v5.039a.75.75 0 0 1 -.75.747z">
                            </path>
                            <path
                                d="m35.317 33.926h-12.417a.75.75 0 0 1 0-1.5h11.667v-19.621h-24.825v3.089a.75.75 0 0 1 -1.5 0v-3.227a1.364 1.364 0 0 1 1.363-1.362h25.1a1.364 1.364 0 0 1 1.362 1.362v20.509a.75.75 0 0 1 -.75.75z">
                            </path>
                            <path d="m11.957 28.158h-9.519a.75.75 0 0 1 0-1.5h9.519a.75.75 0 0 1 0 1.5z"></path>
                            <path d="m19.542 24.747h-13.283a.75.75 0 0 1 0-1.5h13.283a.75.75 0 0 1 0 1.5z"></path>
                            <path d="m5.846 20.787h-5.187a.75.75 0 1 1 0-1.5h5.187a.75.75 0 0 1 0 1.5z"></path>
                            <path d="m14.163 16.644h-9.156a.75.75 0 1 1 0-1.5h9.156a.75.75 0 0 1 0 1.5z"></path>
                        </svg>
                    </i>
                    <h4>Pakistan delivery in 3–7 working days</h4>
                </div>
            </div>
        </div>
        @endif
        <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">
            <div class="res-log">
                <a href="index.html">
                    <img alt="Responsive Logo" class="white-logo" src="assets/img/logo.png" />
                </a>
            </div>
            <ul>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Featured Home</a></li>
                        <li><a href="index-2.html">Wellness</a></li>
                        <li><a href="our-products.html">Products</a></li>
                    </ul>
                </li>
                <li><a href="about.html">about</a></li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Services</a>
                    <ul class="sub-menu">
                        <li><a href="service.html">Seed Blend Guidance</a></li>
                        <li><a href="product-details.html">Blend Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="team-details.html">Product Support</a></li>
                        <li><a href="pricing-plans.html">Pricing Plans</a></li>
                        <li><a href="faqs.html">FAQs</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">shop</a>
                    <ul class="sub-menu">
                        <li><a href="our-products.html">Products</a></li>
                        <li><a href="product-details.html">Product Details</a></li>
                        <li><a href="shop-cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="JavaScript:void(0)">News</a>
                    <ul class="sub-menu">
                        <li><a href="our-blog.html">Journal</a></li>
                        <li><a href="our-blog.html">Article</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <a href="JavaScript:void(0)" id="res-cross"></a>
        </div>
    </header>
    @yield('content')
    @include('website.pages.toastr')
    <footer class="two">
        <div class="networking">
            <div class="container">
                <ul class="social-networking">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f icon"></i>facebook</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>twitter</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-instagram"></i>instagram</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i>linkedin</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gap footer-help" style="background-image: url({{asset('public/website/assets/img/replenished-root/cover-1920x617.jpg')}});">
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
                                <svg height="682.66669" version="1.1" viewbox="0 0 682.66669 682.66669"
                                    width="682.66669" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
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
                            <h6><a href="mailto:replenishroots@gmail.com">replenishroots@gmail.com</a></h6>
                            <i>
                                <svg style="enable-background:new 0 0 512 512;" version="1.1" viewbox="0 0 512 512"
                                    x="0px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
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
        <div class="footer-bottom mt-0">
            <div class="container">
                <div class="footer-bottom-text">
                    <p>Copyright © 2026 Replenished Root. All Rights Reserved</p>
                    <a href="#"><img alt="card" src="{{asset('public/website/assets/img/card.png')}}" /></a>
                    <ul>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- search-popup -->
    <div class="search-popup">
        <button class="close-search"><i class="fa-solid fa-xmark"></i></button>
        <form action="#" method="post">
            <div class="form-group">
                <input name="search-field" placeholder="Search Here" required="" type="search" value="" />
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- search-popup end -->
    <!-- progress -->
    <div id="progress">
        <span id="progress-value"><i class="fa-solid fa-up-long"></i></span>
    </div>

    @auth
    <script>
        const messaging = firebase.messaging();
    
        function initFirebaseMessagingRegistration() {
            messaging.requestPermission().then(function () {
                return messaging.getToken()
            }).then(function(token) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
        
                    $.ajax({
                        url: '{{ url("/save-token") }}',
                        type: 'POST',
                        data: {
                            token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            console.log('Token saved successfully.');
                        },
                        error: function (err) {
                            console.log('User Chat Token Error'+ err);
                        },
                    });
    
            }).catch(function (err) {
                console.log(`Token Error :: ${err}`);
            });
        }
    
        initFirebaseMessagingRegistration();
        
        messaging.onMessage(function(payload) {
            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(noteTitle, noteOptions);
        });
    </script>
    @endauth
    <script>
        $(document).on('click', '#userToggle', function (e) {
            e.stopPropagation();
            $('#userMenu').toggleClass('show');
        });
        $(document).on('click', function () {
            $('#userMenu').removeClass('show');
        });
    </script>
    <!-- Bootstrap Js -->
    <script src="{{asset('public/website/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/website/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/website/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/website/assets/js/splitting.js')}}"></script>
    <script src="{{asset('public/website/assets/js/slick.min.js')}}"></script>
    <!-- fancybox -->
    <script src="{{asset('public/website/assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('public/website/assets/js/custom.js')}}"></script>
    @yield('page-script')
</body>

</html>