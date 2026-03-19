@extends('backend.layout')

@section('content')
<div class="card shadow">
    <div class="card-header bg-maroon text-white">Permission Detail</div>
    <div class="card-body">
        <h4>{{ $permission->name }}</h4>
        <p><strong>Actions:</strong> {{ $permission->actions ?? 'None' }}</p>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
