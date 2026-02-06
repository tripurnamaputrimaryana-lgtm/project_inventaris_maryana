@extends('layouts.dashboard')
@section('title','Detail Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 p-4">

        <div class="d-flex justify-content-between mb-4">
            <h4 class="fw-bold mb-0">Detail Peminjaman</h4>
            <a href="{{ route('dashboard.peminjaman.index') }}"
               class="btn btn-secondary btn-lg rounded-pill">
                <i class="bx bx-arrow-back me-1"></i> Kembali
            </a>
        </div>

        {{-- Info Peminjaman --}}
        <div class="row mb-4">
            <div class="col-md-6"><b>Kode:</b> {{ $peminjaman->kode_peminjaman }}</div>
            <div class="col-md-6"><b>Nama:</b> {{ $peminjaman->nama_peminjam }}</div>
            <div class="col-md-6"><b>Tanggal Pinjam:</b> {{ $peminjaman->tanggal_pinjam }}</div>
            <div class="col-md-6"><b>Tanggal Kembali:</b> {{ $peminjaman->tanggal_kembali ?? '-' }}</div>
            <div class="col-md-6"><b>Status:</b> <span class="badge bg-info">{{ ucfirst($peminjaman->status) }}</span></div>
        </div>

        <hr>

        {{-- Table Barang --}}
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Barang</th>
                        <th class="text-center">Jumlah</th>
                        <th>Kondisi Sebelum</th>
                        <th>Kondisi Sesudah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman->details as $d)
                    <tr>
                        <td>{{ $d->barang->nama_barang }}</td>
                        <td class="text-center">{{ $d->jumlah }}</td>
                        <td>{{ $d->kondisi_sebelum }}</td>
                        <td>{{ $d->kondisi_sesudah ?? '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada barang</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@push('styles')
<style>
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
    padding: 2rem;
}

.table thead th {
    border-bottom: 2px solid #e2e8f0;
}

.table tbody tr:hover {
    background-color: rgba(79,70,229,0.05);
    transition: 0.2s;
}

.badge {
    font-size: 0.85rem;
    font-weight: 500;
}
</style>
@endpush

@endsection
