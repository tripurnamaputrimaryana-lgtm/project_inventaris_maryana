@extends('layouts.dashboard')
@section('title','Edit Barang Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Edit Barang</h4>
            <p class="text-muted mb-0">
                Update barang information and inventory details
            </p>
        </div>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('dashboard.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">

                <!-- Kode Barang -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kode Barang</label>
                    <input type="text" name="kode_barang"
                           class="form-control @error('kode_barang') is-invalid @enderror"
                           value="{{ old('kode_barang', $barang->kode_barang) }}"
                           placeholder="Masukkan kode barang">
                    @error('kode_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nama Barang -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" name="nama_barang"
                           class="form-control @error('nama_barang') is-invalid @enderror"
                           value="{{ old('nama_barang', $barang->nama_barang) }}"
                           placeholder="Masukkan nama barang">
                    @error('nama_barang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                        <option value="">Pilih kategori</option>
                        @foreach($kategori as $k)
                            <option value="{{ $k->id }}" {{ old('kategori_id', $barang->kategori_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Lokasi</label>
                    <select name="lokasi_id" class="form-select @error('lokasi_id') is-invalid @enderror">
                        <option value="">Pilih lokasi</option>
                        @foreach($lokasi as $l)
                            <option value="{{ $l->id }}" {{ old('lokasi_id', $barang->lokasi_id) == $l->id ? 'selected' : '' }}>
                                {{ $l->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('lokasi_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kondisi -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kondisi</label>
                    <select name="kondisi" class="form-select @error('kondisi') is-invalid @enderror">
                        <option value="">Pilih kondisi</option>
                        <option value="baik" {{ old('kondisi', $barang->kondisi) == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak_ringan" {{ old('kondisi', $barang->kondisi) == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="rusak_berat" {{ old('kondisi', $barang->kondisi) == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                        <option value="hilang" {{ old('kondisi', $barang->kondisi) == 'hilang' ? 'selected' : '' }}>Hilang</option>
                    </select>
                    @error('kondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah</label>
                    <input type="number" name="jumlah"
                           class="form-control @error('jumlah') is-invalid @enderror"
                           value="{{ old('jumlah', $barang->jumlah) }}">
                    @error('jumlah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Satuan -->
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Satuan</label>
                    <input type="text" name="satuan"
                           class="form-control @error('satuan') is-invalid @enderror"
                           value="{{ old('satuan', $barang->satuan) }}">
                    @error('satuan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Beli -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Beli</label>
                    <input type="date" name="tanggal_beli"
                           class="form-control @error('tanggal_beli') is-invalid @enderror"
                           value="{{ old('tanggal_beli', $barang->tanggal_beli) }}">
                    @error('tanggal_beli')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Harga</label>
                    <input type="number" step="0.01" name="harga"
                           class="form-control @error('harga') is-invalid @enderror"
                           value="{{ old('harga', $barang->harga) }}">
                    @error('harga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              rows="3">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Foto</label>
                    <input type="file" name="foto"
                           class="form-control @error('foto') is-invalid @enderror">
                    @if($barang->foto)
                        <small class="text-muted">Foto saat ini: {{ $barang->foto }}</small>
                    @endif
                    @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Action -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('dashboard.barang.index') }}"
                   class="btn btn-light rounded-pill px-4">
                    Cancel
                </a>
                <button type="submit"
                        class="btn btn-primary rounded-pill px-4">
                    <i class="bx bx-save me-1"></i> Save Changes
                </button>
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
.form-select,
textarea.form-control {
    border-radius: 12px;
    padding: 10px 12px;
    transition: all 0.25s ease;
}

.form-control:focus,
.form-select:focus,
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

.btn-light {
    background: #f1f5f9;
    border: none;
}

.btn-light:hover {
    background: #e2e8f0;
}
</style>
@endpush
@endsection
