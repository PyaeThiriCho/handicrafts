<div class="bg-danger text-white">
    <div class="container py-1">
        <div class="row">
            <div class="col-6 col-md-9">
                <small>
                    <span class="me-3 d-none d-md-inline-block"><i class="fa-solid fa-location-dot me-1"></i>Mandalay,Myotha</span>
                    <span><i class="fa-solid fa-phone-volume me-1"></i>09-255409595</span>
                </small>
            </div>

            <div class="col-6 col-md-3 text-end">
                <small>
                    Follow Us:
                    <a href="" target="_blank"><i class="fa-brands fa-facebook ms-2 text-white"></i></a>
                    <a href="" target="_blank"><i class="fa-brands fa-instagram ms-2 text-white"></i></a>
                    <a href="" target="_blank"><i class="fa-brands fa-tiktok ms-2 text-white"></i></a>
                </small>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" width="100" height="45">
        

        <button class="navbar-toggler" data-bs-target="#navBar" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navBar" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="" class="nav-link ms-3 fw-medium nav_hover">Home</a></li>
                {{-- <li class="nav-item"><a href="" class="nav-link ms-3 fw-medium nav_hover">Shop</a></li> --}}

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle ms-3 fw-medium nav_hover" data-bs-toggle="dropdown">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav_hover" href="#">Women</a></li>
                        <li><a class="dropdown-item nav_hover" href="#">Men</a></li>
                        <li><a class="dropdown-item nav_hover" href="#">Kid</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="" class="nav-link ms-3 fw-medium nav_hover">About</a></li>
                <li class="nav-item"><a href="" class="nav-link ms-3 fw-medium nav_hover">Contact</a></li>
                <li class="nav-item"><a href="" class="nav-link ms-3 nav_hover">Register</a></li>
                <li class="nav-item"><a href="" class="nav-link ms-3 nav_hover">Login</a></li>

                <li class="nav-item">
                    <a href="" class="nav-link ms-3">
                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        <span class="cart_noti">0</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="" class="nav-link ms-3">
                        <i class="fa-solid fa-magnifying-glass fa-rotate-90"></i>
                    </a>
                </li>
    
            </ul>
        </div>
    </div>
</nav>
