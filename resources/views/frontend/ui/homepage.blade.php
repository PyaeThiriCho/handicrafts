@extends('frontend.layout')
@section('content')
  
  <!--carousel start-->
 <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <div class="carousel-image-container">
                <img src="{{ asset('frontend_assets/images/Bagan-Myanmar-sunset (1).jpg')}}" class="d-block w-100 zoom-effect" alt="Bagan Sunset">
            </div>
            <div class="carousel-caption d-none d-md-block text-start custom-caption">
                <div class="caption-content">
                    <h4 class="animate-up">Myanmar Traditional Handicrafts</h4>
                    <p class="animate-up-delay">Discover beautiful handmade crafts created by talented Myanmar artisans. Each product reflects our culture, tradition, and unique craftsmanship.</p>
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
                    <p class="animate-up-delay">Explore a collection of traditional handicrafts made with care and creativity. Perfect for gifts and home decoration.</p>
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



<!--promotion start-->
<div class="container  my-5">
  <h4 class="mb-0 pb-0">Promotions Items</h4>
  <hr class="divided pt-0 mt-1 mb-4">
   <section class="customer-logos slider">
        <div class="slide card">
            <a href="detail.html"><img src="images/dis1.jpg"></a>
            <p class="text-center">Nike Polo T-shirt</p>
            <div class="Promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis6.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis6.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis5.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis6.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis2.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis3.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis4.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis6.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis4.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>
     
        <div class="slide card">
            <img src="images/dis1.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

        <div class="slide card">
            <img src="images/dis3.jpg">
            <p class="text-center">Nike Polo T-Shirt</p>
            <div class="promotion_price">
                <small class="normal_price d-block text-decoration-line-through">70,000MMK</small>
                <small class="dis_price">55,000MMK</small>
            </div>
        </div>

   </section>
</div>
    <!--promotion end-->


<!--new arrival item start-->
    <div class="container my-5">
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
    </div>




     <!-- start subscribe -->
     <div class="container-fluid bg-danger">
        <div class="container py-3">
            <div class="row text-white">
                <div class="col-12 col-md-6 my-2 order-1 order-md-0">
                    <h3 class="mt-5 pt-3 mb-3">Subscribe to our Channel</h3>
                    <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam unde nesciunt a id animi recusandae, incidunt ipsa repudiandae eveniet corrupti.</p>
                    <div class="input-group my-4">
                        <input type="text" class="form-control" placeholder="example@gmail.com" >
                        <button class="btn btn-dark" type="button" id="button-addon2">Subscribe</button>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-2 text-center text-md-end order-0 order-md-1">
                    <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" alt="" class="img-fluid w-75 ">
                </div>
            </div>
        </div>
    </div>
    <!-- end subscribe -->

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

    <!--Review-->
    <div class="container my-5">
        <h1 class="font_h1 text-center text-secondary mb-3 my-0">Customer's Review</h1>
        <div class="row">

            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="stars py-3 px-2">
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                    </div>

                    <p class="px-2">
                       Great handicrafts with authentic Myanmar style.
                        The materials and finishing are very impressive.
                        It’s nice to support local artisans and traditions.
                        Overall, a very satisfying shopping experience.
                    </p>

                    <div class="row ms-1">
                        <div class="col-md-3 py-3">
                            <div class="user">
                                <img src="{{ asset('frontend_assets/images/rev1.jpg')}}" height="50" width="50" class="rounded-circle">
                            </div>
                        </div>

                        <div class="col-md-9 py-3">
                            <h5 class="mb-0 px-0">Ko Min</h5>
                            <small  style="color: gray;">Happy Customer</small>
                        </div>
                    </div>

                </div>
            </div>


             <div class="col-12 col-md-4">
                <div class="card">
                    <div class="stars py-3 px-2">
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                    </div>

                    <p class="px-2">
                        I really love the unique and creative designs.
                        Each product looks carefully handmade by skilled artisans.
                        The quality is very good and worth the price.
                        Perfect for gifts and home decoration.
                    </p>

                    <div class="row ms-1">
                        <div class="col-md-3 py-3">
                            <div class="user">
                                    <img src="{{ asset('frontend_assets/images/review4.jpg')}}" height="50" width="50" class="rounded-circle">
                            </div>
                        </div>

                        <div class="col-md-9 py-3">
                            <h5 class="mb-0 px-0">Su Su</h5>
                            <small  style="color: gray;">Happy Customer</small>
                        </div>
                    </div>

                </div>
            </div>


             <div class="col-12 col-md-4">
                <div class="card">
                    <div class="stars py-3 px-2">
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                        <i class="fas fa-star" style="color: red;"></i>
                    </div>

                    <p class="px-2">
                        A wonderful collection of Myanmar traditional crafts.
                        The products are beautiful and culturally meaningful.
                        Shopping on the website is easy and convenient.
                        I will definitely buy again in the future.
                    </p>

                    <div class="row ms-1">
                        <div class="col-md-3 py-3">
                            <div class="user">
                                <img src="{{ asset('frontend_assets/images/review6.jpg')}}" height="50" width="50" class="rounded-circle">
                            </div>
                        </div>

                        <div class="col-md-9 py-3">
                            <h5 class="mb-0 px-0">Thiha</h5>
                            <small  style="color: gray;">Happy Customer</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection