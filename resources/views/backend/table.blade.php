@extends('backend.layout')

@section('content')

<div class="container-fluid px-4 pt-3">

    <!-- Success Message Alert Banner -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 no-print" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Message Alert Banner -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4 no-print" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header Title -->
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h3 class="fw-bold text-dark m-0">Handicraft Dashboard</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-sm text-white px-3 shadow-sm" style="background-color: var(--color-primary, #800000);">
            <i class="fa-solid fa-plus me-1"></i> Add Category
        </a>
    </div>

    <!-- KPI Metric Cards Row -->
    <div class="row g-3 mb-4 no-print">
        <!-- Card 1: Categories -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm border-start border-4 border-primary h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">Categories</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalCategories ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-layer-group fa-2x text-gray-300 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Crafts/Products -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm border-start border-4 border-success h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">Total Products</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalProducts ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-boxes-stacked fa-2x text-gray-300 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Pending Orders -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm border-start border-4 border-warning h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">Pending Orders</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $pendingOrders ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-cart-flatbed fa-2x text-gray-300 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Registered Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm border-start border-4 border-info h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">Registered Users</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalUsers ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-users fa-2x text-gray-300 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Low Stock Warning (Restock Needed) Card with Print Feature -->
    <div class="card border-0 shadow-sm border-start border-4 border-danger mb-4 printable-area">
        
        <!-- Header visible only on browser screen -->
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0 no-print">
            <div class="d-flex align-items-center gap-2">
                <h6 class="m-0 fw-bold text-danger">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> Low Stock Warning (Restock Needed)
                </h6>
                <span class="badge bg-danger rounded-pill">{{ count($lowStockProducts ?? []) }} Items Low</span>
            </div>

            <!-- PRINT LOW STOCK BUTTON -->
            <button onclick="window.print()" class="btn btn-sm text-white px-3 py-2 shadow-sm font-weight-bold d-flex align-items-center gap-2" style="background-color: #8B0000; border-radius: 6px;">
                <i class="fa-solid fa-print"></i> Print Low Stock Report
            </button>
        </div>

        <!-- Official Printable Header (Visible ONLY when printing) -->
        <div class="print-header text-center p-3 mb-3">
            <h2 class="text-maroon font-weight-bold mb-1">PSM Craft House</h2>
            <h4 class="text-dark font-weight-bold">Inventory Restock & Low Stock Warning Report</h4>
            <p class="mb-0 text-muted">
                <strong>Date:</strong> {{ date('d/m/Y h:i A') }} 
                | <strong>Total Restock Items Needed:</strong> {{ count($lowStockProducts ?? []) }}
            </p>
            <hr class="border-maroon my-3">
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover custom-stock-table printable-table">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Product Name</th>
                            <th>Category</th>
                            <th>Current Stock</th>
                            <th>Status</th>
                            <th class="text-end pe-3 no-print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lowStockProducts ?? [] as $prod)
                            <tr>
                                <td class="ps-3 fw-bold">{{ $prod->name }}</td>
                                <td>{{ $prod->category->name ?? 'Uncategorized' }}</td>
                                <td class="fw-bold text-danger">{{ $prod->stock }} items left</td>
                                <td>
                                    @if($prod->stock == 0)
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Low Stock</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3 no-print">
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger" 
                                            onclick="openRestockModal('{{ $prod->id }}', '{{ addslashes($prod->name) }}')">
                                        Update Stock
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No low stock items right now!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Categories / Quick Overview Table -->
    <div class="card border-0 shadow-sm mb-4 no-print">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-0">
            <h6 class="m-0 fw-bold text-dark">Recent Craft Categories</h6>
            <a href="{{ route('categories.index') }}" class="btn btn-link btn-sm text-decoration-none">View All &rarr;</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">#</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th class="text-end pe-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories ?? [] as $key => $cat)
                            <tr>
                                <td class="ps-3 fw-medium">#{{ $key + 1 }}</td>
                                <td>
                                    @php
                                        $imagePath = $cat->image;
                                        if ($imagePath && !str_starts_with($imagePath, 'images/') && !str_starts_with($imagePath, 'backend_assets/')) {
                                            $imagePath = 'backend_assets/img/' . $imagePath;
                                        }
                                    @endphp
                                    <img src="{{ asset($imagePath ?? 'frontend_assets/images/about1.jpg') }}" class="rounded" width="45" height="45" style="object-fit: cover;">
                                </td>
                                <td class="fw-bold">{{ $cat->name }}</td>
                                <td class="text-muted small">{{ Str::limit($cat->description, 50) }}</td>
                                <td class="small">{{ $cat->created_at ? $cat->created_at->format('d/m/Y') : 'N/A' }}</td>
                                <td class="text-end pe-3">
                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No craft categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Restock Inventory Pop-Up Modal -->
<div class="modal fade no-print" id="restockModal" tabindex="-1" aria-labelledby="restockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header text-white" style="background-color: #800000;">
                <h5 class="modal-title fw-bold" id="restockModalLabel">Restock Inventory</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="restockForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p class="mb-2">Updating stock for: <strong id="productNameText" class="text-dark">---</strong></p>
                    <div class="mb-3">
                        <label for="quantityInput" class="form-label fw-semibold">Add New Quantity Received</label>
                        <input type="number" name="stock" id="quantityInput" class="form-control" placeholder="e.g. 10" min="1" required>
                        <div class="form-text">This will add to the current available stock.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn text-white px-4" style="background-color: #800000;">Update Inventory</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- STYLES FOR PRINTING -->
<style>
    .text-maroon { color: #8B0000; }
    .border-maroon { border-color: #8B0000; }

    /* Hide Print Header on Regular Screen View */
    @media screen {
        .print-header { display: none !important; }
    }

    /* Print Stylesheet */
    @media print {
        nav, .sidebar, .navbar, .no-print, button, .btn, .pagination, .modal {
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

<script>
function openRestockModal(productId, productName) {
    document.getElementById('productNameText').innerText = productName;
    
    // Set form target action dynamically
    let form = document.getElementById('restockForm');
    form.action = "/products/" + productId + "/restock";
    
    var modalElement = document.getElementById('restockModal');
    var restockModal = new bootstrap.Modal(modalElement);
    restockModal.show();
}
</script>

@endsection