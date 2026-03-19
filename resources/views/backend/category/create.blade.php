@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow mb-4 animated zoomIn border-left-danger">
            <div class="card-header py-3" style="background-color: #8B0000;">
                <h6 class="m-0 font-weight-bold text-white">
                    <i class="fas fa-plus-circle mr-2"></i> Register New Craft Category
                </h6>
            </div>
            
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger animated shake">
                        <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf 
                    
                    <div class="form-group">
                        <label class="text-dark font-weight-bold" style="color: #8B0000 !important;">Craft Name</label>
                        <input name="categoryName" class="form-control border-danger shadow-sm" 
                               placeholder="e.g. Lacquerware" value="{{ old('categoryName') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="text-dark font-weight-bold" style="color: #8B0000 !important;">Description</label>
                        <textarea name="categoryDescription" rows="5" class="form-control border-danger shadow-sm" 
                                  placeholder="Describe the cultural significance and materials used...">{{ old('categoryDescription') }}</textarea>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('categories.index') }}" class="btn btn-light border px-4">
                             <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-danger shadow px-4 animated pulse infinite slow">
                            <i class="fas fa-save mr-1"></i> Publish Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection