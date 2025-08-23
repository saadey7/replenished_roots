    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Replenished Root - Seed Cycling Blend</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/website/assets/img/favicon.png')}}">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{asset('public/website/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/flaticon.cs')}}s">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/odometer.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/website/assets/css/responsive.css')}}">
    </head>

    <body>

        <!-- Pre-loader-start -->
        <div id="preloader">
            <div class="tg-cube-grid">
                <div class="tg-cube tg-cube1"></div>
                <div class="tg-cube tg-cube2"></div>
                <div class="tg-cube tg-cube3"></div>
                <div class="tg-cube tg-cube4"></div>
                <div class="tg-cube tg-cube5"></div>
                <div class="tg-cube tg-cube6"></div>
                <div class="tg-cube tg-cube7"></div>
                <div class="tg-cube tg-cube8"></div>
                <div class="tg-cube tg-cube9"></div>
            </div>
        </div>
        <!-- Pre-loader-end -->

        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header id="home">
            <div id="header-top-fixed"></div>
            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="flaticon-layout"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo">
                                        <a href="index.html"><img
                                                src="{{asset('public/website/assets/img/logo/logo001.png')}}"
                                                alt="Logo"></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-xl-flex">
                                        <ul class="navigation">
                                            <li
                                                class="{{ (request()->is('/')) ? 'active' : '' }} menu-item-has-children">
                                                <a href="{{url('/')}}" class="section-link">Home</a>

                                            </li>
                                            <li><a href="{{url('/#features')}}" class="section-link">Features</a></li>
                                            <li><a href="{{url('/#paroller')}}" class="section-link">Product</a></li>
                                            <!-- <li><a href="#ingredient" class="section-link">Ingredient</a></li>
                                        <li><a href="#pricing" class="section-link">Pricing</a></li> -->
                                            <li class="{{ (request()->is('shop')) ? 'active' : '' }}"><a
                                                    href="{{url('shop')}}">Shop</a></li>
                                            <!-- <li class="menu-item-has-children"><a href="#news" class="section-link">News</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                            <li><a href="{{url('/about-us')}}">About us</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-sm-block">
                                        <ul>
                                            <li class="header-shop-cart">
                                                @auth
                                                <a href="#" class="cart-count"
                                                    style="display: flex; gap: 7px; align-items: center;">
                                                    <i class="far fa-user-circle"></i>
                                                    <span
                                                        style="font-size: 20px;">{{Auth::guard('web')->user()->name}}</span>
                                                </a>
                                                @endauth
                                                @guest
                                                <a href="{{url('login')}}" class="cart-count"
                                                    style="display: flex; gap: 7px; align-items: center;">
                                                    <i class="far fa-user-circle"></i>
                                                    <span style="font-size: 20px;">Login</span>
                                                </a>
                                                @endguest
                                            </li>
                                            <li class="header-search">
                                                @auth
                                                <a href="#" class="cart-count"><i class="flaticon-shopping-cart"></i>
                                                    <span class="mini-cart-count">2</span>
                                                </a>
                                                <div class="header-mini-cart">
                                                    <ul
                                                        class="woocommerce-mini-cart cart_list product_list_widget list-wrap">
                                                        <li
                                                            class="woocommerce-mini-cart-item d-flex align-items-center">
                                                            <a href="#" class="remove remove_from_cart_button">×</a>
                                                            <div class="mini-cart-img">
                                                                <img src="{{asset('public/website/assets/img/products/cart_p01.jpg')}}"
                                                                    alt="Product">
                                                            </div>
                                                            <div class="mini-cart-content">
                                                                <h4 class="product-title"><a
                                                                        href="shop-details.html">Antiaging and
                                                                        Longevity</a>
                                                                </h4>
                                                                <div class="mini-cart-price">1 ×
                                                                    <span
                                                                        class="woocommerce-Price-amount amount">$49</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="woocommerce-mini-cart-item d-flex align-items-center">
                                                            <a href="#" class="remove remove_from_cart_button">×</a>
                                                            <div class="mini-cart-img">
                                                                <img src="{{asset('public/website/assets/img/products/cart_p02.jpg')}}"
                                                                    alt="Product">
                                                            </div>
                                                            <div class="mini-cart-content">
                                                                <h4 class="product-title"><a
                                                                        href="shop-details.html">Branched Chain Amino
                                                                        Acids</a></h4>
                                                                <div class="mini-cart-price">2 ×
                                                                    <span
                                                                        class="woocommerce-Price-amount amount">$69</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <p class="woocommerce-mini-cart__total">
                                                        <strong>Subtotal:</strong>
                                                        <span class="woocommerce-Price-amount">$149</span>
                                                    </p>
                                                    <p class="checkout-link">
                                                        <a href="cart.html" class="button wc-forward">View cart</a>
                                                        <a href="checkout.html"
                                                            class="button checkout wc-forward">Checkout</a>
                                                    </p>
                                                </div>
                                                @endauth
                                                @guest
                                                <a href="#"><i class="flaticon-search"></i></a>
                                                @endguest

                                            </li>
                                            <li class="offCanvas-btn d-none d-xl-block"><a href="#"
                                                    class="navSidebar-button"><i class="flaticon-layout"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <nav class="menu-box">
                    <div class="close-btn"><i class="fas fa-times"></i></div>
                    <div class="nav-logo">
                        <a href="index.html"><img src="{{asset('public/website/assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <div class="social-links">
                        <ul class="clearfix">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="menu-backdrop"></div>
            <!-- End Mobile Menu -->

            <!-- header-search -->
            <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="search-wrap text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your keyword...">
                                        <button class="search-btn"><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-backdrop"></div>
            <!-- header-search-end -->

            <!-- offCanvas-start -->
            <div class="offCanvas-wrap">
                <div class="offCanvas-toggle"><img src="{{asset('public/website/assets/img/icons/close.png')}}"
                        alt="icon"></div>
                <div class="offCanvas-body">
                    <div class="offCanvas-content">
                        <h3 class="title">Getting all of the <span>Nutrients</span> you need simply cannot be done
                            without
                            supplements.</h3>
                        <p>Nam libero tempore, cum soluta nobis eligendi cumque quod placeat facere possimus assumenda
                            omnis
                            dolor repellendu sautem temporibus officiis</p>
                    </div>
                    <div class="offcanvas-contact">
                        <h4 class="number">+1 599 162 4545</h4>
                        <h4 class="email">Replenished Roots@gmail.com</h4>
                        <p>5689 Lotaso Terrace, Culver City, <br> CA, United States</p>
                        <ul class="offcanvas-social list-wrap">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="offCanvas-overlay"></div>
            <!-- offCanvas-end -->

        </header>
        <!-- header-area-end -->

        <!-- main-area -->
        @yield('content')
        <!-- main-area-end -->

        <!-- Footer-area -->
        <footer class="footer-area">
            <!-- <div class="footer-instagram">
            <div class="container">
                <div class="row g-0 instagram-active">
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post01.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post01.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post02.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post02.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post03.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post03.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post04.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post04.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post05.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post05.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="footer-insta-item">
                            <a href="{{asset('public/website/assets/img/others/instagram_post06.jpg')}}" class="popup-image"><img
                                    src="{{asset('public/website/assets/img/others/instagram_post06.jpg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            <div class="footer-top-wrap">
                <div class="container">
                    <div class="footer-widgets-wrap">
                        <div class="row">
                            <div class="col-lg-4 col-md-7">
                                <div class="footer-widget">
                                    <div class="footer-about">
                                        <div class="footer-logo logo">
                                            <a href="index.html"><img
                                                    src="{{asset('public/website/assets/img/logo/white_logo.png')}}"
                                                    alt="Logo"></a>
                                        </div>
                                        <div class="footer-text">
                                            <p>Making beauty especially relating complot especial common questions tend
                                                to
                                                recur through posts or queries standards vary orem donor command tei.
                                            </p>
                                        </div>
                                        <div class="footer-social">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title">About Us</h4>
                                    <ul class="list-wrap">
                                        <li><a href="{{url('/about-us')}}">About Company</a></li>
                                        <li><a href="{{url('/shop')}}">Our Shop</a></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-5 col-sm-6">
                                <div class="footer-widget">
                                    <h4 class="fw-title">Support</h4>
                                    <ul class="list-wrap">
                                        <li><a href="{{url('/about-us')}}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5">
                                <div class="footer-widget">
                                    <h4 class="fw-title">CONTACT US</h4>
                                    <div class="footer-contact-wrap">
                                        <p>4140 Parker Rd. Allentown, New Mexico 31134</p>
                                        <ul class="list-wrap">
                                            <li class="phone"><i class="fas fa-phone"></i> +1 31-6555-0116</li>
                                            <li class="mail"><i class="fas fa-envelope"></i> replenishedroot@gmail.com
                                            </li>
                                            <li class="website"><i class="fas fa-globe"></i> www.replenishedroot.com
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-shape one">
                    <img src="{{asset('public/website/assets/img/others/footer_shape01.png')}}" alt="img"
                        class="wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                </div>
                <div class="footer-shape two">
                    <img src="{{asset('public/website/assets/img/others/footer_shape02.png')}}" alt="img"
                        class="wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="copyright-text">
                                <p>Copyright © 2024 Replenished Roots All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="payment-card text-center text-md-end">
                                <img src="{{asset('public/website/assets/img/others/card_img.png')}}" alt="card">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer-area-end -->

        <!-- JS here -->
        <script src="{{asset('public/website/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.odometer.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.appear.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.paroller.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.easypiechart.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.inview.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery.easing.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/svg-inject.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/jarallax.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/validator.js')}}"></script>
        <script src="{{asset('public/website/assets/js/ajax-form.js')}}"></script>
        <script src="{{asset('public/website/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('public/website/assets/js/main.js')}}"></script>
        <script>
        SVGInject(document.querySelectorAll("img.injectable"));
        </script>
        @yield('page-script')
    </body>

    </html>