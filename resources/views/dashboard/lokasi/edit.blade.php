@extends('layouts.dashboard')

@section('title','Edit Lokasi')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Edit Lokasi</h4>
            <p class="text-muted mb-0">
                Perbarui data lokasi
            </p>
        </div>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('dashboard.lokasi.update', $lokasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <!-- Nama Lokasi -->
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Lokasi</label>
                        <input type="text"
                               name="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $lokasi->nama) }}">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi"
                                  rows="3"
                                  class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $lokasi->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- Action -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('dashboard.lokasi.index') }}"
                       class="btn btn-light rounded-pill px-4">
                        Cancel
                    </a>
                    <button type="submit"
                            class="btn btn-primary rounded-pill px-4">
                        <i class="bx bx-save me-1"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
