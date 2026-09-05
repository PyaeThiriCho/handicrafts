@extends('backend.layout')

@section('content')

@php
    // Find selected category object dynamically if a filter is active
    $selectedCategory = $categories->firstWhere('id', request('category'));
@endphp

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4 no-print">
        <h1 class="h3 mb-0 text-maroon font-weight-bold">Craft Inventory</h1>
        <form action="{{ route('products.index') }}" method="GET" class="form-inline">
            <select name="category" class="form-control border-danger mr-2" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @if(request('search') || request('category'))
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary">Clear Filters</a>
            @endif
        </form>
    </div>

    <!-- Official Printable Report Header (Hidden on Screen, Visible on Print) -->
    <div class="print-header text-center mb-4">
        <h2 class="text-maroon font-weight-bold mb-1">PSM Craft House</h2>
        
        <!-- Dynamic Print Report Title -->
        <h4 class="text-dark font-weight-bold">
            {{ $selectedCategory ? $selectedCategory->name . ' Category Inventory Report' : 'Inventory Stock & Audit Summary Report' }}
        </h4>
        
        <p class="mb-0">
            <strong>Date:</strong> {{ date('d/m/Y') }} | 
            <strong>Report Type:</strong> {{ $selectedCategory ? $selectedCategory->name . ' Category' : 'Master Inventory Audit' }}
        </p>
        <hr class="border-maroon my-3">
    </div>

    <div class="card shadow mb-4 animated fadeInUp border-bottom-maroon printable-area">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-maroon no-print">
            
            <!-- Dynamic Screen Card Header -->
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-list mr-2"></i> 
                @if(request('search'))
                    Results for: "{{ request('search') }}"
                @elseif($selectedCategory)
                    Category: {{ $selectedCategory->name }}
                @else
                    Product Master List
                @endif
            </h6>
            
            <div>
                <!-- PRINT BUTTON -->
                <button onclick="window.print()" class="btn btn-light btn-sm shadow-sm font-weight-bold mr-2 text-maroon">
                    <i class="fas fa-print mr-1"></i> Print Inventory
                </button>

                {{-- 1. ONLY SHOW "ADD" BUTTON TO ADMINS --}}
                @can('add products')
                <a href="{{ route('products.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold">
                    <i class="fas fa-plus"></i> Add Craft
                </a>
                @endcan
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border printable-table">
                    <thead class="bg-light text-maroon">
                        <tr>
                            <th class="no-print">Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price (MMK)</th>
                            <th>Stock</th>
                            <th class="text-center no-print">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td class="no-print">
                                    <img src="{{ asset($product->image) }}" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/45?text=NA'">
                                </td>
                                <td class="font-weight-bold align-middle">{{ $product->name }}</td>
                                <td class="align-middle">
                                    <span class="badge badge-outline-danger border border-danger text-danger px-2">
                                        {{ $product->category?->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="align-middle font-weight-bold text-dark">{{ number_format($product->price, 0) }}</td>
                                <td class="align-middle">
                                    <span class="{{ $product->stock < 10 ? 'text-danger font-weight-bold' : '' }}">
                                        {{ $product->stock }} {{ $product->stock < 10 ? '(Low Stock)' : '' }}
                                    </span>
                                </td>
                                <td class="text-center align-middle no-print">
                                    <div class="btn-group">
                                        {{-- EVERYONE CAN VIEW --}}
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>

                                        {{-- 2. ONLY SHOW EDIT TO ADMINS --}}
                                        @can('edit products')
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                        @endcan

                                        {{-- 3. ONLY SHOW DELETE TO ADMINS --}}
                                        @can('delete products')
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this craft?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted italic">No items found matching your criteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center custom-pagination no-print">
                {{ $products->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<style>
    .text-maroon { color: #8B0000; }
    .bg-maroon { background-color: #8B0000; color: white; }
    .btn-gold { background-color: #D4AF37; color: #000; border: none; }
    .border-bottom-maroon { border-bottom: 4px solid #8B0000; }
    .border-maroon { border-color: #8B0000; }
    
    .custom-pagination .page-item.active .page-link {
        background-color: #8B0000 !important;
        border-color: #8B0000 !important;
        color: white !important;
    }
    .custom-pagination .page-link {
        color: #8B0000 !important;
    }

    /* Hide Print Header on Regular Screen View */
    @media screen {
        .print-header { display: none !important; }
    }

    /* Print Stylesheet - Applied ONLY when printing or saving PDF */
    @media print {
        /* Hide navbar, sidebar, buttons, pagination, actions column, and images */
        nav, .sidebar, .navbar, .no-print, button, .btn, .custom-pagination {
            display: none !important;
        }

        /* Full width printable layout */
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