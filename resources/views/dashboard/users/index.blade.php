@extends('layouts.dashboard')
@section('title','Users Management')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1 text-dark">Users Management</h4>
            <p class="text-muted mb-0">
                Manage users, roles, and permissions
            </p>
        </div>
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bx bx-plus me-1"></i> Add User
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-hover" id="users-table">
                    <thead>
                        <tr>
                            <th class="text-center" width="60">No</th>
                            <th>User</th>
                            <th class="text-center" width="120">Role</th>
                            <th class="text-center" width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $index + 1 }}
                            </td>

                            <!-- User Info -->
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar avatar-sm">
                                        <span class="avatar-initial rounded-circle bg-primary text-white">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">
                                            {{ $user->name }}
                                        </div>
                                        <small class="text-muted">
                                            {{ $user->email }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <!-- Role -->
                            <td class="text-center">
                                @if ($user->role === 'admin')
                                    <span class="badge rounded-pill bg-danger">
                                        Admin
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-primary">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Action -->
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                       class="btn btn-sm btn-warning rounded-circle"
                                       data-bs-toggle="tooltip"
                                       title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    @if(!($loop->first && $user->role === 'admin'))
                                    <a href="{{ route('dashboard.users.destroy', $user->id) }}"
                                       class="btn btn-sm btn-danger rounded-circle"
                                       data-confirm-delete="true"
                                       data-bs-toggle="tooltip"
                                       title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
