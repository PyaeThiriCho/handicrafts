<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSM Craft House | Authentic Myanmar Handicrafts</title>

    <link rel="stylesheet" href="{{ asset('frontend_assets/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend_assets/font/css/all.min.css')}}">

    <style>
        :root {
            --bg-canvas: #FAF8F5; /* Elegant Antique Cream Canvas */
            --color-primary: #6B1D2F; /* Deep Authentic Bagan Crimson Ochre */
            --color-dark: #232323; /* Soft Premium Charcoal Black */
            --color-muted: #7E7873; /* Warm Mud Earth Gray */
            --color-gold: #C9A227; /* Gilt accent — lacquerware & parasol trim */
            --color-gold-soft: #E7CE7C;
            --font-serif: 'Playfair Display', Georgia, serif;
            --font-sans: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--color-dark);
            font-family: var(--font-sans);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, .serif-heading {
            font-family: var(--font-serif);
            color: var(--color-dark);
        }

        /* High-End Micro-Interactions & Animations */
        .premium-card {
            background: #ffffff;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(107, 29, 47, 0.03) !important;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease !important;
        }

        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(107, 29, 47, 0.08) !important;
        }

        .img-zoom-wrapper {
            overflow: hidden;
            border-radius: 12px;
        }

        .img-zoom-wrapper img {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .premium-card:hover .img-zoom-wrapper img {
            transform: scale(1.06);
        }

        /* Sidebar/Offcanvas Luxury Adjustments */
        .sidebar-menu {
            background-color: var(--bg-canvas) !important;
            border-right: 1px solid rgba(107, 29, 47, 0.08) !important;
            width: 320px !important;
        }

        .sidebar-link {
            font-family: var(--font-serif);
            font-size: 1.15rem;
            color: var(--color-dark);
            padding: 12px 20px;
            display: block;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-bottom: 5px;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: rgba(107, 29, 47, 0.05);
            color: var(--color-primary);
            padding-left: 28px;
        }

        /* Clean System Toast Overrides */
        .system-notification {
            border-radius: 12px !important;
            font-family: var(--font-sans);
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/psm-enhancements.css')}}">
</head>
<body>

    {{-- Navigation Shell --}}
    @include('frontend.parts.navbar')

    {{-- Fixed ribbon tab — a persistent, physical invitation into the sidebar --}}
    <button type="button"
            class="browse-ribbon"
            data-bs-toggle="offcanvas"
            data-bs-target="#categorySidebar"
            aria-controls="categorySidebar"
            aria-label="Browse craft collections">
        <span>Browse Crafts</span>
        <i class="fa-solid fa-angle-right"></i>
    </button>

    {{-- Sliding Left Sidebar Drawer Component --}}
    <div class="offcanvas offcanvas-start sidebar-menu" tabindex="-1" id="categorySidebar" aria-labelledby="categorySidebarLabel">
        <div class="offcanvas-header border-bottom border-light px-4 pt-4">
            <div>
                <span class="sidebar-eyebrow">Handcrafted Masterworks</span>
                <h4 class="offcanvas-title fw-bold text-uppercase tracking-wider mb-0" id="categorySidebarLabel" style="font-size: 1.1rem; color: var(--color-primary);">
                    <i class="fa-solid fa-sliders me-2"></i> Collections
                </h4>
            </div>
            <button type="button" class="btn-close text-reset shadow-none" data-bs-canvas="offcanvas" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">

            <div class="text-center mb-3">
                <svg class="sidebar-ring-icon" width="30" height="30" viewBox="0 0 34 34" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="17" cy="17" r="15" fill="none" stroke="#6B1D2F" stroke-width="1"/>
                    <circle cx="17" cy="17" r="10" fill="none" stroke="#C9A227" stroke-width="1"/>
                    <circle cx="17" cy="17" r="2" fill="#6B1D2F"/>
                </svg>
            </div>

            <p class="text-muted small text-uppercase fw-bold mb-3" style="letter-spacing: 1px;">Craft Collections</p>

            @php
                $sidebarThumbs = [
                    1 => 'images/lacquerware/photo (1).jpg',
                    2 => 'images/umbrellas/photo (2).jpg',
                    3 => 'images/puppets/photo (3).jpg',
                    4 => 'images/pottery/photo (4).jpg',
                    5 => 'images/bamboo-basket/photo (5).jpg',
                ];
            @endphp

            {{-- Unified Left-Sidebar Loop Configuration --}}
            @foreach($categories as $cat)
                <a class="sidebar-link d-flex align-items-center gap-3" href="{{ route('frontend.category', $cat->id) }}">
                    <img src="{{ asset($sidebarThumbs[$cat->id] ?? 'frontend_assets/images/about1.jpg') }}"
                         class="sidebar-thumb"
                         alt=""
                         onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
                    <span class="flex-grow-1">{{ $cat->name }}</span>
                    <i class="fa-solid fa-chevron-right small opacity-50" style="font-size: 0.75rem;"></i>
                </a>
            @endforeach

            <hr class="my-4 opacity-25" style="color: var(--color-primary)">
            <a class="sidebar-link text-danger" href="{{ route('homepage') }}">
                <i class="fa-solid fa-border-all me-2"></i> View All Crafts
            </a>

            <p class="sidebar-footer-note">
                "Every piece carries the hand of its maker — no two are identical."
            </p>
        </div>
    </div>

    {{-- Main View Frame --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Shell --}}
    @include('frontend.parts.footer')

    <script src="{{ asset('frontend_assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/slick.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend_assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/font/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/psm-animations.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/psm-animations.js')}}"></script>

    {{-- Flash Notifications --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('message'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 4500,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'system-notification shadow-lg mt-2'
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: 'PSM Craft House',
                    text: "{{ session('message') }}"
                });

                if (window.navigator.vibrate) {
                    window.navigator.vibrate([200, 100, 200]);
                }
            @endif
        });
    </script>
</body>
</html>