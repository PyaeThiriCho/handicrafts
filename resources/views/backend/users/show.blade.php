@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow text-center py-4 border-bottom-danger">
            <div class="card-body">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-5x text-maroon"></i>
                </div>
                <h4 class="font-weight-bold mb-0">{{ $user->name }}</h4>
                <p class="text-muted small">{{ $user->email }}</p>
                <hr>
                <div class="mb-4">
                    <span class="badge badge-pill py-2 px-4 shadow-sm" style="background-color: #D4AF37; color: #000;">
                        Role: {{ $user->getRoleNames()->first() }}
                    </span>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-outline-maroon btn-sm">Back to List</a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-outline-maroon { color: #8B0000; border-color: #8B0000; }
    .btn-outline-maroon:hover { background-color: #8B0000; color: #fff; }
</style>
@endsection