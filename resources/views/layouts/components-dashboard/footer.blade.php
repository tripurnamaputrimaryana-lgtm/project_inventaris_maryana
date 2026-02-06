<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-3 flex-md-row flex-column">

        {{-- Kiri --}}
        <div class="mb-2 mb-md-0 text-muted">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            <strong>{{ config('app.name', 'Sistem Inventaris') }}</strong>
        </div>

        {{-- Kanan --}}
        <div class="d-flex flex-wrap align-items-center">
            <a href="{{ route('dashboard.index') }}" class="footer-link me-4">
                Dashboard
            </a>

            <a href="{{ route('dashboard.barang.index') }}" class="footer-link me-4">
                Barang
            </a>

            <a href="{{ route('dashboard.kategori.index') }}" class="footer-link me-4">
                Kategori
            </a>

            {{-- aktifkan kalau route laporan sudah ada --}}
            {{--
            <a href="{{ route('dashboard.laporan.index') }}" class="footer-link me-4">
                Laporan
            </a>
            --}}

            <span class="text-muted">
                Made with ❤️
            </span>
        </div>

    </div>
</footer>
