<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Peminjaman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            // KARTU STATISTIK
            'totalBarang'     => Barang::count(),
            'totalKategori'   => Kategori::count(),
            'totalLokasi'     => Lokasi::count(),
            'totalPeminjaman' => Peminjaman::count(),
            'totalUser'       => User::count(),

            // DATA PEMINJAMAN TERBARU
            'peminjaman' => Peminjaman::with(['barang', 'user'])
                ->latest()
                ->limit(5)
                ->get(),

            // GRAFIK (sementara statis, aman)
            'chartPeminjaman' => [5, 8, 6, 10, 7, 9, 12],
        ]);
    }
}
