@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow mb-4 animated slideInRight border-left-warning">
            <div class="card-header py-3" style="background-color: #A52A2A;">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-edit mr-2"></i> Update Item: {{ $product->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <div class="row">
                        <div class="form-group col-md-6 text-warning font-weight-bold">
                            <label>Product Name</label>
                            <input name="productName" class="form-control border-warning" value="{{ old('productName', $product->name) }}" required>
                        </div>
                        <div class="form-group col-md-6 text-warning font-weight-bold">
                            <label>Category</label>
                            <select name="productCategory" class="form-control border-warning" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('productCategory', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-warning font-weight-bold">Description</label>
                        <textarea name="productDescription" rows="3" class="form-control border-warning">{{ old('productDescription', $product->description) }}</textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 text-warning font-weight-bold">
                            <label>Price</label>
                            <input type="number" step="0.01" name="productPrice" class="form-control border-warning" value="{{ old('productPrice', $product->price) }}" required>
                        </div>
                        <div class="form-group col-md-6 text-warning font-weight-bold">
                            <label>Stock</label>
                            <input type="number" name="productStock" class="form-control border-warning" value="{{ old('productStock', $product->stock) }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-warning font-weight-bold d-block">Item Photography</label>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail mb-2" width="100">
                        @endif
                        <input type="file" name="productImage" class="form-control-file">
                    </div>

                    <div class="mt-4 text-right">
                        <a href="{{ route('products.index') }}" class="btn btn-light border">Cancel</a>
                        <button class="btn btn-warning shadow text-dark font-weight-bold">
                            <i class="fas fa-sync-alt"></i> Update Craftwork
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection