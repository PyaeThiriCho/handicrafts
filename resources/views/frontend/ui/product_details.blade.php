@extends('frontend.layout')

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            {{-- Drawing the handicraft image from storage --}}
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0 shadow rounded" 
                    src="{{ asset($product->image) }}" 
                     alt="{{ $product->name }}" 
                     style="width: 100%; height: auto; object-fit: cover;"
                     onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
            </div>
            
            <div class="col-md-6">
                <div class="small mb-1 text-muted">SKU: PSM-{{ $product->id }}</div>
                <h1 class="display-5 fw-bolder" style="font-family: 'PT Serif', serif;">{{ $product->name }}</h1>
                
                <div class="fs-5 mb-4">
                    <span class="text-danger fw-bold">{{ number_format($product->price) }} MMK</span>
                </div>
                
                <p class="lead">{{ $product->description ?? 'A unique, handmade creation from Mandalay that tells a story of tradition and skill.' }}</p>
                
                <div class="d-flex align-items-center mt-4">
                    <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" min="1" style="max-width: 4rem" />
                    <button class="btn btn-dark flex-shrink-0 px-4 py-2" type="button">
                        <i class="fas fa-cart-plus me-2"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related items section --}}
{{-- Related items section --}}
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4" style="font-family: 'PT Serif', serif;">Related Products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @forelse($relatedProducts as $related)
            <div class="col mb-5">
                <div class="card h-100 border-0 shadow-sm rounded">
                    
                    {{-- FIXED: Changed $product->image to $related->image --}}
                    <img class="card-img-top" 
                         src="{{ asset($related->image) }}" 
                         alt="{{ $related->name }}" 
                         style="height: 200px; object-fit: cover;"
                         onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
                    
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bolder" style="font-family: 'PT Serif', serif; font-size: 1.1rem;">{{ $related->name }}</h5>
                        <p class="text-danger fw-bold">{{ number_format($related->price) }} MMK</p>
                    </div>
                    
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                        <a href="{{ route('frontend.product.details', $related->id) }}" class="btn btn-outline-dark mt-auto btn-sm">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-4">
                <p>No other products found in this category.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>
@endsection