@extends('backend.layout')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow animated fadeInDown border-left-maroon">
            <div class="card-header bg-maroon text-white py-3">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-plus-circle mr-2"></i> Define New Role</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-maroon">Role Name</label>
                        <input type="text" name="name" id="name" class="form-control border-danger" 
                               placeholder="e.g., Manager" value="{{ old('name') }}" required>
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Assign Permissions</label>
                        <div class="p-3 border rounded bg-light">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4 mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" value="{{ $permission->id }}" 
                                                   name="permissions[]" id="perm_{{ $permission->id }}">
                                            <label class="custom-control-label text-dark" for="perm_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @error('permissions')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="actions" class="font-weight-bold text-maroon">Description</label>
                        <textarea id="actions" name="actions" class="form-control border-danger" 
                                  rows="3" placeholder="Define the scope of this role...">{{ old('actions') }}</textarea>
                        @error('actions')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-times mr-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-gold shadow-sm px-4 font-weight-bold">
                            <i class="fas fa-save mr-1"></i> Save Role
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
    .border-left-maroon { border-left: 5px solid #8B0000; }
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #8B0000;
        border-color: #8B0000;
    }
</style>
@endsection