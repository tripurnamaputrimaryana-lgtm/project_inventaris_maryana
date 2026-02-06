@extends('layouts.dashboard')
@section('title','Pengembalian Barang')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card shadow-sm border-0 p-4">

        <form action="{{ route('dashboard.peminjaman.update',$peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Kode & Tanggal Kembali --}}
            <div class="row mb-3 g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kode Peminjaman</label>
                    <input type="text" class="form-control bg-light" value="{{ $peminjaman->kode_peminjaman }}" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}">
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" required>
                    <option value="dipinjam" {{ $peminjaman->status=='dipinjam'?'selected':'' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $peminjaman->status=='dikembalikan'?'selected':'' }}>Dikembalikan</option>
                    <option value="terlambat" {{ $peminjaman->status=='terlambat'?'selected':'' }}>Terlambat</option>
                </select>
            </div>

            <hr>
            <h6 class="fw-semibold mb-3">Kondisi Barang Setelah Dikembalikan</h6>

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
                        @foreach($peminjaman->details as $d)
                        <tr>
                            <td>{{ $d->barang->nama_barang }}</td>
                            <td class="text-center">{{ $d->jumlah }}</td>
                            <td>{{ $d->kondisi_sebelum }}</td>
                            <td>
                                <input type="text" name="kondisi_sesudah[{{ $d->id }}]" class="form-control" value="{{ $d->kondisi_sesudah }}">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-success btn-lg rounded-pill">
                    <i class="bx bx-check me-1"></i> Simpan Pengembalian
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

.btn-success {
    background: linear-gradient(135deg, #22c55e, #4ade80);
    border: none;
    transition: all 0.3s ease;
}
.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(34,197,94,.35);
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
