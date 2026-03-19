@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 font-weight-bold text-maroon">Role Management</h1>
            <p class="text-muted">Create roles, assign permissions, and manage actions.</p>
        </div>
        <a href="{{ route('roles.create') }}" class="btn btn-gold shadow-sm font-weight-bold">
            <i class="fas fa-plus-circle"></i> New Role
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4 animated fadeInUp">
        <div class="card-header py-3 bg-maroon">
            <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-shield mr-2"></i> Role Master List</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-maroon">Role Name</th>
                            <th class="text-maroon">Permissions</th>
                            <th class="text-maroon">Description/Actions</th>
                            <th class="text-center text-maroon">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            {{-- Filter: Skip the 'Staff' role from the display --}}
                            @if($role->name !== 'Staff')
                                <tr>
                                    <td class="align-middle font-weight-bold text-dark">{{ $role->name }}</td>
                                    <td class="align-middle">
                                        @foreach($role->permissions as $permission)
                                            <span class="badge badge-secondary border mr-1 mb-1 shadow-sm">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-muted small">{{ $role->actions ?? '-' }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group">
                                            <a href="{{ route('roles.show', $role) }}" class="btn btn-sm btn-outline-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        onclick="return confirm('Delete this role?')" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr><td colspan="4" class="text-center py-5">No roles found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3 d-flex justify-content-center custom-pagination">
                {{ $roles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<style>
    .text-maroon { color: #8B0000; }
    .bg-maroon { background-color: #8B0000 !important; }
    .btn-gold { background-color: #D4AF37; color: #000; border: none; }
    .btn-gold:hover { background-color: #C5A028; color: #000; }
    
    .custom-pagination .page-item.active .page-link {
        background-color: #8B0000 !important;
        border-color: #8B0000 !important;
    }
    .custom-pagination .page-link {
        color: #8B0000 !important;
    }
</style>
@endsection