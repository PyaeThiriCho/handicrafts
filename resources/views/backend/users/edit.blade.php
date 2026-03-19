@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-left-warning animated fadeIn">
            <div class="card-header py-3 bg-maroon">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-edit mr-2"></i> Update Staff Details</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control border-danger">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control border-danger">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon text-xs">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control border-danger">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Confirm New Password</label>
                        <input type="password" name="confirm-password" class="form-control border-danger">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Change Role</label>
                        <select name="role" class="form-control border-danger">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 text-right">
                        <button type="submit" class="btn btn-warning px-4 shadow font-weight-bold">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection