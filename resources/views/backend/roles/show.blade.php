@extends('backend.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow border-bottom-maroon">
            <div class="card-header bg-maroon text-white py-3">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-info-circle mr-2"></i> Role Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-4 text-center">
                    <h2 class="font-weight-bold text-maroon mb-1">{{ $role->name }}</h2>
                    <span class="text-muted italic">Registered Role Profile</span>
                </div>
                
                <div class="mb-3">
                    <h6 class="font-weight-bold text-dark border-bottom pb-2">Actions Scope</h6>
                    <p class="text-secondary mt-2">{{ $role->actions ?? 'No specific actions defined for this role.' }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="font-weight-bold text-dark border-bottom pb-2">Assigned Permissions</h6>
                    <div class="mt-3">
                        @forelse($role->permissions as $permission)
                            <span class="badge badge-outline-danger border border-danger text-danger px-3 py-2 mr-2 mb-2 shadow-sm">
                                <i class="fas fa-check-circle mr-1"></i> {{ $permission->name }}
                            </span>
                        @empty
                            <div class="text-muted py-2">No assigned permissions.</div>
                        @endforelse
                    </div>
                </div>

                <div class="text-center pt-3 border-top">
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary px-5">
                        <i class="fas fa-list mr-1"></i> Return to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-maroon { color: #8B0000; }
    .bg-maroon { background-color: #8B0000; }
    .border-bottom-maroon { border-bottom: 5px solid #8B0000; }
</style>
@endsection