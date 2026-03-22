@extends('frontend.layout')
@section('content')
  
  <!--carousel start-->
 <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <div class="carousel-image-container">
                <img src="{{ asset('frontend_assets/images/1.jpg')}}" class="d-block w-100 zoom-effect" alt="Bagan Sunset">
            </div>
            <div class="carousel-caption d-none d-md-block text-start custom-caption">
                <div class="caption-content">
                    <h4 class="animate-up">Myanmar Traditional Handicrafts</h4>
                    <p class="animate-up-delay">Discover beautiful handmade crafts created by talented Myanmar artisans. <br>Each product reflects our culture, tradition, and unique craftsmanship.</p>
                    <button class="btn btn-danger btn-lg rounded-pill animate-up-btn">Shop Now</button>
                </div>
            </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
            <div class="carousel-image-container">
                <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-49-26.jpg')}}" class="d-block w-100 zoom-effect" alt="Handmade Crafts">
            </div>
            <div class="carousel-caption d-none d-md-block text-start custom-caption">
                <div class="caption-content">
                    <h4 class="animate-up">Authentic Handmade Crafts</h4>
                    <p class="animate-up-delay">Explore a collection of traditional handicrafts made with care and <br>creativity. Perfect for gifts and home decoration.</p>
                    <button class="btn btn-danger btn-lg rounded-pill animate-up-btn">Shop Now</button>
                </div>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon p-3 bg-dark rounded-circle" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon p-3 bg-dark rounded-circle" aria-hidden="true"></span>
    </button>
</div>
<!--carousel end-->



{{-- Best Seller Section --}}
<section class="container my-5" id="products">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Best Sellers</h2>
        <hr class="divided mx-auto">
    </div>

    {{-- Slide animation class --}}
    <div class="best-seller-slider">
        @foreach($products->take(8) as $product)
        <div class="px-2"> {{-- Spacing for the slider --}}
            <div class="product-card h-100 border-0 shadow-sm rounded p-2">
                <div class="product-img-container rounded position-relative overflow-hidden">
                    
                    {{-- IMAGE PATH --}}
                    <img src="{{ asset('storage/' . $product->image) }}" 
                    class="img-fluid zoom-img w-100" 
                    alt="{{ $product->name }}"
                    style="height: 250px; object-fit: cover;"
                    onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">



                    {{-- Animated Hover Overlay --}}
                    <div class="product-overlay d-flex align-items-center justify-content-center">
                        <a href="{{ route('frontend.product.details', $product->id) }}" class="overlay-btn mx-1">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        
                        <a href="#" class="overlay-btn mx-1">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>

                <div class="product-info mt-3 text-center">
                    {{-- UPDATED TO $product->name --}}
                    <h6 class="fw-bold mb-1" style="font-family: 'PT Serif', serif;">{{ $product->name }}</h6>
                    <p class="text-danger fw-bold mb-2">{{ number_format($product->price) }} MMK</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
{{-- end best seller --}}



{{-- Explore By Categories --}}
<section class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Explore By Categories</h2>
        <hr class="divided mx-auto" style="width: 50px; border-top: 3px solid red;">
    </div>

    <div class="row g-4">
        @foreach($categories as $cat)
        <div class="col-md-6 col-lg-3">
            <div class="product-card border-0 shadow-sm rounded p-2 bg-white">
                <div class="product-img-container rounded position-relative overflow-hidden">
                    
                    {{-- IMAGE PATH --}}
                    <img src="{{ asset('frontend_assets/images/' . Str::slug($cat->name) . '.jpg') }}" 
                         class="img-fluid zoom-img w-100" 
                         alt="{{ $cat->name }}"
                         style="height: 200px; object-fit: cover;"
                         onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
                    
                    <div class="product-overlay d-flex align-items-center justify-content-center">
                        <a href="{{ url('/category/'.$cat->id) }}" 
                           class="overlay-btn bg-danger text-white border-0 d-flex align-items-center justify-content-center" 
                           style="width: 45px; height: 45px; border-radius: 5px; transition: 0.3s;">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>
                </div>

                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1 text-dark" style="font-family: 'PT Serif', serif;">{{ $cat->name }}</h6>
                    <a href="{{ url('/category/'.$cat->id) }}" class="text-decoration-none">
                        <p class="text-danger fw-bold small mb-0">Explore Collection</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--new arrival item start-->
    {{-- <div class="container my-5">
        <h4 class="mb-0 pb-0">New Arrival Items</h4>
        <hr class="divided pt-0 mt-1 mb-4">

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis1.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>

            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis2.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>


            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis3.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>

            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis4.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>


            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis5.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>


            <div class="col mb-3">
                <div class="shadow-lg p-4 rounded">
                    <div class="new_arrival_img_hover">
                        <img src="images/dis6.jpg" class="img-fluid">
                        <div class="view_detail">
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>

                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">
                    <hr style="width: 49%;border: 2px solid red;display: inline-block;">

                    <p class="my-0 py-0">Gucci T-Shirt</p>
                    <p>
                        Women
                        <span class="float-end">60,000MMK</span>
                    </p>
                </div>
            </div>

        </div>
    </div> --}}
{{-- end new arrival item--}}



<!-- start subscribe -->
<div class="container-fluid bg-danger shadow-sm">
    <div class="container py-5">
        <div class="row align-items-center text-white">
            <div class="col-12 col-md-6 my-2 order-1 order-md-0 animate-on-scroll">
                <h2 class="fw-bold mb-3" style="font-family: 'PT Serif', serif;">Stay in the Loop</h2>
                <p class="mb-4 opacity-75">Join our community to receive updates on new Myanmar handicraft collections, artisan stories, and exclusive offers.</p>
                <div class="input-group mb-3 bg-white p-1 rounded-pill">
                    <input type="email" class="form-control border-0 px-4" placeholder="Enter your email" style="box-shadow: none;">
                    <button class="btn btn-dark rounded-pill px-4 fw-bold" type="button">Subscribe</button>
                </div>
            </div>

            <div class="col-12 col-md-6 my-2 text-center text-md-end order-0 order-md-1">
                <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" alt="Subscribe" class="img-fluid w-75 rounded-3 floating-img">
            </div>
        </div>
    </div>
</div>
<!-- end subscribe -->



{{-- Review Section --}}
<section class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Customer Reviews</h2>
        <hr class="divided mx-auto">
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-4">
            <div class="card review-card border-0 shadow-sm h-100 p-4">
                <div class="stars mb-3">
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                </div>
                <p class="text-muted fst-italic mb-4">
                    "Great handicrafts with authentic Myanmar style. The materials and finishing are very impressive. It’s nice to support local artisans."
                </p>
                <div class="d-flex align-items-center mt-auto">
                    <img src="{{ asset('frontend_assets/images/rev1.jpg')}}" height="50" width="50" class="rounded-circle me-3 border border-danger p-1">
                    <div>
                        <h6 class="mb-0 fw-bold">Ko Min</h6>
                        <small class="text-secondary">Verified Buyer</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card review-card border-0 shadow-sm h-100 p-4">
                <div class="stars mb-3">
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                </div>
                <p class="text-muted fst-italic mb-4">
                    "I really love the unique and creative designs. Each product looks carefully handmade. Perfect for gifts and home decoration."
                </p>
                <div class="d-flex align-items-center mt-auto">
                    <img src="{{ asset('frontend_assets/images/review4.jpg')}}" height="50" width="50" class="rounded-circle me-3 border border-danger p-1">
                    <div>
                        <h6 class="mb-0 fw-bold">Su Su</h6>
                        <small class="text-secondary">Happy Customer</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card review-card border-0 shadow-sm h-100 p-4">
                <div class="stars mb-3">
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                    <i class="fas fa-star" style="color: #ff9800;"></i>
                </div>
                <p class="text-muted fst-italic mb-4">
                    "A wonderful collection of Myanmar traditional crafts. Culturally meaningful and shopping on the website is very easy."
                </p>
                <div class="d-flex align-items-center mt-auto">
                    <img src="{{ asset('frontend_assets/images/review6.jpg')}}" height="50" width="50" class="rounded-circle me-3 border border-danger p-1">
                    <div>
                        <h6 class="mb-0 fw-bold">Thiha</h6>
                        <small class="text-secondary">Verified Buyer</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end review --}}

 {{-- <!-- start promotion area -->
    <div class="container my-5">
        <h4 class="mb-0 pb-0">Promotion Areas</h4>
        <hr class="divided pt-0 mt-1 mb-4">
        <div class="row">
            <div class="col-12 col-md-6 my-2">
                <img src="images/1.jpg" alt="" class="img-fluid rounded shadow_box">
            </div>
            <div class="col-12 col-md-6 my-2">
                <img src="images/2.jpg" alt="" class="img-fluid rounded shadow_box">
            </div>
        </div>
    </div> --}}
{{-- end promotion area --}}
@endsection