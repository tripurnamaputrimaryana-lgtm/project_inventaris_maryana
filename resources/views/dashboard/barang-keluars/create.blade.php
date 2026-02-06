@extends('layouts.dashboard')
@section('title','Tambah Barang Keluar')

@section('content')
<div class="container-xxl container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h4 class="fw-bold mb-0">Tambah Barang Keluar</h4>
    </div>

    <!-- Card Form -->
    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('dashboard.barang-keluars.store') }}" method="POST">
            @csrf

            <!-- Barang -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Barang</label>
                <select name="barang_id" class="form-select @error('barang_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">
                            {{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jumlah -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Jumlah</label>
                <input type="number" name="jumlah"
                       class="form-control @error('jumlah') is-invalid @enderror"
                       required min="1">
                @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenis Keluar -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Jenis Keluar</label>
                <select name="jenis_keluar" class="form-select @error('jenis_keluar') is-invalid @enderror" required>
                    <option value="">-- Pilih --</option>
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Hilang">Hilang</option>
                    <option value="Dijual">Dijual</option>
                </select>
                @error('jenis_keluar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Keluar -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar"
                       class="form-control @error('tanggal_keluar') is-invalid @enderror"
                       required>
                @error('tanggal_keluar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-danger rounded-pill px-4">
                    <i class="bx bx-save me-1"></i> Simpan
                </button>
                <a href="{{ route('dashboard.barang-keluars.index') }}" class="btn btn-secondary rounded-pill px-4">
                    <i class="bx bx-arrow-back me-1"></i> Kembali
                </a>
            </div>
        </form>
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
.form-select {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}

.form-control:focus,
.form-select:focus {
    box-shadow: 0 0 0 3px rgba(239,68,68,0.25);
    border-color: #ef4444;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(239,68,68,.35);
}

.btn-secondary {
    background: #64748b;
    color: #fff;
    border: none;
}

.btn-secondary:hover {
    background: #475569;
}
</style>
@endpush
@endsection
