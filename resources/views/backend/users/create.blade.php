@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-left-danger animated zoomIn">
            <div class="card-header py-3 bg-maroon">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-plus mr-2"></i> Register New Staff</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Full Name</label>
                        <input type="text" name="name" class="form-control border-danger" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Email Address</label>
                        <input type="email" name="email" class="form-control border-danger" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-maroon">Password</label>
                            <input type="password" name="password" class="form-control border-danger" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold text-maroon">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control border-danger" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-maroon">Assign Role</label>
                        <select name="role" class="form-control border-danger" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
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