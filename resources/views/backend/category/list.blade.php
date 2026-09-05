@extends('backend.layout')

@section('content')
<div class="container-fluid">

    <!-- Official Printable Report Header (Hidden on Screen, Visible on Print) -->
    <div class="print-header text-center mb-4">
        <h2 class="text-maroon font-weight-bold mb-1">PSM Craft House</h2>
        <h4 class="text-dark font-weight-bold">Craft Category Report</h4>
        <p class="mb-0">
            <strong>Date:</strong> {{ date('d/m/Y') }} | 
            <strong>Report Type:</strong> Categories List
        </p>
        <hr class="border-maroon my-3">
    </div>

    <div class="card shadow mb-4 animated fadeIn border-bottom-maroon">
        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-maroon no-print">
            <h6 class="m-0 font-weight-bold text-white">
                <i class="fas fa-scroll mr-2"></i> Myanmar Craft Collection
            </h6>
            
            <div>
                <!-- PRINT BUTTON -->
                <button onclick="window.print()" class="btn btn-light btn-sm shadow-sm font-weight-bold mr-2 text-maroon">
                    <i class="fas fa-print mr-1"></i> Print Categories
                </button>

                <a href="{{ route('categories.create') }}" class="btn btn-gold btn-sm shadow-sm font-weight-bold">
                    <i class="fas fa-plus-circle fa-sm"></i> Add New Category
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-danger alert-dismissible fade show animated slideInDown no-print" style="background-color: #f8d7da; border-color: #8B0000; color: #8B0000;">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered printable-table" width="100%" cellspacing="0">
                    <thead class="bg-light text-maroon">
                        <tr>
                            <th>ID</th>
                            <th class="no-print">Cover</th>
                            <th>Craft Category</th>
                            <th>Brief Description</th>
                            <th>Added Date</th>
                            <th class="text-center no-print">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr class="animated fadeInUp">
                                <td class="font-weight-bold align-middle">#{{ $category->id }}</td>
                                <td class="text-center align-middle no-print" width="80">
                                    @if($category->image)
                                        <img src="{{ asset('backend_assets/img/' . $category->image) }}" width="60" height="60" class="rounded shadow-sm" style="object-fit: cover;">
                                    @else
                                        <span class="badge badge-secondary">No Image</span>
                                    @endif
                                </td>
                                <td class="text-maroon align-middle"><strong>{{ $category->name }}</strong></td>
                                <td class="text-muted italic small align-middle">{{ \Illuminate\Support\Str::limit($category->description, 70) }}</td>
                                <td class="align-middle">{{ $category->created_at ? $category->created_at->format('d/m/Y') : '-' }}</td>
                                <td class="text-center align-middle no-print">
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
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No traditional crafts found in the archives.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-maroon { background-color: #8B0000; color: #fff; }
    .btn-gold { background-color: #D4AF37; color: #000; border: none; }
    .btn-gold:hover { background-color: #B8860B; color: #fff; }
    .text-maroon { color: #8B0000; }
    .border-bottom-maroon { border-bottom: 4px solid #8B0000; }
    .border-maroon { border-color: #8B0000; }
    .table-hover tbody tr:hover { background-color: #fff5f5; }

    /* Hide Print Header on Screen View */
    @media screen {
        .print-header { display: none !important; }
    }

    /* Print Stylesheet - Applied ONLY when printing or saving PDF */
    @media print {
        /* Hide navbar, sidebar, action buttons, alert boxes, cover images, and non-printable elements */
        nav, .sidebar, .navbar, .no-print, button, .btn, .alert {
            display: none !important;
        }

        /* Expand body container to full print width */
        body, .container-fluid {
            width: 100% !important;
            margin: 0 !important;
            padding: 10px !important;
            background: #fff !important;
            color: #000 !important;
        }

        .print-header {
            display: block !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }

        /* Format table borders for printout */
        .printable-table {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        .printable-table th, .printable-table td {
            border: 1px solid #444 !important;
            padding: 8px 10px !important;
            font-size: 11pt !important;
        }

        .printable-table th {
            background-color: #f2f2f2 !important;
            color: #000 !important;
            -webkit-print-color-adjust: exact;
        }
    }
</style>
@endsection