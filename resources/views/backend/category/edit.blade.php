@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow mb-4 animated slideInLeft border-left-warning">
            <div class="card-header py-3" style="background-color: #A52A2A;">
                <h6 class="m-0 font-weight-bold text-white">
                    <i class="fas fa-pen-fancy mr-2"></i> Edit Craft Details: {{ $category->name }}
                </h6>
            </div>
            
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger animated shake">
                        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf 
                    @method('PUT')

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" style="color: #A52A2A !important;">Category Name</label>
                        <input name="categoryName" class="form-control border-warning shadow-sm" 
                               value="{{ old('categoryName', $category->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" style="color: #A52A2A !important;">Description</label>
                        <textarea name="categoryDescription" rows="5" class="form-control border-warning shadow-sm">{{ old('categoryDescription', $category->description) }}</textarea>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted italic">Last updated: {{ $category->updated_at->diffForHumans() }}</small>
                        <div>
                            <a href="{{ route('categories.index') }}" class="btn btn-light border px-4 mr-2">Cancel</a>
                            <button type="submit" class="btn btn-warning shadow px-4 text-dark font-weight-bold">
                                <i class="fas fa-sync-alt mr-1"></i> Update Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection