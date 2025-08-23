@extends('website.layouts.layout')
@section('title')
Register
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Register Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Create Account</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one"><img src="{{asset('public/website/assets/img/others/video_shape01.png')}}"
                alt="shape"></div>
        <div class="video-shape two"><img src="{{asset('public/website/assets/img/others/video_shape02.png')}}"
                alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- singUp-area -->
    <section class="singUp-area section-py-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title">Create Your Account</h2>
                        <p>Hey there! Ready to join the party? We just need a few details from you to get started.
                            Let's do this!</p>
                        <div class="account__social">
                            <a href="#" class="account__social-btn">
                                <img src="{{asset('public/website/assets/img/icons/google.svg')}}" alt="img">
                                Continue with google
                            </a>
                        </div>
                        <div class="account__divider">
                            <span>or</span>
                        </div>
                        <form action="#" class="account__form">
                            <div class="row gutter-20">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="fast-name">First Name</label>
                                        <input type="text" id="fast-name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="last-name">Last name</label>
                                        <input type="text" id="last-name" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="email">
                            </div>
                            <div class="form-grp">
                                <label for="password">Password</label>
                                <input type="password" id="password" placeholder="password">
                            </div>
                            <div class="form-grp">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-two btn-sm" style="border-radius: 5px;">Sign
                                Up</button>
                        </form>
                        <div class="account__switch">
                            <p>Already have an account?<a href="login.html">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->

</main>
@endsection