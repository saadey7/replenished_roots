@extends('website.layouts.layout')
@section('title')
    Login
@endsection
@section('content')
    <style>
        .login-box {
            background: #fff;
            border-radius: 12px;
            padding: 40px 35px;
            /* box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08); */
        }

        .login-box h3 {
            margin-bottom: 8px;
        }

        .login-box .login-sub {
            margin-bottom: 25px;
            opacity: 0.75;
        }

        .login-box input[type="email"],
        .login-box input[type="password"],
        .login-box input[type="text"] {
            width: 100%;
            margin-bottom: 18px;
        }

        .login-box .password-wrap {
            position: relative;
        }

        .login-box .password-wrap .toggle-pass {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            margin-top: -9px;
            cursor: pointer;
            opacity: 0.6;
        }

        .login-box .login-extra {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px;
        }

        .login-box .login-extra .remember {
            display: flex;
            /* align-items: center; */
            gap: 8px;
        }

        .login-box .login-extra .remember input {
            margin: 0;
            width: 20px;
            height: 20px;
            padding: 0px;
        }

        .login-box .btn {
            width: 100%;
        }

        .login-box .register-link {
            text-align: center;
            margin-top: 22px;
            margin-bottom: 0;
        }

        .login-box .register-link a {
            font-weight: 600;
        }
    </style>
    <section class="bannr-section"
        style="background-image: url({{ asset('public/website/assets/img/replenished-root/cover-1920x490.jpg') }});">
        <div class="container">
            <div class="bannr-text">
                <h2>Login</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Account</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
        <img alt="icon" class="extra-images-two" src="{{ asset('public/website/assets/img/extra-images-2.png') }}" />
        <img alt="img" class="dots" src="{{ asset('public/website/assets/img/dots-1.png') }}" />
        <img alt="icon" class="hero-icon" src="{{ asset('public/website/assets/img/hero-icon-1.png') }}" />
    </section>
    <section class="gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <form action="{{url('process_login')}}" class="checkout-meta donate-page login-box" id="loginForm" method="POST">
                        @csrf
                        <h3>Welcome Back</h3>
                        <p class="login-sub">Login to your Replenished Root account.</p>

                        <input autocomplete="email" class="input-text" name="email" placeholder="Email address" required
                            type="email" />

                        <div class="password-wrap">
                            <input autocomplete="current-password" class="input-text" id="loginPassword" name="password"
                                placeholder="Password" required type="password" />
                            <i class="fa-solid fa-eye toggle-pass" id="togglePass"></i>
                        </div>

                        <div class="login-extra">
                            <div class="remember">
                                <input id="remember" name="remember" class="form-check-input" type="checkbox" value="1" />
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="{{ url('/reset-password') }}">Forgot password?</a>
                        </div>

                        <button class="btn" type="submit"><span>Login</span></button>

                        <p class="register-link">Don't have an account? <a href="{{ url('/register') }}">Create an account</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
