<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- Logo -->
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo"></span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">INVENTARIS</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Inventaris</span>
        </li>

        <!-- Data Barang -->
        <li class="menu-item {{ request()->routeIs('dashboard.barang.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.barang.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Data Barang</div>
            </a>
        </li>

        <!-- Barang Masuk -->
        <li class="menu-item {{ request()->routeIs('dashboard.barang-masuks.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.barang-masuks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-in"></i>
                <div>Barang Masuk</div>
            </a>
        </li>

        <!-- Barang Keluar -->
        <li class="menu-item {{ request()->routeIs('dashboard.barang-keluars.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.barang-keluars.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div>Barang Keluar</div>
            </a>
        </li>

        <!-- Kategori -->
        <li class="menu-item {{ request()->routeIs('dashboard.kategori.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.kategori.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div>Kategori Barang</div>
            </a>
        </li>

        <!-- Lokasi -->
        <li class="menu-item {{ request()->routeIs('dashboard.lokasi.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.lokasi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div>Lokasi Penyimpanan</div>
            </a>
        </li>

        <!-- Peminjaman -->
        <li class="menu-item {{ request()->routeIs('dashboard.peminjaman.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.peminjaman.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div>Peminjaman Barang</div>
            </a>
        </li>

        @if (Auth::user()->role === 'admin')
        <!-- Administrasi -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Administrasi</span>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>Manajemen Pengguna</div>
            </a>
        </li>
        @endif
    </ul>
</aside>
