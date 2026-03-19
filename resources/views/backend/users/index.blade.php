@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 font-weight-bold text-maroon">User Management</h1>
        @can('user-create')
        <a href="{{ route('users.create') }}" class="btn btn-gold shadow-sm font-weight-bold">
            <i class="fas fa-user-plus mr-1"></i> Add Team Member
        </a>
        @endcan
    </div>

    @if(session('success'))
        <div class="alert alert-success border-left-success shadow animated fadeInDown">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4 animated fadeInUp">
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
                            <th class="text-center">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="align-middle font-weight-bold">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">
                                @foreach($user->getRoleNames() as $role)
                                    <span class="badge badge-pill shadow-sm px-3" style="background-color: #D4AF37; color: #000;">
                                        {{ $role }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-outline-info"><i class="fas fa-eye"></i></a>
                                    @can('user-edit')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    @endcan
                                    @can('user-delete')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this user?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">{{ $users->links() }}</div>
        </div>
    </div>
</div>
@endsection