@extends('backend.layout')

@section('content')
<style>
    .bg-maroon { background-color: #8B0000; color: #fff; }
    .btn-gold { background-color: #D4AF37; color: #000; border: none; }
    .btn-gold:hover { background-color: #B8860B; color: #fff; }
    .text-maroon { color: #8B0000; }
    .table-hover tbody tr:hover { background-color: #fff5f5; }
</style>

<div class="card shadow mb-4 animated fadeIn">
    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-maroon">
        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-scroll mr-2"></i> Myanmar Craft Collection</h6>
        <a href="{{ route('categories.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold">
            <i class="fas fa-plus-circle fa-sm"></i> Add New Category
        </a>
    </div>
    <div class="card-body border-bottom-maroon">
        @if(session('success'))
            <div class="alert alert-danger alert-dismissible fade show animated slideInDown" style="background-color: #f8d7da; border-color: #8B0000; color: #8B0000;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                <thead class="bg-light text-maroon">
                    <tr>
                        <th>ID</th>
                        <th>Craft Category</th>
                        <th>Brief Description</th>
                        <th>Added Date</th>
                        <th class="text-center">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="animated fadeInUp">
                            <td class="font-weight-bold">#{{ $category->id }}</td>
                            <td class="text-maroon"><strong>{{ $category->name }}</strong></td>
                            <td class="text-muted italic small">{{ \Illuminate\Support\Str::limit($category->description, 70) }}</td>
                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-outline-info" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this craft record?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-5 text-muted">No traditional crafts found in the archives.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection