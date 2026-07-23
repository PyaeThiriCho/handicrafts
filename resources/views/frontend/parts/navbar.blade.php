<div class="py-2 text-white" style="background-color: var(--color-primary); font-size: 0.85rem; letter-spacing: 0.5px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <span class="me-3"><i class="fa-solid fa-location-dot me-1 text-white-50"></i> Mandalay, Myanmar</span>
                <span class="d-none d-md-inline-block"><i class="fa-solid fa-phone me-1 text-white-50"></i> 09-255409595</span>
            </div>
            <div class="col-6 text-end">
                <span class="opacity-75 me-2">Follow Us:</span>
                <a href="#" class="text-white me-2"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-white py-3" style="box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            <img src="{{ asset('frontend_assets/images/photo_2026-03-11_21-05-52.jpg')}}" width="110" height="50" style="object-fit: contain;" alt="PSM Craft House">
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navBar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navBar" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a href="{{ route('homepage') }}" class="nav-link px-3 fw-medium">Home</a></li>

                <li class="nav-item">
                    <a href="#" class="nav-link px-3 fw-medium text-dark d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#categorySidebar">
                        <span>Browse Crafts</span>
                        <i class="fa-solid fa-bars-staggered ms-2 text-danger" style="font-size: 0.85rem;"></i>
                    </a>
                </li>

                <li class="nav-item"><a href="{{ route('aboutpage') }}" class="nav-link px-3 fw-medium">About</a></li>
                <li class="nav-item"><a href="{{ route('contactpage') }}" class="nav-link px-3 fw-medium">Contact</a></li>

                <li class="d-none d-lg-block mx-2 text-muted opacity-25">|</li>

                {{-- User Authentication Dynamic Nodes --}}
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link px-2 fw-medium text-muted">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 ms-2">Join</a></li>
                @endguest

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 fw-bold" style="color: var(--color-primary);" href="#" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-circle-user me-1 fa-lg"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 p-2 rounded-3" style="min-width: 200px;">
                            @if(Auth::user()->hasRole('Admin'))
                                <li><a class="dropdown-item py-2 small rounded" href="{{ route('table') }}"><i class="fa-solid fa-gauge-high me-2 opacity-75"></i>Admin Dashboard</a></li>
                                <li><hr class="dropdown-divider opacity-50"></li>
                            @endif
                            <li>
                                <a class="dropdown-item py-2 small text-danger rounded" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket me-2 opacity-75"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item ms-2">
                    <a href="{{ route('cartpage') }}" class="nav-link position-relative p-2 text-dark">
                        <i class="fa-solid fa-bag-shopping fa-lg opacity-90"></i>
                        <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-circle" style="background-color: var(--color-primary); font-size: 0.65rem; padding: 4px 7px;">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>