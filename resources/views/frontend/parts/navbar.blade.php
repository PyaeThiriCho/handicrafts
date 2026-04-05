<div class="bg-danger text-white">
    <div class="container py-1">
        <div class="row">
            <div class="col-6 col-md-9">
                <small>
                    <span class="me-3 d-none d-md-inline-block"><i class="fa-solid fa-location-dot me-1"></i>Mandalay,Myanmar</span>
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

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a href="{{ route('homepage') }}">
            <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" width="100" height="45">
        </a>

        <button class="navbar-toggler" data-bs-target="#navBar" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navBar" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link ms-3 fw-medium nav_hover">Home</a></li>

        {{-- Product --}}
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle ms-3 fw-medium nav_hover" data-bs-toggle="dropdown">
                Products
            </a> 

            <ul class="dropdown-menu border-0 shadow-sm">
                {{-- THE LOOP  --}}
                @foreach($categories as $cat)
                    <li>
                        <a class="dropdown-item nav_hover" href="{{ route('frontend.category', $cat->id) }}">
                            {{ $cat->name }}
                        </a>
                    </li>
                @endforeach
                
                {{-- Show a 'View All' option --}}
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item nav_hover text-danger" href="{{ route('homepage') }}">View All Crafts</a></li>
            </ul>
        </li>



                <li class="nav-item"><a href="{{ route('aboutpage') }}" class="nav-link ms-3 fw-medium nav_hover">About</a></li>
                <li class="nav-item"><a href="{{ route('contactpage') }}" class="nav-link ms-3 fw-medium nav_hover">Contact</a></li>

                {{-- AUTHENTICATION LINKS --}}
                @guest
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link ms-3 nav_hover">Register</a></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link ms-3 nav_hover">Login</a></li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-3 fw-bold text-danger nav_hover" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-circle-user me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            @if(Auth::user()->hasRole('Admin'))
                                <li><a class="dropdown-item small" href="{{ route('table') }}"><i class="fa-solid fa-gauge-high me-2"></i>Admin Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <a class="dropdown-item small text-danger" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                {{-- ICONS --}}
                <li class="nav-item">
                    <a href="{{ route('cartpage') }}" class="nav-link ms-3">
                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        <span id="cartCount" class="cart_noti">0</span>
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