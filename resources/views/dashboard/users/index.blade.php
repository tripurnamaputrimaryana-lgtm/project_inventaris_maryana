@extends('layouts.dashboard')
@section('title','Users Management')

@section('content')
<div class="container-xxl container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h4 class="fw-bold mb-0">Users Management</h4>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('dashboard.users.export.excel') }}" class="btn btn-success rounded-pill px-4">
                <i class="bx bx-file me-1"></i> Excel
            </a>
            <a href="{{ route('dashboard.users.export.pdf') }}" class="btn btn-danger rounded-pill px-4">
                <i class="bx bx-file me-1"></i> PDF
            </a>
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bx bx-plus me-1"></i> Add User
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
                            <th class="text-center" style="width:60px">No</th>
                            <th>User</th>
                            <th class="text-center">Role</th>
                            <th class="text-center" style="width:120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                        <tr class="table-row-hover">
                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-initial rounded-circle bg-primary text-white">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ $user->name }}</div>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if($user->role === 'admin')
                                    <span class="badge bg-danger px-3 py-2 rounded-pill text-white">Admin</span>
                                @else
                                    <span class="badge bg-primary px-3 py-2 rounded-pill text-white">{{ ucfirst($user->role) }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}" 
                                       class="btn btn-sm btn-warning rounded-circle hover-move" 
                                       data-bs-toggle="tooltip" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    @if(!($loop->first && $user->role === 'admin'))
                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-circle hover-move">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada user</td>
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
    background-color: rgba(79,70,229,0.05);
    transform: translateX(5px);
}

.badge {
    font-size: 0.85rem;
    font-weight: 500;
}

.btn-primary, .btn-success, .btn-danger, .btn-warning {
    border-radius: 50px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5, #38bdf8);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,.35);
}

.btn-success {
    background: linear-gradient(135deg, #22c55e, #4ade80);
    border: none;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(34,197,94,.35);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
    border: none;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(239,68,68,.35);
}

.btn-warning {
    background: linear-gradient(135deg, #facc15, #fbbf24);
    border: none;
    color: #fff;
}

.btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(250,204,21,.35);
}

.hover-move {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.hover-move:hover {
    transform: translateY(-2px);
}
</style>
@endpush

@endsection
