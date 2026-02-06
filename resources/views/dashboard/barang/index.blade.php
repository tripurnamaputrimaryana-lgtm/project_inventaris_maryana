@extends('layouts.dashboard')
@section('title','Barang Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Barang Management</h4>
            <p class="text-muted mb-0">Manage product items and inventory</p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard.barang.export.excel') }}" class="btn btn-success rounded-pill px-4">
                Excel
            </a>

            <a href="{{ route('dashboard.barang.export.pdf') }}" class="btn btn-danger rounded-pill px-4">
                PDF
            </a>
            
            <a href="{{ route('dashboard.barang.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bx bx-plus me-1"></i> Tambah Barang
            </a>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" id="barang-table">
                    <thead>
                        <tr>
                            <th class="text-center" width="60">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th class="text-center">Kondisi</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $index => $barang)
                        <tr>
                            <td class="text-center text-muted">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-dark">{{ $barang->kode_barang }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->kategori->nama ?? '-' }}</td>
                            <td>{{ $barang->lokasi->nama ?? '-' }}</td>
                            <td class="text-center">
                                @switch($barang->kondisi)
                                    @case('baik')
                                        <span class="badge rounded-pill bg-success">Baik</span>
                                        @break
                                    @case('rusak_ringan')
                                        <span class="badge rounded-pill bg-warning">Rusak Ringan</span>
                                        @break
                                    @case('rusak_berat')
                                        <span class="badge rounded-pill bg-danger">Rusak Berat</span>
                                        @break
                                    @case('hilang')
                                        <span class="badge rounded-pill bg-dark">Hilang</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center">{{ $barang->jumlah }} {{ $barang->satuan }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('dashboard.barang.show', $barang->id) }}"
                                       class="btn btn-sm btn-info rounded-circle"
                                       data-bs-toggle="tooltip"
                                       title="Show">
                                        <i class="bx bx-show"></i>
                                    </a>
                                    <a href="{{ route('dashboard.barang.edit', $barang->id) }}"
                                       class="btn btn-sm btn-warning rounded-circle"
                                       data-bs-toggle="tooltip"
                                       title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('dashboard.barang.destroy', $barang->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
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
                        @endforeach

                        @if($barangs->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center text-muted">Belum ada barang</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Tambahkan CSS Khusus untuk tampilan lebih premium --}}
@push('styles')
<style>
/* ===== Page Header ===== */
.container-xxl h4 {
    font-size: 1.35rem;
    letter-spacing: -0.3px;
}

.container-xxl p {
    font-size: 0.9rem;
}

/* ===== Buttons ===== */
.btn {
    font-weight: 500;
    transition: all 0.25s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5, #38bdf8);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,.35);
}

.btn-success,
.btn-danger {
    border-radius: 12px;
}

/* ===== Card ===== */
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
}

/* ===== Table ===== */
.table {
    border-collapse: separate;
    border-spacing: 0 10px;
}

.table thead th {
    background: #f8fafc;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: #64748b;
    border: none;
    padding: 14px;
}

.table tbody tr {
    background: #ffffff;
    transition: all 0.25s ease;
    box-shadow: 0 4px 14px rgba(15,23,42,0.04);
}

.table tbody tr:hover {
    transform: scale(1.01);
    box-shadow: 0 10px 30px rgba(15,23,42,0.08);
}

.table td {
    border: none;
    padding: 14px;
    vertical-align: middle;
}

/* ===== Badge Kondisi ===== */
.badge {
    padding: 6px 12px;
    font-weight: 500;
    font-size: 0.7rem;
}

/* ===== Action Buttons ===== */
.btn-sm.rounded-circle {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
}

.btn-sm.rounded-circle:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
}

/* ===== Empty State ===== */
.table tbody tr td[colspan] {
    padding: 40px 0;
    font-style: italic;
    color: #94a3b8;
}
</style>
@endpush
@endsection
