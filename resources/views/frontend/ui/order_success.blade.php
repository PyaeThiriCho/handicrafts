@extends('frontend.layout')
@section('content')
<div class="container py-5 text-center">
    <div class="mb-4">
        <i class="fas fa-check-circle text-success fa-4x mb-3"></i>
        <h3 class="fw-bold">Thank You!</h3>
        <p class="text-muted">Order #{{ $order->id }} has been placed successfully.</p>
    </div>

    @if($order->payment_method != 'cod')
    <div class="card border-0 shadow-sm p-4 mx-auto mb-4" style="max-width: 400px; border-radius: 20px;">
        <p class="small fw-bold text-muted mb-2">Please transfer {{ number_format($order->total_amount) }} K to:</p>
        <div class="bg-primary text-white p-3 rounded-3 mb-4">
            <div class="fw-bold h5 mb-0">09 763 945 511</div>
            <div class="small opacity-75">(PSM Craft House - Daw Aye Lwin)</div>
        </div>

        <form action="{{ route('order.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <div class="mb-3">
                <label class="btn btn-light w-100 py-2 border rounded-pill small fw-bold">
                    <i class="fas fa-image me-2"></i> Choose Payment Slip
                    <input type="file" name="screenshot" class="d-none" onchange="this.form.submit()" required>
                </label>
            </div>
        </form>
    </div>
    @else
    <div class="alert alert-info d-inline-block px-5 rounded-pill border-0 shadow-sm">
        Our team will contact you soon for Cash on Delivery.
    </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('homepage') }}" class="btn btn-outline-secondary rounded-pill px-4">Return Home</a>
    </div>
</div>


<script>
    // This clears the red number bubble in the navbar
    localStorage.removeItem('psm_cart_data'); 

</script>
@endsection