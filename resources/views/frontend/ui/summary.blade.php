@extends('frontend.layout')

@section('content')
<div class="container py-5" style="background-color: var(--bg-canvas); min-height: 100vh;">
    <div class="row justify-content-center reveal">
        <div class="col-lg-8">

            <div class="text-center mb-4">
                <span class="text-uppercase small fw-bold text-brand" style="letter-spacing: 2px;">Review & Confirm</span>
                <h3 class="fw-bold mt-1" style="font-family: var(--font-serif); color: var(--color-dark);">Order Summary</h3>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4 transact-card" style="background-color: #ffffff;">
                <div class="card-body p-4">

                    <div class="product-list mb-4">
                        @foreach($basket as $item)
                        <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="me-3 p-1 border rounded-3 bg-white">
                                    <img src="{{ asset($item['image'] ?? 'images/default.png') }}" class="rounded-2" style="width: 70px; height: 70px; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="fw-bold" style="font-family: var(--font-serif);">{{ $item['name'] ?? 'Product' }}</div>
                                    <div class="small text-muted">{{ $item['item'] }} x {{ number_format($item['price']) }} K</div>
                                </div>
                            </div>
                            <div class="fw-bold text-brand">{{ number_format($item['price'] * $item['item']) }} K</div>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold h5 mb-0">Total</span>
                        <span class="fw-bold h5 mb-0 text-brand">
                            {{ number_format($total) }} K
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-muted small">Payment</span>
                        <span class="badge px-3 py-1 text-uppercase" style="font-size: 0.75rem; border: 1px solid var(--color-primary); color: var(--color-primary); background: transparent;">
                            {{ $customerInfo['payment_method'] ?? 'KPAY' }}
                        </span>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold small mb-2">Customer Info</h6>
                        <div class="text-muted small">
                            <div class="fw-bold text-dark">{{ $customerInfo['customer_name'] ?? 'Pyae Thiri Cho' }}</div>
                            <div class="mb-1 text-brand"><i class="fas fa-envelope me-1"></i> {{ $customerInfo['email'] ?? 'pyaethiricho4@gmail.com' }}</div>
                            <div><i class="fas fa-phone me-1"></i> {{ $customerInfo['phone'] ?? '09255409595' }}</div>
                            <div><i class="fas fa-map-marker-alt me-1"></i> {{ $customerInfo['address'] ?? 'Pyin Oo Lwin' }}</div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top">
                        <div class="mb-3">
                            <label class="small text-muted mb-1">Customer Note (Optional)</label>
                            <textarea name="note" form="orderForm" class="form-control border-0 bg-light" rows="2" placeholder="Write your note here..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-6">
                    <a href="{{ url()->previous() }}" class="btn btn-brand-outline w-100 rounded-pill py-2 fw-bold bg-white shadow-sm">
                        ← Back
                    </a>
                </div>
                <div class="col-6">
                    <form action="{{ route('order.place') }}" method="POST" id="orderForm">
                        @csrf
                        <input type="hidden" name="email" value="{{ $customerInfo['email'] ?? '' }}">
                        <button type="submit" class="btn btn-brand w-100 rounded-pill py-2 fw-bold shadow-sm">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection