@extends('backend.layout') 

@section('content')
<div class="container-fluid py-4 px-4">

    <!-- Official Printable Report Header (Visible only when printing) -->
    <div class="print-header text-center mb-4">
        <h2 class="text-maroon font-weight-bold mb-1">PSM Craft House</h2>
        
        <!-- DYNAMIC PRINT CAPTION / SUBTITLE BASED ON FILTERS -->
        <h4 class="text-dark font-weight-bold">
            @if(request('status') && request('date'))
                {{ ucfirst(request('status')) }} Orders Report for {{ \Carbon\Carbon::parse(request('date'))->format('d M Y') }}
            @elseif(request('status'))
                {{ ucfirst(request('status')) }} Orders Report
            @elseif(request('date'))
                Orders Report for {{ \Carbon\Carbon::parse(request('date'))->format('d M Y') }}
            @else
                All Customer Orders & Sales Summary Report
            @endif
        </h4>

        <p class="mb-0 text-muted">
            <strong>Date:</strong> {{ date('d/m/Y h:i A') }} 
            | <strong>Total Records:</strong> {{ method_exists($orders, 'total') ? $orders->total() : $orders->count() }}
        </p>
        <hr class="border-maroon my-3">
    </div>

    <!-- HEADER & FILTERS -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 no-print">
        <h2 class="m-0 fw-bold text-dark">Order Management</h2>
        
        <div class="d-flex align-items-center gap-3">
            <!-- COMBINED DATE & STATUS FILTER FORM -->
            <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex align-items-center gap-2 me-2">
                
                <!-- Status Dropdown -->
                <select name="status" class="form-select form-select-sm shadow-sm" style="width: 140px; padding: 0.45rem 0.65rem;">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="canceled" {{ request('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>

                <!-- Date Input -->
                <input type="date" name="date" class="form-control form-control-sm shadow-sm" value="{{ request('date') }}" style="padding: 0.45rem 0.65rem;">
                
                <button type="submit" class="btn btn-sm btn-outline-dark px-3">Filter</button>
                
                @if(request('date') || request('status'))
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-link text-muted text-decoration-none ms-1">Clear</a>
                @endif
            </form>

            <!-- PRINT BUTTON -->
            <button onclick="window.print()" class="btn btn-sm text-white px-3 py-2 shadow-sm font-weight-bold d-flex align-items-center gap-2" style="background-color: #8B0000; border-radius: 6px;">
                <i class="fas fa-print"></i> Print Orders Report
            </button>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card shadow-sm border-0 rounded-3 printable-area">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle custom-order-table mb-0 printable-table">
                    <thead class="bg-light border-bottom">
                        <tr>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">ID</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">Date & Time</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">Customer</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">Total</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">Method</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder">Status</th>
                            <th class="text-secondary text-uppercase fs-7 font-weight-bolder no-print text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $order->id }}</td>
                            <td>
                                <span class="fw-bold text-dark d-block mb-1">{{ $order->created_at->format('d M Y') }}</span>
                                <small class="text-muted fs-7">{{ $order->created_at->format('h:i A') }}</small>
                            </td>
                            <td>
                                <strong class="text-dark d-block mb-1">{{ $order->customer_name }}</strong>
                                <small class="text-muted fs-7"><i class="fas fa-phone-alt me-1 opacity-75"></i>{{ $order->phone }}</small>
                            </td>
                            <td class="fw-bold text-dark fs-6">{{ number_format($order->total_amount) }} K</td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1 text-uppercase">{{ $order->payment_method }}</span>
                            </td>
                            <td>
                                @if(in_array(strtolower($order->status), ['pending', 'processing']))
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold">{{ ucfirst($order->status) }}</span>
                                @elseif(strtolower($order->status) == 'accepted')
                                    <span class="badge bg-success px-3 py-2 rounded-pill fw-semibold">Accepted</span>
                                @elseif(in_array(strtolower($order->status), ['canceled', 'declined']))
                                    <span class="badge bg-danger px-3 py-2 rounded-pill fw-semibold">Canceled</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill fw-semibold">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td class="no-print text-center">
                                <div class="d-inline-flex align-items-center gap-2">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-secondary px-3 py-1-5 fw-semibold text-nowrap">
                                        View Items
                                    </a>
                                    
                                    @if(in_array(strtolower($order->status), ['pending', 'processing']))
                                        <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="d-inline m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success px-3 py-1-5 fw-semibold text-nowrap">Accept</button>
                                        </form>

                                        <form action="{{ route('admin.orders.decline', $order->id) }}" method="POST" class="d-inline m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger px-3 py-1-5 fw-semibold text-nowrap" 
                                                    onclick="return confirm('Are you sure you want to cancel this order?')">
                                                Cancel
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">No orders match the selected filter criteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="no-print p-4 border-top">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .text-maroon { color: #8B0000; }
    .border-maroon { border-color: #8B0000; }
    .fs-7 { font-size: 0.825rem; }
    .py-1-5 { padding-top: 0.375rem; padding-bottom: 0.375rem; }

    /* Custom Table Spacing for Extra Breathing Room */
    .custom-order-table th, 
    .custom-order-table td {
        padding: 1.1rem 1.25rem !important;
        vertical-align: middle !important;
    }

    /* Hide Print Header on Regular Screen View */
    @media screen {
        .print-header { display: none !important; }
    }

    /* Print Stylesheet */
    @media print {
        nav, .sidebar, .navbar, .no-print, button, .btn, .pagination {
            display: none !important;
        }

        body, .container-fluid {
            width: 100% !important;
            margin: 0 !important;
            padding: 10px !important;
            background: #fff !important;
            color: #000 !important;
        }

        .print-header {
            display: block !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }

        .printable-table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        .printable-table th, .printable-table td {
            border: 1px solid #444 !important;
            padding: 8px 10px !important;
            font-size: 11pt !important;
        }

        .printable-table th {
            background-color: #f2f2f2 !important;
            color: #000 !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>
@endsection