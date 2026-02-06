@extends('layouts.dashboard')
@section('title','Data Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h4 class="fw-bold mb-0">Data Peminjaman</h4>

        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard.peminjaman.export.excel') }}" class="btn btn-success rounded-pill px-4">
                <i class="bx bx-file me-1"></i> Excel
            </a>
            <a href="{{ route('dashboard.peminjaman.export.pdf') }}" class="btn btn-danger rounded-pill px-4">
                <i class="bx bx-file me-1"></i> PDF
            </a>

             <a href="{{ route('dashboard.peminjaman.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bx bx-plus me-1"></i> Tambah Peminjaman
            </a>
        </div>
    </div>

    <!-- Card Table -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>User</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjamen as $p)
                        <tr class="table-row-hover">
                            <td>{{ $p->kode_peminjaman }}</td>
                            <td>{{ $p->nama_peminjam }}</td>
                            <td>{{ ucfirst($p->jenis_peminjam) }}</td>
                            <td>
                                <span class="badge bg-info px-3 py-2 rounded-pill text-white">
                                    {{ $p->status }}
                                </span>
                            </td>
                            <td>{{ $p->user->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('dashboard.peminjaman.show',$p->id) }}" class="btn btn-info btn-sm rounded-pill px-3">
                                    <i class="bx bx-show"></i>
                                </a>

                                <a href="{{ route('dashboard.peminjaman.edit',$p->id) }}" class="btn btn-warning btn-sm rounded-pill px-3">
                                    <i class="bx bx-edit"></i>
                                </a>

                                <form action="{{ route('dashboard.peminjaman.destroy',$p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm rounded-pill px-3" onclick="return confirm('Hapus data?')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada data peminjaman
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@push('styles')
<style>
.card {
    border-radius: 18px;
    box-shadow: 0 20px 40px rgba(15,23,42,0.06);
}

.table thead th {
    border-bottom: 2px solid #e2e8f0;
}

.table tbody tr.table-row-hover {
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.table tbody tr.table-row-hover:hover {
    background-color: rgba(59,130,246,0.05);
    transform: translateX(5px); /* efek geser saat hover */
}

.badge {
    font-size: 0.85rem;
    font-weight: 500;
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

.btn-success {
    background: linear-gradient(135deg, #22c55e, #4ade80);
    border: none;
    transition: all 0.3s ease;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(34,197,94,.35);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(239,68,68,.35);
}

.btn-warning {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    border: none;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(251,191,36,.35);
}

.btn-info {
    background: linear-gradient(135deg, #0ea5e9, #06b6d4);
    border: none;
    transition: all 0.3s ease;
}

.btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(14,165,233,.35);
}
</style>
@endpush
@endsection
