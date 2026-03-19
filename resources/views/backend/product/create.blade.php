@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow mb-4 animated zoomIn border-left-danger">
            <div class="card-header py-3" style="background-color: #8B0000;">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-hammer mr-2"></i> Register New Craftwork</h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger animated shake">
                        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold" style="color: #8B0000;">Product Name</label>
                            <input name="productName" class="form-control border-danger" value="{{ old('productName') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold" style="color: #8B0000;">Category</label>
                            <select name="productCategory" class="form-control border-danger" required>
                                <option value="">-- Choose Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('productCategory') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" style="color: #8B0000;">Detailed Description</label>
                        <textarea name="productDescription" rows="3" class="form-control border-danger">{{ old('productDescription') }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold" style="color: #8B0000;">Price (MMK)</label>
                            <input type="number" step="0.01" name="productPrice" class="form-control border-danger" value="{{ old('productPrice') }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold" style="color: #8B0000;">Stock Quantity</label>
                            <input type="number" name="productStock" class="form-control border-danger" value="{{ old('productStock') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" style="color: #8B0000;">Product Image</label>
                        <input type="file" name="productImage" class="form-control-file p-2 border rounded">
                    </div>

                    <div class="mt-4 border-top pt-3 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-light border px-4">Discard</a>
                        <button class="btn btn-danger shadow px-4 animated pulse infinite slow">
                            <i class="fas fa-save mr-1"></i> Save to Inventory
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection