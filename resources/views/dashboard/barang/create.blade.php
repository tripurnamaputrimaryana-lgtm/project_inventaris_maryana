@extends('layouts.dashboard')
@section('title','Tambah Barang')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('dashboard.barang.store') }}" method="POST">
            @csrf

            {{-- Kode Barang --}}
            <div class="mb-3">
                <label for="kode_barang" class="form-label fw-semibold">Kode Barang</label>
                <input type="text" class="form-control bg-light" id="kode_barang" name="kode_barang" value="{{ $kodeBarang }}" readonly>
            </div>

            {{-- Nama Barang --}}
            <div class="mb-3">
                <label for="nama_barang" class="form-label fw-semibold">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
                <select class="form-select" name="kategori_id" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Lokasi --}}
            <div class="mb-3">
                <label for="lokasi_id" class="form-label fw-semibold">Lokasi</label>
                <select class="form-select" name="lokasi_id" required>
                    <option value="" disabled selected>Pilih Lokasi</option>
                    @foreach($lokasi as $l)
                    <option value="{{ $l->id }}">{{ $l->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Kondisi --}}
            <div class="mb-3">
                <label for="kondisi" class="form-label fw-semibold">Kondisi</label>
                <select class="form-select" name="kondisi" required>
                    <option value="baik">Baik</option>
                    <option value="rusak_ringan">Rusak Ringan</option>
                    <option value="rusak_berat">Rusak Berat</option>
                    <option value="hilang">Hilang</option>
                </select>
            </div>

            {{-- Jumlah --}}
            <div class="mb-3">
                <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
            </div>

            {{-- Satuan --}}
            <div class="mb-3">
                <label for="satuan" class="form-label fw-semibold">Satuan</label>
                <select class="form-select" name="satuan" id="satuan" required>
                    <option value="unit">Unit</option>
                    <option value="pcs">Pcs</option>
                    <option value="kg">Kg</option>
                    <option value="liter">Liter</option>
                </select>
            </div>

            {{-- Tanggal Beli --}}
            <div class="mb-3">
                <label for="tanggal_beli" class="form-label fw-semibold">Tanggal Beli</label>
                <input type="date" class="form-control" id="tanggal_beli" name="tanggal_beli">
            </div>

            {{-- Harga --}}
            <div class="mb-3">
                <label for="harga" class="form-label fw-semibold">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Simpan
                </button>
                <a href="{{ route('dashboard.barang.index') }}" class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>

{{-- Optional CSS untuk tampilan lebih elegan --}}
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
.form-select {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}

.form-control:focus,
.form-select:focus {
    box-shadow: 0 0 0 3px rgba(79,70,229,0.25);
    border-color: #4f46e5;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5, #38bdf8);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,.35);
}

.btn-secondary {
    background: #64748b;
    border: none;
    color: #fff;
}

.btn-secondary:hover {
    background: #475569;
}
</style>
@endpush
@endsection
