@extends('backend.layout')

@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow animated fadeInDown border-left-warning">
            <div class="card-header bg-maroon text-white py-3">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-edit mr-2"></i> Edit Permission Details</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('permissions.update', $permission) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-maroon">Permission Name</label>
                        <input type="text" id="name" name="name" class="form-control border-danger" 
                               value="{{ old('name', $permission->name) }}" required>
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="actions" class="font-weight-bold text-maroon">Actions / Description</label>
                        <textarea id="actions" name="actions" class="form-control border-danger" 
                                  rows="3">{{ old('actions', $permission->actions) }}</textarea>
                        @error('actions')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-outline-secondary px-4" href="{{ route('permissions.index') }}">
                            <i class="fas fa-chevron-left mr-1"></i> Back
                        </a>
                        <button class="btn btn-gold shadow-sm px-4 font-weight-bold">
                            <i class="fas fa-sync-alt mr-1"></i> Update Permission
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
    .border-left-warning { border-left: 5px solid #ffc107; }
</style>
@endsection