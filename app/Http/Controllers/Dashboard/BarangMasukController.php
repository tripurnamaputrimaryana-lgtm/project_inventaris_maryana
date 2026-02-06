<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukExport;
use PDF;

class BarangMasukController extends Controller
{
    // Tampilkan semua Barang Masuk
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang')->latest()->get();
        return view('dashboard.barang-masuks.index', compact('barangMasuks'));
    }

    // Form Tambah Barang Masuk
    public function create()
    {
        $barangs = Barang::all();
        return view('dashboard.barang-masuks.create', compact('barangs'));
    }

    // Simpan Barang Masuk
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'jenis_masuk' => 'required|string',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'jenis_masuk' => $request->jenis_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Tambahkan stok barang otomatis
        Barang::where('id', $request->barang_id)
            ->increment('jumlah', $request->jumlah);

        return redirect()
            ->route('dashboard.barang-masuks.index')
            ->with('success', 'Barang masuk berhasil ditambahkan');
    }

    // Export Excel
    public function exportExcel()
    {
        return Excel::download(new BarangMasukExport, 'barang-masuk.xlsx');
    }

    // Export PDF
    public function exportPdf()
    {
        $barangMasuks = BarangMasuk::with('barang')->latest()->get();
        $pdf = PDF::loadView('dashboard.barang-masuks.pdf', compact('barangMasuks'));
        return $pdf->download('barang-masuk.pdf');
    }

}
