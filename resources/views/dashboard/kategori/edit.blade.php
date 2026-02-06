@extends('layouts.dashboard')
@section('title','Edit Kategori')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 rounded-3 p-4">

        <form action="{{ route('dashboard.kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Header --}}
            <h4 class="fw-bold mb-4 text-dark">Edit Kategori</h4>

            <div class="row g-4">

                {{-- Nama Kategori --}}
                <div class="col-md-6">
                    <label for="nama" class="form-label fw-semibold">Nama Kategori</label>
                    <input type="text"
                           id="nama"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $kategori->nama) }}"
                           placeholder="Masukkan nama kategori"
                           required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-6">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea id="deskripsi"
                              name="deskripsi"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Deskripsi kategori">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('dashboard.kategori.index') }}"
                   class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Simpan Perubahan
                </button>
            </div>

        </form>

    </div>
</div>

{{-- Optional CSS untuk style elegan --}}
@push('styles')
<style>
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
    padding: 2rem;
}

.form-label {
    font-size: 0.95rem;
}

.form-control,
textarea.form-control {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}

.form-control:focus,
textarea.form-control:focus {
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
