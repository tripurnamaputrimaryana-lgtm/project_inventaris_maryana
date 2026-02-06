<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Welcome | Sistem Inventaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top left, #dbeafe, #f8fafc);
            overflow: hidden;
        }

        /* Animated grid background */
        .grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(99,102,241,.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99,102,241,.08) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: moveGrid 20s linear infinite;
        }

        @keyframes moveGrid {
            from { background-position: 0 0; }
            to { background-position: 120px 120px; }
        }

        .hero {
            position: relative;
            z-index: 2;
            min-height: 100vh;
        }

        .card-inventaris {
            border-radius: 24px;
            background: linear-gradient(
                145deg,
                rgba(255,255,255,0.85),
                rgba(255,255,255,0.65)
            );
            backdrop-filter: blur(18px);
            box-shadow:
                0 30px 60px rgba(15,23,42,0.08),
                inset 0 1px 0 rgba(255,255,255,0.6);
            animation: reveal 1s ease forwards;
        }

        @keyframes reveal {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .badge-soft {
            background: rgba(79,70,229,0.1);
            color: #4f46e5;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .title {
            font-weight: 700;
            letter-spacing: -0.5px;
            color: #0f172a;
        }

        .desc {
            color: #475569;
            font-size: 0.95rem;
        }

        .btn-main {
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 600;
            background: linear-gradient(135deg, #4f46e5, #38bdf8);
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-main:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(79,70,229,0.35);
        }

        .floating-box {
            position: absolute;
            width: 180px;
            height: 120px;
            border-radius: 16px;
            background: linear-gradient(
                145deg,
                rgba(79,70,229,0.2),
                rgba(56,189,248,0.2)
            );
            filter: blur(2px);
            animation: floatBox 10s ease-in-out infinite;
        }

        .box-1 { top: 15%; left: 10%; }
        .box-2 { bottom: 20%; right: 12%; animation-delay: 3s; }

        @keyframes floatBox {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-35px); }
        }
    </style>
</head>
<body>

<div class="grid-bg"></div>
<div class="floating-box box-1"></div>
<div class="floating-box box-2"></div>

<div class="container hero d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100">
        <div class="col-lg-6 col-md-8">

            <div class="card card-inventaris">
                <div class="card-body p-5 text-center">

                    <span class="badge-soft mb-3 d-inline-block">
                        Sistem Manajemen Inventaris
                    </span>

                    <h1 class="title mb-3">
                        Inventaris yang Tertata.<br>
                        Kontrol yang Lebih Cerdas.
                    </h1>

                    <p class="desc mb-4">
                        Pantau aset, kelola stok, dan dokumentasikan
                        inventaris secara efisien dalam satu sistem terpusat.
                    </p>

                    @auth
                        <a href="{{ route('dashboard.index') }}" class="btn btn-main w-100">
                            Buka Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-main w-100">
                            Masuk ke Sistem
                        </a>
                    @endauth

                </div>
            </div>

            <p class="text-center text-muted small mt-4">
                © {{ date('Y') }} Sistem Inventaris • Secure & Reliable
            </p>

        </div>
    </div>
</div>

</body>
</html>
