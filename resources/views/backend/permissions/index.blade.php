@extends('backend.layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 text-maroon">Permissions</h1>
        <p class="text-muted">Manage permission names and related actions.</p>
    </div>
    <a href="{{ route('permissions.create') }}" class="btn btn-gold">+ New Permission</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover border">
                {{-- FIX: Added clear labels to the header --}}
                <thead class="bg-light text-maroon">
                    <tr>
                        <th style="width: 25%">Permission Name</th>
                        <th style="width: 55%">Actions / Description</th>
                        <th style="width: 20%" class="text-center">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td class="align-middle font-weight-bold">{{ $permission->name }}</td>
                            <td class="align-middle text-muted">{{ $permission->actions ?? '-' }}</td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this permission?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-4">No permissions yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>






<style>
.text-maroon { color: #8B0000; }
.btn-gold { background-color: #D4AF37; color: #000; }
</style>
@endsection
