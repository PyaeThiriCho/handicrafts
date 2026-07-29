@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 font-weight-bold text-maroon">User Management</h1>
        <a href="{{ route('users.create') }}" class="btn btn-warning shadow-sm font-weight-bold text-dark">
            <i class="fas fa-user-plus mr-1"></i> Add Team Member
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-left-success shadow mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger border-left-danger shadow mb-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-maroon">
            <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-users mr-2"></i> Authorized Staff List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead class="bg-light text-maroon">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Active Permissions</th>
                            <th class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td class="align-middle font-weight-bold">
                                {{ $user->name }}
                                @if($user instanceof \App\Models\Admin)
                                    <span class="badge badge-danger ml-1" style="font-size: 10px;">ADMIN DB</span>
                                @endif
                            </td>
                            <td class="align-middle">{{ $user->email }}</td>
                            
                            {{-- ROLE BADGES --}}
                            <td class="align-middle">
                                @if($user->roles->isNotEmpty())
                                    @foreach($user->getRoleNames() as $roleName)
                                        <span class="badge badge-pill shadow-sm px-3" style="background-color: #D4AF37; color: #000;">
                                            {{ $roleName }}
                                        </span>
                                    @endforeach
                                @elseif($user instanceof \App\Models\Admin)
                                    <span class="badge badge-pill shadow-sm px-3" style="background-color: #D4AF37; color: #000;">
                                        Admin
                                    </span>
                                @else
                                    <span class="badge badge-secondary px-2">No Role</span>
                                @endif
                            </td>

                            {{-- PERMISSIONS (Role + Direct) --}}
                            <td class="align-middle">
                                @if(method_exists($user, 'getAllPermissions') && $user->getAllPermissions()->isNotEmpty())
                                    @foreach($user->getAllPermissions() as $perm)
                                        <span class="badge badge-light border mb-1">{{ $perm->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>

                            {{-- ACTION BUTTONS --}}
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this account?')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No staff or admin accounts found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION LINKS --}}
            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection