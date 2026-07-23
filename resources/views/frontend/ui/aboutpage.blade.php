@extends('frontend.layout')
@section('content')

<div class="container py-5 my-lg-5">
    <div class="row align-items-center">
        <div class="col-md-6 d-flex justify-content-center mb-5 mb-md-0 reveal">
            <div class="image-stack">
                <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="main-about-img" alt="Myanmar Handicrafts">
                <img src="{{ asset('frontend_assets/images/about2.jpg')}}" class="sub-about-img" alt="Handmade Detail">
            </div>
        </div>

        <div class="col-md-6 text-center text-md-start ps-md-5 reveal">
            <span class="text-uppercase fw-bold small d-inline-block mb-2 text-brand" style="letter-spacing: 2px;">Our Story</span>
            <h2 class="display-6 fw-bold mb-4" style="font-family: var(--font-serif);">Welcome to PSM Craft House!</h2>
            <p class="text-muted lh-lg mb-4">
                Experience the heart of Myanmar at PSM Craft House. From our workshop to your home,
                discover unique, handmade creations that tell a story of tradition, skill, and cultural pride.
                Explore authentic handicrafts made by skilled artisans and discover the value behind every piece.
            </p>
            <p class="text-muted lh-lg mb-4">
                Every lacquerware bowl, Pathein parasol, and marionette that leaves our workshop passes through
                the hands of artisans who learned their craft the way it has been taught for generations —
                by watching, practicing, and slowly earning the patience the work demands.
            </p>
            <a href="#" class="btn btn-brand-outline px-4 py-2 rounded-pill">Learn More</a>
        </div>
    </div>
</div>

{{-- Craft heritage stats strip --}}
<div class="container-fluid py-5 reveal" style="background-color: var(--color-primary);">
    <div class="container">
        <div class="row text-center text-white g-4">
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0" style="font-family: var(--font-serif); font-size: 2.2rem;">25+</h3>
                <p class="small text-white-50 text-uppercase mb-0" style="letter-spacing: 1px;">Years of Craft</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0" style="font-family: var(--font-serif); font-size: 2.2rem;">40+</h3>
                <p class="small text-white-50 text-uppercase mb-0" style="letter-spacing: 1px;">Partner Artisans</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0" style="font-family: var(--font-serif); font-size: 2.2rem;">1,000+</h3>
                <p class="small text-white-50 text-uppercase mb-0" style="letter-spacing: 1px;">Pieces Delivered</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fw-bold mb-0" style="font-family: var(--font-serif); font-size: 2.2rem;">100%</h3>
                <p class="small text-white-50 text-uppercase mb-0" style="letter-spacing: 1px;">Handmade</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5 reveal">
        <span class="text-uppercase small fw-bold text-brand" style="letter-spacing: 2px;">Why Shop With Us</span>
        <h2 class="fw-bold mt-1" style="font-family: var(--font-serif);">The PSM Promise</h2>
        <div class="ring-divider">
            <svg viewBox="0 0 64 64">
                <circle cx="32" cy="32" r="26"/>
                <circle cx="32" cy="32" r="18"/>
                <circle class="dot" cx="32" cy="32"/>
            </svg>
        </div>
    </div>

    <div class="row g-4 reveal-group">
        <div class="col-md-4 reveal">
            <div class="card premium-card h-100 py-4">
                <div class="card-body text-center">
                    <i class="fa-solid fa-truck fa-2x mb-3 text-brand"></i>
                    <h6 class="fw-bold" style="font-family: var(--font-serif);">Free Shipping</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">Products are free shipping</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 reveal">
            <div class="card premium-card h-100 py-4">
                <div class="card-body text-center">
                    <i class="fa-solid fa-user-headset fa-2x mb-3 text-brand"></i>
                    <h6 class="fw-bold" style="font-family: var(--font-serif);">Customer Support</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">24/7 Customer Support</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 reveal">
            <div class="card premium-card h-100 py-4">
                <div class="card-body text-center">
                    <i class="fa-regular fa-credit-card fa-2x mb-3 text-brand"></i>
                    <h6 class="fw-bold" style="font-family: var(--font-serif);">Secure Payment</h6>
                    <hr class="divided mx-auto">
                    <p class="text-muted small mb-0">Most secure payment</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection