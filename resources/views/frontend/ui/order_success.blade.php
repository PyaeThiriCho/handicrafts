@extends('frontend.layout')
@section('content')
<div class="container py-5 text-center">

    @if(session('message'))
        <div class="alert alert-success border-0 shadow-sm rounded-pill d-inline-block px-4 mb-4" 
             style="background-color: #d1e7dd; color: #0f5132;">
            <i class="fas fa-check-circle me-2"></i> {{ session('message') }}
        </div>
    @endif




    <div class="mb-4">
        <i class="fas fa-check-circle text-success fa-4x mb-3"></i>
        <h3 class="fw-bold">Thank You!</h3>
        <p class="text-muted">Order #{{ $order->id }} has been placed successfully.</p>
    </div>

    <div class="alert alert-warning d-inline-block rounded-pill border-0 small py-1 px-3 mt-2" style="background-color: #fff3cd; color: #856404;">
        <i class="fas fa-envelope me-1"></i> A confirmation email has been sent to your inbox.
    </div>

    @if($order->payment_method != 'cod')
    <div class="card border-0 shadow-sm p-4 mx-auto mb-4" style="max-width: 400px; border-radius: 20px;">
        <p class="small fw-bold text-muted mb-2">Please transfer {{ number_format($order->total_amount) }} K to:</p>
        <div class="bg-primary text-white p-3 rounded-3 mb-4">
            <div class="fw-bold h5 mb-0">09 255 409 595</div>
            <div class="small opacity-75">(PSM Craft House - Pyae Thiri Cho)</div>
        </div>

        <form action="{{ route('order.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            
            <div class="mb-3 text-start">
                <label class="small fw-bold text-muted mb-2">Upload Payment Screenshot</label>
                <input type="file" name="screenshot" class="form-control rounded-3 shadow-none border-light bg-light" required id="slipInput">
            </div>

            {{-- Optional: Image Preview Area --}}
            <div id="previewContainer" class="mb-3 d-none">
                <img id="previewImage" src="#" alt="slip preview" class="img-fluid rounded border shadow-sm" style="max-height: 200px;">
            </div>

            <button type="submit" class="btn btn-success w-100 py-2 rounded-pill fw-bold shadow-sm">
                <i class="fas fa-upload me-2"></i> Upload Slip
            </button>
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
    // Clears cart from storage
    localStorage.removeItem('psm_cart_data'); 

    // Logic to show a preview of the image before uploading
    const slipInput = document.getElementById('slipInput');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    slipInput.onchange = evt => {
        const [file] = slipInput.files;
        if (file) {
            previewImage.src = URL.createObjectURL(file);
            previewContainer.classList.remove('d-none');
        }
    }
</script>
@endsection