@extends('backend.layout')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow animated fadeInDown border-left-warning">
            <div class="card-header bg-maroon text-white py-3">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-edit mr-2"></i> Update Role: {{ $role->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-maroon">Role Name</label>
                        <input type="text" id="name" name="name" class="form-control border-danger" 
                               value="{{ old('name', $role->name) }}" required>
                        @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Modify Permissions</label>
                        <div class="p-3 border rounded bg-light">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4 mb-2">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" value="{{ $permission->id }}" 
                                                   name="permissions[]" id="perm_{{ $permission->id }}" 
                                                   {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="custom-control-label text-dark" for="perm_{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="actions" class="font-weight-bold text-maroon">Description/Actions</label>
                        <textarea id="actions" name="actions" class="form-control border-danger" 
                                  rows="3">{{ old('actions', $role->actions) }}</textarea>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-gold shadow-sm px-4 font-weight-bold">
                            <i class="fas fa-sync-alt mr-1"></i> Update Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection