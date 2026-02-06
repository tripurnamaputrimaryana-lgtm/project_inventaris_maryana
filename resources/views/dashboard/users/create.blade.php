@extends('layouts.dashboard')
@section('title','Create Users Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Create User</h4>
            <p class="text-muted mb-0">Add a new user and assign role</p>
        </div>
    </div>

    <!-- Card Form -->
    <div class="card shadow-sm border-0 rounded-3 p-4">
        <form action="{{ route('dashboard.users.store') }}" method="POST">
            @csrf

            <div class="row g-4">

                <!-- Name -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Enter full name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Enter email address">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Role</label>
                    <select name="role"
                            class="form-select @error('role') is-invalid @enderror">
                        <option value="">Select role</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ old('role') === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    </select>
                    @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Create password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 mt-4">
                <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bx bx-arrow-back me-1"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                    <i class="bx bx-save me-1"></i> Save User
                </button>
            </div>

        </form>
    </div>
</div>

{{-- Optional CSS untuk style modern seperti Create Barang --}}
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
