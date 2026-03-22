@extends('frontend.layout')
@section('content')


<section class="container my-5 pb-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="font-family: 'PT Serif', serif; color: #333;">Our Traditional Collection</h2>
        <hr class="mx-auto" style="width: 60px; height: 3px; background-color: #dc3545; border: none; opacity: 1;">
    </div>

    <div class="row g-4">
        {{--Drawing each product from your Backend --}}
        @foreach($products as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="product-card h-100 border-0">
                
                {{-- 1. IMAGE  --}}
                <div class="product-img-container rounded shadow-sm position-relative overflow-hidden">
                    {{-- Check if image exists, otherwise show a placeholder --}}
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="img-fluid zoom-img w-100" 
                             alt="{{ $product->product_name }}"
                             style="height: 280px; object-fit: cover;">
                    @else
                        <img src="{{ asset('frontend_assets/images/placeholder.jpg') }}" 
                             class="img-fluid zoom-img w-100" 
                             style="height: 280px; object-fit: cover;">
                    @endif

                    {{-- 2. HOVER OVERLAY --}}
                    <div class="product-overlay d-flex align-items-center justify-content-center">
                        <a href="{{ route('frontend.product.details', $product->id) }}" class="overlay-btn mx-1" title="View Details">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="#" class="overlay-btn mx-1" title="Add to Cart">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                </div>

                {{-- 3. PRODUCT INFO--}}
                <div class="product-info mt-3 text-center">
                    <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.75rem; letter-spacing: 1px;">
                        {{ $product->category->name }}
                    </small>
                    <h6 class="fw-bold mb-1 text-dark" style="font-family: 'PT Serif', serif;">
                        {{ $product->product_name }}
                    </h6>
                    <p class="text-danger fw-bold mb-2">
                        {{ number_format($product->price) }} MMK
                    </p>
                    
                    <a href="{{ route('frontend.product.details', $product->id) }}" class="text-decoration-none">
                        <small class="fw-bold text-muted border-bottom border-danger">EXPLORE DETAILS</small>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        {{-- END THE LOOP --}}
    </div>
</section>

@endsection

<style>
    /* Image Zoom */
    .product-img-container .zoom-img {
        transition: transform 0.7s ease;
    }
    .product-card:hover .zoom-img {
        transform: scale(1.15);
    }

    /* Overlay Darken */
    .product-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.35);
        opacity: 0;
        transition: all 0.4s ease;
    }
    .product-card:hover .product-overlay {
        opacity: 1;
    }

    /* Buttons Slide Up */
    .overlay-btn {
        background: #fff;
        color: #dc3545;
        width: 42px; height: 42px;
        line-height: 42px;
        text-align: center;
        border-radius: 50%;
        transition: 0.3s ease;
        transform: translateY(30px);
        text-decoration: none;
        display: inline-block;
    }
    .product-card:hover .overlay-btn {
        transform: translateY(0);
    }
    .overlay-btn:hover {
        background: #dc3545;
        color: #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
</style>