@extends('backend.layout')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow animated fadeInDown border-left-maroon">
            <div class="card-header bg-maroon text-white py-3">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-plus-circle mr-2"></i> Create New Permission</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-maroon">Permission Name</label>
                        <input type="text" id="name" name="name" class="form-control border-danger" 
                               placeholder="e.g., add products" value="{{ old('name') }}" required>
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="actions" class="font-weight-bold text-maroon">Description</label>
                        <textarea id="actions" name="actions" class="form-control border-danger" 
                                  rows="3" placeholder="Describe what this permission allows...">{{ old('actions') }}</textarea>
                        @error('actions')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary px-4" href="{{ route('permissions.index') }}">
                            <i class="fas fa-arrow-left mr-1"></i> Cancel
                        </a>
                        <button class="btn btn-gold shadow-sm px-4 font-weight-bold">
                            <i class="fas fa-save mr-1"></i> Save Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .text-maroon { color: #8B0000; }
    .bg-maroon { background-color: #8B0000; }
    .btn-gold { background-color: #D4AF37; color: #000; border: none; }
    .btn-gold:hover { background-color: #C5A028; color: #000; }
    .border-left-maroon { border-left: 5px solid #8B0000; }
    .border-danger { border-color: #ced4da; }
    .border-danger:focus { border-color: #8B0000; box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.25); }
</style>
@endsection