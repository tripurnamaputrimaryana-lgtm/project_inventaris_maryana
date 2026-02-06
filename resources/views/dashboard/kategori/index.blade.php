@extends('layouts.dashboard')
@section('title','Kategori Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Kategori Management</h4>
            <p class="text-muted mb-0">Manage product categories</p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard.kategori.export.excel') }}" class="btn btn-success rounded-pill px-4">
                <i class="bx bx-file me-1"></i> Excel
            </a>
            <a href="{{ route('dashboard.kategori.export.pdf') }}" class="btn btn-danger rounded-pill px-4">
                <i class="bx bx-file me-1"></i> PDF
            </a>

            <a href="{{ route('dashboard.kategori.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bx bx-plus me-1"></i> Tambah Kategori
            </a>
        </div>
    </div>

    <!-- Card Table -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-3">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="kategori-table">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="60">No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th class="text-center" width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kategoris as $index => $item)
                        <tr class="table-row-hover">
                            <td class="text-center text-muted">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-dark">{{ $item->nama }}</td>
                            <td><small class="text-muted">{{ $item->deskripsi ?? '-' }}</small></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('dashboard.kategori.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning rounded-circle"
                                       data-bs-toggle="tooltip"
                                       title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.kategori.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-danger rounded-circle"
                                                data-bs-toggle="tooltip"
                                                title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Belum ada kategori
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

{{-- Optional CSS + Hover Effect --}}
@push('styles')
<style>
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
}

.table thead th {
    border-bottom: 2px solid #e2e8f0;
}

.table tbody tr.table-row-hover {
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.table tbody tr.table-row-hover:hover {
    background-color: rgba(79,70,229,0.05);
    transform: translateX(5px);
}

.badge {
    font-size: 0.85rem;
    font-weight: 500;
}

.btn-primary, .btn-success, .btn-danger {
    border: none;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5, #38bdf8);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(79,70,229,.35);
}

.btn-success {
    background: linear-gradient(135deg, #22c55e, #4ade80);
}
.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(34,197,94,.35);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
}
.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(239,68,68,.35);
}
</style>
@endpush
@endsection
