@extends('layouts.dashboard')
@section('title','Barang Keluar')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Barang Keluar</h4>
            <p class="text-muted mb-0">Daftar barang keluar dari inventaris</p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard.barang-keluars.export.excel') }}" class="btn btn-success rounded-pill px-4">
                <i class="bx bx-file me-1"></i> Excel
            </a>
            <a href="{{ route('dashboard.barang-keluars.export.pdf') }}" class="btn btn-danger rounded-pill px-4">
                <i class="bx bx-file me-1"></i> PDF
            </a>
            <a href="{{ route('dashboard.barang-keluars.create') }}" class="btn btn-danger rounded-pill px-4">
                <i class="bx bx-plus me-1"></i> Tambah Barang Keluar
            </a>
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Card Table -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle" id="barang-keluar-table">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width:60px">No</th>
                            <th>Barang</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jenis Keluar</th>
                            <th class="text-center">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangKeluars as $item)
                        <tr class="table-row-hover">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <span class="badge bg-danger rounded-pill px-3 py-2 text-white">
                                    {{ ucfirst(str_replace('_',' ', $item->jenis_keluar)) }}
                                </span>
                            </td>
                            <td class="text-center">{{ $item->tanggal_keluar }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data barang keluar</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- Optional CSS + Animasi --}}
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
    background-color: rgba(239,68,68,0.05);
    transform: translateX(5px);
}

.badge {
    font-size: 0.85rem;
    font-weight: 500;
}

.btn-success {
    background: linear-gradient(135deg, #22c55e, #4ade80);
    border: none;
    transition: all 0.3s ease;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(34,197,94,.35);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(239,68,68,.35);
}
</style>
@endpush
@endsection
