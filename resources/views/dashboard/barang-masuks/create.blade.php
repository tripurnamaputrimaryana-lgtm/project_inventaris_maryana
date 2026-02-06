@extends('layouts.dashboard')
@section('title','Tambah Barang Masuk')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('dashboard.barang-masuks.store') }}" method="POST">
            @csrf

            {{-- Barang --}}
            <div class="mb-3">
                <label for="barang_id" class="form-label fw-semibold">Barang</label>
                <select class="form-select" id="barang_id" name="barang_id" required>
                    <option value="" disabled selected>-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                            {{ $barang->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jumlah --}}
            <div class="mb-3">
                <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required min="1">
            </div>

            {{-- Jenis Masuk --}}
            <div class="mb-3">
                <label for="jenis_masuk" class="form-label fw-semibold">Jenis Barang Masuk</label>
                <select class="form-select" id="jenis_masuk" name="jenis_masuk" required>
                    <option value="" disabled selected>-- Pilih Jenis --</option>
                    <option value="dibeli" {{ old('jenis_masuk') == 'dibeli' ? 'selected' : '' }}>Dibeli</option>
                    <option value="hibah" {{ old('jenis_masuk') == 'hibah' ? 'selected' : '' }}>Hibah</option>
                    <option value="retur" {{ old('jenis_masuk') == 'retur' ? 'selected' : '' }}>Retur / Kembali</option>
                </select>
            </div>

            {{-- Tanggal Masuk --}}
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label fw-semibold">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Simpan
                </button>
                <a href="{{ route('dashboard.barang-masuks.index') }}" class="btn btn-secondary btn-lg rounded-pill">
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
