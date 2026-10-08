@extends('website.layouts.layout')
@section('title')
Checkout
@endsection
@section('content')
<style>
    .thank-you-container {
      max-width: 700px;
      margin: 40px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .checkmark {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: #28a745;
      margin: 0 auto 20px;
      position: relative;
      animation: scaleIn 0.5s ease-in-out;
    }
    .checkmark::after {
      content: '\2713';
      font-size: 36px;
      color: #fff;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    @keyframes scaleIn {
      0% { transform: scale(0); }
      100% { transform: scale(1); }
    }
    h1 {
      font-size: 28px;
      font-weight: 500;
      color: #1a2a44;
      margin-bottom: 10px;
    }
    p {
      font-size: 16px;
      color: #5a6a88;
      margin-bottom: 20px;
      line-height: 1.6;
    }
    .order-summary {
      text-align: left;
      margin: 30px 0;
      padding: 20px;
      background: #f9fafc;
      border-radius: 6px;
    }
    .order-summary h2 {
      font-size: 20px;
      font-weight: 500;
      color: #1a2a44;
      margin-bottom: 15px;
    }
    .order-details {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      color: #5a6a88;
      margin-bottom: 10px;
    }
    .btn {
      display: inline-block;
      padding: 12px 24px;
      background-color: #1a2a44;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      font-size: 14px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }
    .btn:hover {
      background-color: #0f1c33;
    }
    @media (max-width: 600px) {
      .thank-you-container {
        margin: 20px;
        padding: 20px;
      }
      h1 {
        font-size: 24px;
      }
      p, .order-details {
        font-size: 14px;
      }
    }
</style>
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Thanks for Shopping</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Thank You</span></li>
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

    <!-- checkout-area -->
    <div class="checkout__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="thank-you-container">
                        <div class="checkmark"></div>
                        <h1>Order Successfully Placed</h1>
                        <p>Thank you for your purchase! Your order has been received, and we’re processing it now. You’ll receive a confirmation email with all the details shortly.</p>
                        <div class="order-summary">
                          <h2>Order Summary</h2>
                          <div class="order-details">
                            <span>Order ID:</span>
                            <span>{{$order->order_id}}</span>
                          </div>
                          <div class="order-details">
                            <span>Order Date:</span>
                            <span>{{date('F d, Y', strtotime($order->order_date))}}</span>
                          </div>
                          <div class="order-details">
                            <span>Estimated Delivery:</span>
                            <span>{{ date('F d, Y', strtotime($order->order_date . ' +10 days')) }}</span>
                          </div>
                          <div class="order-details">
                            <span>Total:</span>
                            <span>${{round($order->amount, 2)}}</span>
                          </div>
                        </div>
                        <a href="{{url('/')}}" class="btn">Return to Homepage</a>
                      </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- checkout-area-end -->

</main>
@endsection