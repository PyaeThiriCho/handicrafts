{{-- @extends('backend.layout')

@section('content')
<div class="card shadow mb-3 animated fadeInDown border-left-danger">
    <div class="card-body bg-light">
        <form action="{{ route('products.index') }}" method="GET" class="row">
            <div class="col-md-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-maroon text-white border-danger"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control border-danger" placeholder="Search craft name..." value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-md-4">
                <select name="category" class="form-control border-danger">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-danger shadow-sm px-4">Find</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary shadow-sm">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4 animated fadeInUp">
    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-maroon" style="background-color: #8B0000;">
        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-boxes mr-2"></i> Myanmar Craft Inventory</h6>
        <a href="{{ route('products.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold" style="background-color: #D4AF37; color: #000;">
            <i class="fas fa-plus-circle"></i> Add New Product
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                <thead class="text-white" style="background-color: #A52A2A;">
                    <tr>
                        <th>Preview</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Price (MMK)</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset($product->image) }}" class="img-thumbnail shadow-sm" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/50x50?text=No+Img'">
                            </td>
                            <td class="align-middle font-weight-bold text-maroon">{{ $product->name }}</td>
                            <td class="align-middle"><span class="badge badge-light border text-danger">{{ $product->category?->name }}</span></td>
                            <td class="align-middle font-weight-bold {{ $product->stock < 5 ? 'text-danger animated flash infinite slow' : '' }}">
                                {{ $product->stock }}
                            </td>
                            <td class="align-middle">{{ number_format($product->price, 0) }}</td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete item?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-5">No crafts match your search.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $products->appends(request()->input())->links() }}
        </div>
    </div>
</div>

<style>
    .bg-maroon { background-color: #8B0000; color: #fff; }
    .text-maroon { color: #8B0000; }
    .border-danger { border-color: #8B0000 !important; }
</style>
@endsection --}}

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
            <a href="{{ route('products.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold">
                <i class="fas fa-plus"></i> Add Craft
            </a>
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
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this craft?')"><i class="fas fa-trash"></i></button>
                                        </form>
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
    
    /* Custom Red Pagination Styles */
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