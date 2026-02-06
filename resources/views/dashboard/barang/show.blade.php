@extends('layouts.dashboard')
@section('title','Detail Barang')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Detail Barang</h4>
            <p class="text-muted mb-0">Informasi lengkap tentang barang</p>
        </div>
        <a href="{{ route('dashboard.barang.index') }}" class="btn btn-outline-primary rounded-pill px-4">
            <i class="bx bx-arrow-back me-1"></i> Back
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0 rounded-3 p-4">
        <div class="row g-4">

            <!-- Kode Barang -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kode Barang</label>
                <input type="text" class="form-control bg-light" value="{{ $barang->kode_barang }}" disabled>
            </div>

            <!-- Nama Barang -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control bg-light" value="{{ $barang->nama_barang }}" disabled>
            </div>

            <!-- Kategori -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kategori</label>
                <input type="text" class="form-control bg-light"
                       value="{{ $barang->kategori->nama ?? '-' }}" disabled>
            </div>

            <!-- Lokasi -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Lokasi</label>
                <input type="text" class="form-control bg-light"
                       value="{{ $barang->lokasi->nama ?? '-' }}" disabled>
            </div>

            <!-- Kondisi -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kondisi</label>
                <input type="text" class="form-control bg-light"
                       value="{{ ucfirst(str_replace('_', ' ', $barang->kondisi)) }}" disabled>
            </div>

            <!-- Jumlah -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="text" class="form-control bg-light"
                       value="{{ $barang->jumlah }} {{ $barang->satuan }}" disabled>
            </div>

            <!-- Tanggal Beli -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Tanggal Beli</label>
                <input type="text" class="form-control bg-light"
                       value="{{ $barang->tanggal_beli ?? '-' }}" disabled>
            </div>

            <!-- Harga -->
            <div class="col-md-6">
                <label class="form-label fw-semibold">Harga</label>
                <input type="text" class="form-control bg-light"
                       value="{{ $barang->harga ? 'Rp '.number_format($barang->harga, 2, ',', '.') : '-' }}"
                       disabled>
            </div>

            <!-- Deskripsi -->
            <div class="col-12">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea class="form-control bg-light" rows="3" disabled>{{ $barang->deskripsi ?? '-' }}</textarea>
            </div>

            <!-- Foto -->
            @if ($barang->foto)
            <div class="col-12">
                <label class="form-label fw-semibold">Foto</label>
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $barang->foto) }}"
                         alt="{{ $barang->nama_barang }}"
                         class="img-fluid rounded shadow-sm"
                         style="max-width:300px;">
                </div>
            </div>
            @endif

        </div>
    </div>

</div>

{{-- Optional CSS --}}
@push('styles')
<style>
.card {
    padding: 2rem;
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
}

.form-label {
    font-size: 0.95rem;
}

.form-control,
textarea.form-control {
    border-radius: 12px;
    padding: 10px 12px;
}

.img-fluid {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}
</style>
@endpush
@endsection
