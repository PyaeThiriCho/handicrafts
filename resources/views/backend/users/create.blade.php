@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        
        <!-- DISPLAY ERRORS HERE -->
        @if ($errors->any())
            <div class="alert alert-danger shadow mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger shadow mb-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow border-left-danger animated zoomIn">
            <div class="card-header py-3 bg-maroon">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-plus mr-2"></i> Register New Staff</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control border-danger" required>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control border-danger" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-maroon">Password</label>
                            <input type="password" name="password" class="form-control border-danger" required minlength="8">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-maroon">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control border-danger" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Assign Role</label>
                        <select name="role" class="form-control border-danger" required>
                            <option value="" disabled selected>-- Select a Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- DIRECT PERMISSIONS CHECKBOXES -->
                    @if(isset($permissions) && $permissions->count() > 0)
                        <div class="form-group mt-4">
                            <label class="font-weight-bold text-maroon d-block mb-2">
                                <i class="fas fa-key mr-1"></i> Assign Direct Permissions (Optional)
                            </label>
                            <div class="card bg-light border p-3">
                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-4 mb-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" 
                                                       name="permissions[]" 
                                                       value="{{ $permission->name }}" 
                                                       class="custom-control-input" 
                                                       id="perm_{{ $permission->id }}"
                                                       {{ is_array(old('permissions')) && in_array($permission->name, old('permissions')) ? 'checked' : '' }}>
                                                <label class="custom-control-label text-dark font-weight-normal" for="perm_{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mt-4 text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-light border">Cancel</a>
                        <button type="submit" class="btn btn-danger px-4 shadow">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection