@extends('layouts.dashboard')

@section('title','Tambah Lokasi')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 rounded-3 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Tambah Lokasi</h4>
        </div>

        <form action="{{ route('dashboard.lokasi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lokasi</label>
                <input type="text"
                       name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}"
                       placeholder="Contoh: Gudang Utama">
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="3"
                          placeholder="Deskripsi lokasi (opsional)">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('dashboard.lokasi.index') }}" class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Simpan
                </button>
            </div>

        </form>

    </div>
</div>

@push('styles')
<style>
.card {
    padding: 2rem;
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
}

.form-control {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}

.form-control:focus {
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
