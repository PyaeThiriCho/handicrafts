@extends('backend.layout')

@section('content')
<div class="card shadow mb-4 animated fadeInDown border-top-danger" style="border-top-width: 4px;">
    <div class="card-header py-3 bg-white d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-danger">Inventory View: {{ $product->name }}</h6>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Return to Collection</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid rounded shadow border" style="max-height: 300px;">
                @else
                    <div class="bg-light p-5 border text-muted">No Imagery Found</div>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr><td width="200" class="font-weight-bold text-muted">CRAFT ID</td><td class="text-danger font-weight-bold">#{{ $product->id }}</td></tr>
                    <tr><td class="font-weight-bold text-muted">NAME</td><td class="lead font-weight-bold">{{ $product->name }}</td></tr>
                    <tr><td class="font-weight-bold text-muted">TYPE</td><td><span class="badge badge-danger">{{ $product->category?->name }}</span></td></tr>
                    <tr><td class="font-weight-bold text-muted">STORY/DESC</td><td>{{ $product->description }}</td></tr>
                    <tr><td class="font-weight-bold text-muted">PRICE</td><td class="h4 text-danger">{{ number_format($product->price, 0) }} MMK</td></tr>
                    <tr><td class="font-weight-bold text-muted">AVAILABLE STOCK</td><td><span class="badge badge-secondary">{{ $product->stock }} Units</span></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection