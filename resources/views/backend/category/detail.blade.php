@extends('backend.layout')

@section('content')
<div class="card shadow mb-4 animated bounceInRight border-top-danger" style="border-top-width: 5px;">
    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
        <h6 class="m-0 font-weight-bold text-danger"><i class="fas fa-info-circle"></i> Archives: {{ $category->name }}</h6>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-danger px-3 shadow-sm">
            <i class="fas fa-undo"></i> Return
        </a>
    </div>
    <div class="card-body">
        <div class="p-3 mb-2 bg-light text-dark rounded border">
            <h5 class="text-maroon border-bottom pb-2 font-weight-bold">Craft Overview</h5>
            <div class="row mt-3">
                <div class="col-sm-3 font-weight-bold text-muted small uppercase">Reference ID</div>
                <div class="col-sm-9 text-danger">#{{ $category->id }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 font-weight-bold text-muted small uppercase">Craft History</div>
                <div class="col-sm-9 lead" style="font-size: 1.1rem;">{{ $category->description }}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3 font-weight-bold text-muted small uppercase">Date Indexed</div>
                <div class="col-sm-9 font-italic">{{ $category->created_at->format('F d, Y \a\t H:i A') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection