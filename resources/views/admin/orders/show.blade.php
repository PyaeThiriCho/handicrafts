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
                                @foreach($order->order_items as $item)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($item->product->image ?? 'images/default.png') }}" 
                                                 class="rounded-3 me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                            <div>
                                                <div class="fw-bold">{{ $item->product->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ number_format($item->price) }} K</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td class="text-end pe-4 fw-bold">
                                        {{ number_format($item->price * $item->quantity) }} K
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end fw-bold py-3">Grand Total:</td>
                                    <td class="text-end pe-4 fw-bold text-primary py-3" style="font-size: 1.2rem;">
                                        {{ number_format($order->total_amount) }} K
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
                    
                    @if($order->payment_screenshot)
                        <div class="mb-3">
                            <small class="text-muted d-block mb-2">Payment Slip</small>
                            <a href="{{ asset('storage/' . $order->payment_screenshot) }}" target="_blank">
                                <img src="{{ asset('storage/' . $order->payment_screenshot) }}" 
                                     class="img-fluid rounded-3 border" style="max-height: 200px;">
                            </a>
                        </div>
                    @endif

                    <div class="d-flex gap-2">
                        @if($order->status == 'pending' || $order->status == 'processing')
                            <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold py-2">
                                    <i class="fas fa-check"></i> Accept
                                </button>
                            </form>

                            <form action="{{ route('admin.orders.decline', $order->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold py-2" 
                                        onclick="return confirm('Are you sure you want to decline this order?')">
                                    <i class="fas fa-times"></i> Decline
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