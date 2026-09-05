@extends('backend.layout') 

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Order Details #{{ $order->id }}</h3>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark btn-sm rounded-pill">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0 fw-bold text-dark">Purchased Items</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th class="text-end pe-4">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($order->order_items as $item)
                                    @php
                                        $itemPrice = $item->price ?? optional($item->product)->price ?? 0;
                                        $itemQty   = $item->quantity ?? $item->qty ?? 1;
                                        $subtotal  = $itemPrice * $itemQty;
                                        $productName = optional($item->product)->name ?? $item->product_name ?? 'Product Unavailable';
                                        $productImage = optional($item->product)->image ?? 'frontend_assets/images/about1.jpg';
                                    @endphp
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($productImage) }}" 
                                                     class="rounded-3 me-3" 
                                                     style="width: 50px; height: 50px; object-fit: cover;"
                                                     onerror="this.onerror=null;this.src='{{ asset('frontend_assets/images/about1.jpg') }}';">
                                                <div>
                                                    <div class="fw-bold text-dark">{{ $productName }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ number_format($itemPrice) }} K</td>
                                        <td>{{ $itemQty }}</td>
                                        <td class="text-end pe-4 fw-bold">
                                            {{ number_format($subtotal) }} K
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No item details found for this order.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold py-3">Grand Total:</td>
                                    <td class="text-end pe-4 fw-bold text-primary py-3" style="font-size: 1.2rem;">
                                        {{ number_format($order->total_amount ?? $order->total_price ?? 0) }} K
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Customer Information</h6>
                    <div class="mb-2">
                        <small class="text-muted d-block">Order Placed Date & Time</small>
                        <span class="fw-bold text-primary">
                            <i class="far fa-clock me-1"></i> {{ $order->created_at->format('d M Y, h:i A') }}
                        </span>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block">Name</small>
                        <span class="fw-bold">{{ $order->customer_name }}</span>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block">Email</small>
                        <span>{{ $order->email }}</span>
                    </div>
                    <div class="mb-2">
                        <small class="text-muted d-block">Phone</small>
                        <span>{{ $order->phone }}</span>
                    </div>
                    <div class="mb-0">
                        <small class="text-muted d-block">Shipping Address</small>
                        <span>{{ $order->address }}</span>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Payment & Action</h6>
                    <div class="mb-3">
                        <small class="text-muted d-block">Payment Method</small>
                        <span class="badge bg-primary px-3 text-uppercase">{{ $order->payment_method }}</span>
                    </div>

                    <div class="d-flex gap-2">
                        @if(in_array(strtolower($order->status), ['pending', 'processing']))
                            <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold py-2">
                                    <i class="fas fa-check"></i> Accept
                                </button>
                            </form>

                            <form action="{{ route('admin.orders.decline', $order->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold py-2" 
                                        onclick="return confirm('Are you sure you want to cancel this order?')">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary w-100 rounded-pill fw-bold" disabled>
                                Order {{ ucfirst($order->status) }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection