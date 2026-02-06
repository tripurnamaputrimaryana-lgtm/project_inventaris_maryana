@extends('layouts.app')

@section('title','Sistem Inventaris')

@section('content')

{{-- HERO --}}
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h1 class="fw-bold mb-3 animate-up">
            Sistem Manajemen Inventaris 📦
        </h1>
        <p class="lead opacity-75 animate-up delay-1">
            Kelola barang, kategori, dan peminjaman dengan mudah dan rapi
        </p>
        <div class="mt-4 animate-up delay-2">
            <a href="{{ route('login') }}" class="btn btn-light btn-lg me-2">
                Masuk
            </a>
            <a href="{{ route('dashboard.index') }}" class="btn btn-outline-light btn-lg">
                Dashboard
            </a>
        </div>
    </div>
</section>

{{-- FITUR --}}
<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">

            <div class="col-md-4">
                <div class="card h-100 feature-card">
                    <div class="card-body">
                        <i class="bx bx-box fs-1 text-primary mb-3"></i>
                        <h5>Manajemen Barang</h5>
                        <p class="text-muted">
                            Data barang tersimpan rapi dan mudah dikelola.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 feature-card">
                    <div class="card-body">
                        <i class="bx bx-category fs-1 text-success mb-3"></i>
                        <h5>Kategori & Lokasi</h5>
                        <p class="text-muted">
                            Kelompokkan barang berdasarkan kategori dan lokasi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 feature-card">
                    <div class="card-body">
                        <i class="bx bx-transfer fs-1 text-warning mb-3"></i>
                        <h5>Peminjaman</h5>
                        <p class="text-muted">
                            Pantau barang masuk dan keluar secara real-time.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-3 col-6 mb-4">
                <h2 class="fw-bold text-primary counter" data-count="120">0</h2>
                <p>Barang Terdata</p>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <h2 class="fw-bold text-success counter" data-count="8">0</h2>
                <p>Kategori</p>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <h2 class="fw-bold text-warning counter" data-count="25">0</h2>
                <p>Peminjaman</p>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <h2 class="fw-bold text-info counter" data-count="5">0</h2>
                <p>Lokasi</p>
            </div>

        </div>
    </div>
</section>

{{-- FOOTER --}}
<section class="py-4 bg-dark text-white text-center">
    <small>
        © {{ date('Y') }} Sistem Inventaris — All rights reserved
    </small>
</section>

{{-- STYLE --}}
<style>
.animate-up {
    animation: fadeUp .8s ease forwards;
    opacity: 0;
}
.delay-1 { animation-delay: .3s }
.delay-2 { animation-delay: .6s }

@keyframes fadeUp {
    from { transform: translateY(30px); opacity: 0 }
    to { transform: translateY(0); opacity: 1 }
}

.feature-card {
    transition: transform .3s ease, box-shadow .3s ease;
}
.feature-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0,0,0,.15);
}
</style>

{{-- COUNTER --}}
<script>
document.querySelectorAll('.counter').forEach(counter => {
    const update = () => {
        const target = +counter.getAttribute('data-count');
        const current = +counter.innerText;
        const inc = Math.ceil(target / 60);

        if (current < target) {
            counter.innerText = current + inc;
            setTimeout(update, 30);
        } else {
            counter.innerText = target;
        }
    };
    update();
});
</script>

@endsection
