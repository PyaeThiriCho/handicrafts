@extends('backend.layout')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-maroon font-weight-bold">Craft Inventory</h1>
        <form action="{{ route('products.index') }}" method="GET" class="form-inline">
            <select name="category" class="form-control border-danger mr-2" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @if(request('search') || request('category'))
                <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-secondary">Clear Filters</a>
            @endif
        </form>
    </div>

    <div class="card shadow mb-4 animated fadeInUp border-bottom-maroon">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-maroon">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-list mr-2"></i> 
                {{ request('search') ? 'Results for: "'.request('search').'"' : 'Product Master List' }}
            </h6>
            
            {{-- 1. ONLY SHOW "ADD" BUTTON TO ADMINS --}}
            @can('add products')
            <a href="{{ route('products.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold">
                <i class="fas fa-plus"></i> Add Craft
            </a>
            @endcan

            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead class="bg-light text-maroon">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price (MMK)</th>
                            <th>Stock</th>
                            <th class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ asset($product->image) }}" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/45?text=NA'">
                                </td>
                                <td class="font-weight-bold align-middle">{{ $product->name }}</td>
                                <td class="align-middle"><span class="badge badge-outline-danger border border-danger text-danger px-2">{{ $product->category?->name }}</span></td>
                                <td class="align-middle font-weight-bold text-dark">{{ number_format($product->price, 0) }}</td>
                                <td class="align-middle">
                                    <span class="{{ $product->stock < 10 ? 'text-danger font-weight-bold animated flash infinite slow' : '' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td class="text-center align-middle">
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
                            <tr><td colspan="6" class="text-center py-5 text-muted italic">No items found matching your criteria.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center custom-pagination">
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
    
    .custom-pagination .page-item.active .page-link {
        background-color: #8B0000 !important;
        border-color: #8B0000 !important;
        color: white !important;
    }
    .custom-pagination .page-link {
        color: #8B0000 !important;
    }
</style>
@endsection