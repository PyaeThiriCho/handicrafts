@extends('frontend.layout')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center reveal">
        <div class="col-md-5 card border-0 shadow-lg p-4 rounded-4 transact-card">
            <div class="text-center mb-4">
                <span class="text-uppercase small fw-bold text-brand" style="letter-spacing: 2px;">Almost There</span>
                <h5 class="fw-bold mb-0" style="font-family: var(--font-serif); font-size: 1.5rem;">Checkout Details</h5>
            </div>
            <form action="{{ route('checkout.summary') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="small fw-bold text-muted">Recipient Name</label>
                    <input type="text" name="customer_name" class="form-control bg-light border-0 py-2 rounded-3" required>
                </div>

                <div class="mb-3">
                    <label class="small fw-bold mb-1">Email Address</label>
                    <input type="email" name="email" class="form-control border-0 bg-light rounded-3" required>
                </div>
                <div class="mb-3">
                    <label class="small fw-bold text-muted">Phone Number</label>
                    <input type="tel" name="phone" class="form-control bg-light border-0 py-2 rounded-3" required>
                </div>
                <div class="mb-4">
                    <label class="small fw-bold text-muted">Shipping Address</label>
                    <textarea name="address" class="form-control bg-light border-0 rounded-3" rows="3" required></textarea>
                </div>

                
                <label class="small fw-bold text-muted mb-2">Payment Method</label>
                    <div class="row g-2 mb-4">
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="kpay" id="kpay" class="btn-check" checked>
                            <label class="btn pay-option w-100 py-2 border-0 bg-light rounded-3 shadow-none" for="kpay">KPay</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="payment_method" value="wave" id="wave" class="btn-check">
                            <label class="btn pay-option w-100 py-2 border-0 bg-light rounded-3 shadow-none" for="wave">Wave</label>
                        </div>
                    </div>
                <button type="submit" class="btn btn-brand w-100 py-2 rounded-pill fw-bold shadow-sm">Review Order</button>
            </form>
        </div>
    </div>
</div>
@endsection