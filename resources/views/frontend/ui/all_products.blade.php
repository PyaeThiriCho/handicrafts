{{-- All Products --}}

@extends('frontend.layout')
@section('content')
<div class="container-fluid py-5 mb-5" style="background: #f8f9fa; border-bottom: 1px solid #eee;">
    <div class="container text-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-secondary text-decoration-none small">Home</a></li>
                <li class="breadcrumb-item active small text-danger" aria-current="page">Categories</li>
            </ol>
        </nav>
        <h1 class="fw-bold display-5" style="font-family: 'PT Serif', serif;">{{ $category->name }}</h1>
        <p class="text-secondary mx-auto" style="max-width: 600px;">
            Discover our authentic, handcrafted {{ strtolower($category->name) }} collection, 
            sourced directly from traditional artisans in Mandalay.
        </p>
        <hr class="mx-auto" style="width: 50px; border-top: 3px solid red; opacity: 1;">
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row g-4 justify-content-center">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="product-card border-0 shadow-sm rounded p-3 bg-white h-100 text-center">
                    <div class="product-img-container rounded position-relative overflow-hidden mb-3" style="background: #fff;">
                        <img src="{{ asset($product->image) }}" 
                             class="img-fluid zoom-img w-100" 
                             alt="{{ $product->name }}"
                             style="height: 200px; object-fit: contain; padding: 10px;">
                        
                        <div class="product-overlay d-flex align-items-center justify-content-center">
                            <a href="{{ route('frontend.product.details', $product->id) }}" 
                               class="overlay-btn bg-danger text-white border-0 d-flex align-items-center justify-content-center shadow" 
                               style="width: 45px; height: 45px; border-radius: 8px; transition: 0.3s; text-decoration: none;">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            
                            <button onclick="addItem('{{$product->id}}', '{{$product->product_name}}', '{{$product->price}}', '{{asset($product->image)}}')" class="overlay-btn">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>

                    <div class="product-info">
                        <h6 class="fw-bold mb-1 text-dark" style="font-family: 'PT Serif', serif;">{{ $product->name }}</h6>
                        <p class="text-danger fw-bold mb-0 small">{{ number_format($product->price) }} MMK</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="mb-3">
                    <i class="fa-solid fa-box-open text-secondary opacity-25" style="font-size: 4rem;"></i>
                </div>
                <h4 class="text-secondary">No products found in this category.</h4>
                <a href="{{ url('/') }}" class="btn btn-outline-danger mt-3 px-4 rounded-pill">Back to Home</a>
            </div>
        @endforelse
    </div>
</div>

<style>
    .zoom-img { transition: transform .5s ease; }
    .product-card:hover .zoom-img { transform: scale(1.1); }
    .product-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.1); opacity: 0; transition: 0.3s;
    }
    .product-card:hover .product-overlay { opacity: 1; }
    .overlay-btn:hover { transform: scale(1.1); background-color: #bb2d3b !important; }
</style>
@endsection