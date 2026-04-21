@extends('backend.layout') 

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4">Order Management</h2>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>
                            <strong>{{ $order->customer_name }}</strong><br>
                            <small>{{ $order->phone }}</small>
                        </td>
                        <td>{{ number_format($order->total_amount) }} K</td>
                        <td><span class="badge bg-info">{{ strtoupper($order->payment_method) }}</span></td>
                        <td>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($order->status == 'accepted')
                                <span class="badge bg-success">Accepted</span>
                            @elseif($order->status == 'declined')
                                <span class="badge bg-danger">Declined</span>
                            @else
                                <span class="badge bg-secondary">{{ $order->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-light border mr-2">View Items</a>
                                
                                @if($order->status == 'pending')
                                    <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="d-inline mr-1">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                    </form>

                                    <form action="{{ route('admin.orders.decline', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure you want to decline this order?')">
                                            Decline
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection