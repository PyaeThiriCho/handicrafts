@extends('frontend.layout')

@section('content')

<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel" style="background-color: #111;">

    <div class="carousel-inner">

        <div class="carousel-item active" data-bs-interval="6000">

            <div class="position-relative overflow-hidden" style="height: 80vh;">

                <img src="{{ asset('frontend_assets/images/psm.jpg')}}" class="d-block w-100 h-100 object-fit-cover opacity-75" style="transform: scale(1.03); transform-origin: center;" alt="Bagan Sunset">

                <div class="carousel-caption d-flex h-100 align-items-center text-start px-md-5" style="bottom:0; left:0; right:0; background: linear-gradient(to right, rgba(0,0,0,0.7), transparent);">

                    <div class="container py-5">
                        <span class="text-uppercase fw-bold text-white-50 small mb-2 d-inline-block reveal" style="letter-spacing: 2px;">Heritage Reimagined</span>
                        <h1 class="display-4 fw-bold text-white mb-3 tracking-tight reveal" style="max-width: 650px; font-family: var(--font-serif); transition-delay: .1s;">Myanmar Traditional Handicrafts</h1>
                        <p class="lead text-white-50 mb-4 reveal" style="max-width: 550px; transition-delay: .2s;">Discover authentic, hand-carved works of art shaped with dedication by generational local master craftsmen.</p>
                        <a href="#categories" class="btn text-white px-4 py-2 text-uppercase fw-medium rounded-pill shadow reveal" style="background-color: var(--color-primary); font-size: 0.85rem; letter-spacing: 1px; transition-delay: .3s;">Explore Collection</a>
                    </div>

                </div>

            </div>

        </div>



        <div class="carousel-item" data-bs-interval="6000">

            <div class="position-relative overflow-hidden" style="height: 80vh;">

                <img src="{{ asset('frontend_assets/images/about2.jpg')}}" class="d-block w-100 h-100 object-fit-cover opacity-75" alt="Handmade Crafts">

                <div class="carousel-caption d-flex h-100 align-items-center text-start px-md-5" style="bottom:0; left:0; right:0; background: linear-gradient(to right, rgba(0,0,0,0.7), transparent);">

                    <div class="container py-5">
                        <span class="text-uppercase fw-bold text-white-50 small mb-2 d-inline-block" style="letter-spacing: 2px;">Generational Mastery</span>
                        <h1 class="display-4 fw-bold text-white mb-3 tracking-tight" style="max-width: 650px; font-family: var(--font-serif);">Authentic Artisan Crafting</h1>
                        <p class="lead text-white-50 mb-4" style="max-width: 550px;">Bring timeless Myanmar legacy patterns and texture warmth cleanly into your modern residential space interiors.</p>
                        <a href="#products" class="btn text-white px-4 py-2 text-uppercase fw-medium rounded-pill shadow" style="background-color: var(--color-primary); font-size: 0.85rem; letter-spacing: 1px;">Shop Curated</a>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark p-3 rounded-circle opacity-50" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark p-3 rounded-circle opacity-50" aria-hidden="true"></span>
    </button>
</div>



{{-- Best Seller Showcase Layout --}}
<section class="container py-5 my-4" id="products">

    <div class="text-center mb-5 reveal">
        <span class="text-uppercase tracking-widest text-muted small fw-bold" style="letter-spacing: 2px; color: var(--color-primary) !important;">Customer Favorites</span>
        <h2 class="fw-bold mt-1 display-5" style="font-family: var(--font-serif);">The Best Sellers</h2>
        <div class="ring-divider">
            <svg viewBox="0 0 64 64">
                <circle cx="32" cy="32" r="26"/>
                <circle cx="32" cy="32" r="18"/>
                <circle class="dot" cx="32" cy="32"/>
            </svg>
        </div>
    </div>

    <div class="best-seller-slider">
        @foreach($bestSellers as $product)
        <div class="px-2 py-3">
            <div class="card premium-card p-3">
                <div class="img-zoom-wrapper position-relative" style="background-color: #FAF8F5;">
                    <img src="{{ asset($product->image) }}" class="img-fluid w-100" alt="{{ $product->name }}" style="height: 260px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">

                    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3 opacity-0 card-actions-hover d-flex gap-2" style="transition: all 0.3s ease;">
                        <a href="{{ route('frontend.product.details', $product->id) }}" class="btn btn-white btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: white; color: var(--color-primary);"><i class="fa-solid fa-eye"></i></a>
                        <button onclick="addItem('{{$product->id}}', '{{$product->name}}', '{{$product->price}}', '{{asset($product->image)}}')" class="btn btn-white btn-sm rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: white; color: var(--color-primary);"><i class="fa-solid fa-bag-shopping"></i></button>
                    </div>
                </div>

                <div class="pt-3 text-center">
                    <h6 class="fw-bold mb-1 text-truncate" style="font-family: var(--font-serif); font-size: 1.05rem;">{{ $product->name }}</h6>
                    <p class="fw-semibold mb-0" style="color: var(--color-primary); font-size: 0.95rem;">{{ number_format($product->price) }} MMK</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Curated Collection Categories Showcase --}}
{{-- Curated Collection Categories Showcase --}}
<section class="container py-5 my-4" id="categories">

    <div class="text-center mb-5 reveal">
        <span class="text-uppercase tracking-widest text-muted small fw-bold" style="letter-spacing: 2px; color: var(--color-primary) !important;">Handcrafted Masterworks</span>
        <h2 class="fw-bold mt-1 display-5" style="font-family: var(--font-serif);">Explore Collections</h2>
        <div class="ring-divider">
            <svg viewBox="0 0 64 64">
                <circle cx="32" cy="32" r="26"/>
                <circle cx="32" cy="32" r="18"/>
                <circle class="dot" cx="32" cy="32"/>
            </svg>
        </div>
    </div>

    <div class="row g-4 justify-content-center reveal-group">
        @foreach($categories as $cat)
        <div class="col-sm-6 col-md-4 col-lg-3 reveal">
            <div class="card premium-card p-3 text-center h-100 d-flex flex-column justify-content-between">
                <div class="img-zoom-wrapper mb-3" style="background-color: #fff;">
                    @php
                        // Checks if image path starts with 'images/' or 'backend_assets/' to handle legacy seeders vs new dashboard uploads
                        $imagePath = $cat->image;
                        if ($imagePath && !str_starts_with($imagePath, 'images/') && !str_starts_with($imagePath, 'backend_assets/')) {
                            $imagePath = 'backend_assets/img/' . $imagePath;
                        }
                    @endphp
                    <a href="{{ route('frontend.category', $cat->id) }}">
                        <img src="{{ asset($imagePath ?? 'frontend_assets/images/about1.jpg') }}" class="img-fluid w-100" alt="{{ $cat->name }}" style="height: 200px; object-fit: contain; padding: 12px;" onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
                    </a>
                </div>
                <div>
                    <a href="{{ route('frontend.category', $cat->id) }}" class="text-decoration-none text-dark">
                        <h5 class="fw-bold mb-1 category-title" style="font-family: var(--font-serif); font-size: 1.15rem;">{{ $cat->name }}</h5>
                    </a>
                    <a href="{{ route('frontend.category', $cat->id) }}" class="gold-link text-decoration-none d-inline-block mt-1">
                        <span class="small fw-bold text-uppercase" style="font-size: 0.72rem; letter-spacing: 1px;">Discover Collection <i class="fa-solid fa-arrow-right-long ms-1"></i></span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5 reveal">
        <a href="{{ route('frontend.all.products') }}" class="btn text-white px-5 py-2 fw-medium rounded-pill shadow-sm" style="background-color: var(--color-primary); font-size: 0.85rem; letter-spacing: 1.5px;">
            VIEW FULL CATALOGUE
        </a>
    </div>
</section>


{{-- Premium Community Newsletter Banner --}}
<div class="container-fluid my-5 shadow-sm overflow-hidden position-relative py-5 reveal" style="background-color: #6B1D2F;">
    <div class="container py-4 position-relative" style="z-index: 2;">
        <div class="row align-items-center text-white">
            <div class="col-12 col-md-7 mb-4 mb-md-0">
                <h2 class="fw-bold mb-2 display-6" style="font-family: var(--font-serif);">Join the Artisan Circle</h2>
                <p class="mb-4 text-white-50" style="max-width: 540px;">Receive occasional curated lookbooks, traditional workshop technique documentation, and priority notifications for limited design releases.</p>
                <div class="input-group p-1 bg-white rounded-pill shadow" style="max-width: 480px;">
                    <input type="email" class="form-control border-0 px-4 text-dark shadow-none" placeholder="Enter your email address" style="font-size: 0.9rem;">
                    <button class="btn px-4 fw-bold rounded-pill" style="background-color: #6B1D2F; color: white; font-size: 0.85rem;" type="button">SUBSCRIBE</button>
                </div>
            </div>
            <div class="col-12 col-md-5 text-center text-md-end">
                <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" alt="PSM Craft House" class="img-fluid rounded-4 shadow-lg border border-light border-opacity-10" style="width: 45%; max-width: 220px; filter: grayscale(15%);">
            </div>
        </div>
    </div>
</div>


{{-- Customer Feedback Section --}}
<section class="container py-5 my-4">

    <div class="text-center mb-5 reveal">
        <span class="text-uppercase tracking-widest text-muted small fw-bold" style="letter-spacing: 2px; color: var(--color-primary) !important;">Collector Reviews</span>
        <h2 class="fw-bold mt-1 display-5" style="font-family: var(--font-serif);">Testimonials</h2>
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
            <div class="card premium-card p-4 h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="mb-3" style="color: #D4AF37;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="text-muted fst-italic mb-4" style="font-size: 0.95rem; line-height: 1.6;">"The lacquerware finishing is completely exquisite. It holds that deep organic scent of true local wood and traditional tree-sap sealing sap."</p>
                </div>
                <div class="d-flex align-items-center border-top pt-3">
                    <img src="{{ asset('frontend_assets/images/rev1.jpg')}}" height="45" width="45" class="rounded-circle me-3 object-cover shadow-sm">
                    <div><h6 class="mb-0 fw-bold" style="font-size: 0.95rem;">Ko Min</h6><small class="text-muted small">Verified Collector</small></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 reveal">
            <div class="card premium-card p-4 h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="mb-3" style="color: #D4AF37;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="text-muted fst-italic mb-4" style="font-size: 0.95rem; line-height: 1.6;">"Incredible attention to geometric balance on the Pathein parasol structure. It functions as an unforgettable standalone artistic decor centerpiece."</p>
                </div>
                <div class="d-flex align-items-center border-top pt-3">
                    <img src="{{ asset('frontend_assets/images/review4.jpg')}}" height="45" width="45" class="rounded-circle me-3 object-cover shadow-sm">
                    <div><h6 class="mb-0 fw-bold" style="font-size: 0.95rem;">Su Su</h6><small class="text-muted small">Interior Architect</small></div>
                </div>
            </div>
        </div>

        <div class="col-md-4 reveal">
            <div class="card premium-card p-4 h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="mb-3" style="color: #D4AF37;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="text-muted fst-italic mb-4" style="font-size: 0.95rem; line-height: 1.6;">"Exceptional order delivery tracing updates to Yangon. Securely boxed and wrapped with maximum padding protection rules applied."</p>
                </div>
                <div class="d-flex align-items-center border-top pt-3">
                    <img src="{{ asset('frontend_assets/images/review6.jpg')}}" height="45" width="45" class="rounded-circle me-3 object-cover shadow-sm">
                    <div><h6 class="mb-0 fw-bold" style="font-size: 0.95rem;">Thiha</h6><small class="text-muted small">Mandalay Buyer</small></div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .premium-card:hover .card-actions-hover { opacity: 1 !important; transform: translate(-50%, -5px) !important; }
</style>
@endsection