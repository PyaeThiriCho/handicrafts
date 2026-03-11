@extends('frontend.layout')
@section('content')
  
  <!--carousel start-->
   <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
         <img src="{{ asset('frontend_assets/images/Bagan-Myanmar-sunset (1).jpg')}}" width="50" height="500"  class="d-block w-100" alt="...">
    
            <div class="carousel_text text-white d-none d-sm-block">
                <h4>Raining Season Promotion</h4>
                <p class="d-none d-md-block">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Sed doloremque animi dolorem cum rerum laudantium accusamus,<br> iste eius culpa laborum!
                </p>
                <button class="btn btn-danger d-none d-md-block">Shop Now</button>

             </div>
        </div>

      <div class="carousel-item">
        <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-49-26.jpg')}}" width="30" height="500" class="d-block w-100" alt="...">
            <div class="carousel_text text-white d-none d-sm-block">
                <h4>Winter Season Promotion</h4>
                <p class="d-none d-md-block">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Sed doloremque animi dolorem cum rerum laudantium ''accusamus,<br> iste eius culpa laborum!
                </p>
                <button class="btn btn-danger d-none d-md-block">Shop Now</button>

            </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-49-26 (2).jpg')}}" width="50"x height="500"  class="d-block w-100" alt="...">
        <div class="carousel_text text-white d-none d-sm-block">
            <h4>Summer Season Promotion</h4>
            <p class="d-none d-md-block">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Sed doloremque animi dolorem cum rerum laudantium accusamus,<br> iste eius culpa laborum!
            </p>
            <button class="btn btn-danger d-none d-md-block">Shop Now</button>

        </div> 
      </div>
   
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    <!--carousel end-->

    <!--service start-->
    <div class="container  my-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 my-2">
                <div class="card py-3 px-3">
                    <div class="row">
                        <div class="col-8 col-md-3 text-center">
                            <i class="fa-solid fa-truck-fast fa-2x mt-2 ms-2"></i>
                        </div>

                        <div class="col-4 col-md-9">
                            <h6 class="fw-bold">Fast & Free Shipping</h6>
                            <p class="text-secondary">For order form 50,000MMK</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 my-2">
                <div class="card py-3 px-3">
                    <div class="row">
                        <div class="col-8 col-md-3 text-center">
                            <i class="fa-solid fa-truck-fast fa-2x mt-2 ms-2"></i>
                        </div>

                        <div class="col-4 col-md-9">
                            <h6 class="fw-bold">Fast & Free Shipping</h6>
                            <p class="text-secondary">For order form 50,000MMK</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 my-2">
                <div class="card py-3 px-3">
                    <div class="row">
                        <div class="col-8 col-md-3 text-center">
                            <i class="fa-solid fa-truck-fast fa-2x mt-2 ms-2"></i>
                        </div>

                        <div class="col-4 col-md-9">
                            <h6 class="fw-bold">Fast & Free Shipping</h6>
                            <p class="text-secondary">For order form 50,000MMK</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 my-2">
                <div class="card py-3 px-3">
                    <div class="row">
                        <div class="col-8 col-md-3 text-center">
                            <i class="fa-solid fa-truck-fast fa-2x mt-2 ms-2"></i>
                        </div>

                        <div class="col-4 col-md-9">
                            <h6 class="fw-bold">Fast & Free Shipping</h6>
                            <p class="text-secondary">For order form 50,000MMK</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
<!--service end -->


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
                    <img src="images/photo_2025-04-30_08-32-09.jpg" alt="" class="img-fluid w-75">
                </div>
            </div>
        </div>
    </div>
    <!-- end subscribe -->

    <!-- start promotion area -->
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
    </div>


@endsection