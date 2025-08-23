@extends('website.layouts.layout')
@section('title')
Home
@endsection
@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Reset Pass Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Reset Pass</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-shape one"><img src="assets/img/others/video_shape01.png" alt="shape"></div>
        <div class="video-shape two"><img src="assets/img/others/video_shape02.png" alt="shape"></div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- singUp-area -->
    <section class="singUp-area section-py-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title">RESET PASSWORD</h2>
                        <p>Enter your email address to request password reset.</p>
                        <form action="#" class="account__form">
                            <div class="form-grp">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="email">
                            </div>
                            <button type="submit" class="btn btn-two btn-sm m-0" style="border-radius: 5px;">Send
                                Email</button>
                        </form>
                        <div class="account__switch">
                            <p>Remember Password?<a href="login.html">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->

</main>
@endsection