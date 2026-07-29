@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow text-center py-4 border-bottom-danger">
            <div class="card-body">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-5x text-maroon"></i>
                </div>
                <h4 class="font-weight-bold mb-0">{{ $user->name }}</h4>
                <p class="text-muted small">{{ $user->email }}</p>
                
                @if($user instanceof \App\Models\Admin)
                    <span class="badge badge-danger mb-2">ADMIN ACCOUNT</span>
                @endif

                <hr>

                <div class="mb-3">
                    <span class="badge badge-pill py-2 px-4 shadow-sm" style="background-color: #D4AF37; color: #000; font-size: 14px;">
                        Role: {{ $user->getRoleNames()->first() ?? 'No Role Assigned' }}
                    </span>
                </div>

                {{-- PERMISSIONS SUMMARY --}}
                <div class="mt-4 text-left">
                    <h6 class="font-weight-bold text-maroon border-bottom pb-2 mb-3">
                        <i class="fas fa-shield-alt mr-1"></i> Active Permissions
                    </h6>
                    <div>
                        @if(method_exists($user, 'getAllPermissions') && $user->getAllPermissions()->isNotEmpty())
                            @foreach($user->getAllPermissions() as $perm)
                                <span class="badge badge-light border shadow-sm p-2 mr-1 mb-2">
                                    <i class="fas fa-check-circle text-success mr-1"></i> {{ $perm->name }}
                                </span>
                            @endforeach
                        @else
                            <p class="text-muted small italic mb-0">No active permissions assigned to this user.</p>
                        @endif
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-maroon btn-sm px-4">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-outline-maroon { color: #8B0000; border-color: #8B0000; }
    .btn-outline-maroon:hover { background-color: #8B0000; color: #fff; }
</style>
@endsection