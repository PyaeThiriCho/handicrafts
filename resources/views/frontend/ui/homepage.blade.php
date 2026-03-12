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


{{-- Best Seller --}}
<section class="container my-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Best Sellers</h2>
        <hr class="divided mx-auto">
    </div>

    <div class="best-seller-slider">
        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                    <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Traditional Lacquerware</h6>
                    <p class="text-danger fw-bold">45,000 MMK</p>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                    <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Bamboo Sun Hat</h6>
                    <p class="text-danger fw-bold">12,000 MMK</p>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                   <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Lotus Silk Scarf</h6>
                    <p class="text-danger fw-bold">85,000 MMK</p>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                  <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Teak Wood Carving</h6>
                    <p class="text-danger fw-bold">120,000 MMK</p>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                    <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Marble Buddha Statue</h6>
                    <p class="text-danger fw-bold">250,000 MMK</p>
                </div>
            </div>
        </div>

        <div class="px-2">
            <div class="product-card">
                <div class="product-img-container rounded">
                    <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Hand-painted Umbrella</h6>
                    <p class="text-danger fw-bold">18,000 MMK</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- End Best Seller --}}


{{-- Explore By Categories --}}
<section class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif;">Explore By Categories</h2>
        <hr class="divided mx-auto">
    </div>

    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <div class="product-img-container rounded shadow-sm">
                     <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid zoom-img" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Myanmar Textiles</h6>
                    <p class="text-danger fw-bold small">Explore Collection</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <div class="product-img-container rounded shadow-sm">
                      <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid zoom-img" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Teak Woodwork</h6>
                    <p class="text-danger fw-bold small">Explore Collection</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <div class="product-img-container rounded shadow-sm">
                     <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid zoom-img" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Handmade Ceramics</h6>
                    <p class="text-danger fw-bold small">Explore Collection</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="product-card">
                <div class="product-img-container rounded shadow-sm">
                     <img src="{{ asset('frontend_assets/images/about1.jpg')}}" class="img-fluid zoom-img" alt="Handicraft">
                    <div class="product-overlay">
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-eye"></i></a>
                        <a href="#" class="overlay-btn"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
                <div class="product-info mt-3 text-center">
                    <h6 class="fw-bold mb-1">Traditional Jewelry</h6>
                    <p class="text-danger fw-bold small">Explore Collection</p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ url('/categories') }}" class="btn btn-outline-danger px-5 py-2 fw-bold rounded-pill shadow-sm view-all-btn">
            View All Categories <i class="fa-solid fa-arrow-right ms-2"></i>
        </a>
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


<!--Review-->
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