@extends('frontend.layout')
@section('content')

<div class="container py-5 my-lg-5">
    <div class="row align-items-center">
        <div class="col-md-6 d-flex justify-content-center mb-5 mb-md-0">
            <div class="image-stack">
                <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="main-about-img" alt="Myanmar Handicrafts">
                <img src="{{ asset('frontend_assets/images/about2.jpg')}}" class="sub-about-img" alt="Handmade Detail">
            </div>
        </div>

        <div class="col-md-6 text-center text-md-start ps-md-5">
            <h2 class="display-6 fw-bold mb-4" style="font-family: 'PT Serif', serif;">Welcome to PSM Craft House!</h2>
            <p class="text-muted lh-lg mb-4">
                Experience the heart of Myanmar at PSM Craft House. From our workshop to your home, 
                discover unique, handmade creations that tell a story of tradition, skill, and cultural pride.
                Explore authentic handicrafts made by skilled artisans and discover the value behind every piece.
            </p>
            <a href="#" class="btn btn-outline-dark px-4 py-2 rounded-pill">Learn More</a>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-lg py-4">
                <div class="card-body text-center">
                    <i class="fa-solid fa-truck fa-2x mb-3 text-dark"></i>
                    <h6 class="fw-bold">Free Shipping</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">Products are free shipping</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-lg py-4">
                <div class="card-body text-center">
                    <i class="fa-solid fa-user-headset fa-2x mb-3 text-dark"></i>
                    <h6 class="fw-bold">Customer Support</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">24/7 Customer Support</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-lg py-4">
                <div class="card-body text-center">
                    <i class="fa-regular fa-credit-card fa-2x mb-3 text-dark"></i>
                    <h6 class="fw-bold">Secure Payment</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">Most secure payment</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection