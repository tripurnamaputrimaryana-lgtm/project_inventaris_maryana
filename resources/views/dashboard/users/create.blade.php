@extends('layouts.dashboard')
@section('title','Create Users Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Create User</h4>
            <p class="text-muted mb-0">
                Add a new user and assign role
            </p>
        </div>
        <a href="{{ route('dashboard.users.index') }}" class="btn btn-outline-primary rounded-pill px-4">
            <i class="bx bx-arrow-back me-1"></i> Back
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

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

                <!-- Action -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('dashboard.users.index') }}"
                       class="btn btn-light rounded-pill px-4">
                        Cancel
                    </a>
                    <button type="submit"
                            class="btn btn-primary rounded-pill px-4">
                        <i class="bx bx-save me-1"></i> Save User
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
