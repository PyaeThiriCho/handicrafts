@extends('frontend.layout')

@section('content')
<div class="container py-5" style="background-color: #fcf6e9; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <h3 class="text-center fw-bold mb-4" style="color: #4a3728;">Order Summary</h3>

            <div class="card border-0 shadow-sm rounded-4 mb-4" style="background-color: #ffffff;">
                <div class="card-body p-4">
                    
                    <div class="product-list mb-4">
                        @foreach($basket as $item)
                        <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="me-3 p-1 border rounded-3 bg-white">
                                    <img src="{{ asset($item['image'] ?? 'images/default.png') }}" class="rounded-2" style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="small text-muted">{{ $item['item'] }} x {{ number_format($item['price']) }} K</div>
                                </div>
                            </div>
                            <div class="fw-bold" style="color: #2c3e50;">{{ number_format($item['price'] * $item['item']) }} K</div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold h5 mb-0">Total</span>
                        <span class="fw-bold h5 mb-0 text-primary" style="color: #4c84ff !important;">
                            {{ number_format($total) }} K
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-muted small">Payment</span>
                        <span class="badge border border-primary text-primary px-3 py-1 text-uppercase" style="font-size: 0.75rem;">
                            {{ $customerInfo['payment_method'] ?? 'KPAY' }}
                        </span>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="mb-3">
                            <label class="small text-muted mb-1">Customer Note</label>
                            <textarea class="form-control border-0 bg-light" rows="2" placeholder="Write your note here..."></textarea>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold small mb-2">Customer Info</h6>
                        <div class="text-muted small">
                            <div class="fw-bold text-dark">{{ $customerInfo['customer_name'] ?? 'Pyae Thiri Cho' }}, {{ $customerInfo['phone'] ?? '09255409595' }}</div>
                            <div>{{ $customerInfo['address'] ?? 'Pyin Oo Lwin' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-dark w-100 rounded-pill py-2 fw-bold bg-white shadow-sm">
                        ← Back
                    </a>
                </div>
                <div class="col-6">
                    <form action="{{ route('order.place') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm" style="background-color: #6c9eff; border: none;">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    /* Styling to match PSM Theme */
    .form-control:focus {
        box-shadow: none;
        background-color: #f8f9fa;
    }
    .btn-primary:hover {
        background-color: #568efd !important;
    }
</style>
@endsection