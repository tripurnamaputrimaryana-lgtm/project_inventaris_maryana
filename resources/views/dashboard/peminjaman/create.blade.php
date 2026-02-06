@extends('layouts.dashboard')
@section('title','Tambah Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 p-4">

        <form action="{{ route('dashboard.peminjaman.store') }}" method="POST">
            @csrf

            {{-- Kode Peminjaman --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Kode Peminjaman</label>
                <input type="text" class="form-control bg-light" value="{{ $kode }}" readonly>
            </div>

            {{-- Nama Peminjam --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control" required>
            </div>

            {{-- Jenis Peminjam --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Peminjam</label>
                <select name="jenis_peminjam" class="form-select" required>
                    <option value="siswa">Siswa</option>
                    <option value="guru">Guru</option>
                    <option value="staf">Staf</option>
                    <option value="luar">Luar</option>
                </select>
            </div>

            {{-- Tanggal Pinjam --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>

            <hr>
            <h6 class="fw-semibold mb-3">Barang Dipinjam</h6>

            @foreach($barangs as $b)
            <div class="row mb-3 g-3 align-items-center">
                <div class="col-md-5">
                    <input type="hidden" name="barang_id[]" value="{{ $b->id }}">
                    <input type="text" class="form-control bg-light" value="{{ $b->nama_barang }}" readonly>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required min="1">
                </div>
                <div class="col-md-4">
                    <input type="text" name="kondisi_sebelum[]" class="form-control" placeholder="Kondisi Sebelum" required>
                </div>
            </div>
            @endforeach

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Simpan
                </button>
                <a href="{{ route('dashboard.peminjaman.index') }}" class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>

        </form>
    </div>

</div>

@push('styles')
<style>
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
    padding: 2rem;
}

.form-label { font-size: 0.95rem; }
.form-control, .form-select {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}
.form-control:focus, .form-select:focus {
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
