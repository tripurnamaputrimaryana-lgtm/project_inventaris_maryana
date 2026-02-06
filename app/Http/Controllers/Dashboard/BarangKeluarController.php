<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangKeluarExport;
use PDF;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->latest()->get();
        return view('dashboard.barang-keluars.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('dashboard.barang-keluars.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'jenis_keluar' => 'required',
            'tanggal_keluar' => 'required|date',
        ]);

        $barangKeluar = BarangKeluar::create($request->all());

        // Kurangi stok barang
        Barang::where('id', $request->barang_id)
            ->decrement('jumlah', $request->jumlah);

        return redirect()->route('dashboard.barang-keluars.index')
                         ->with('success','Barang keluar berhasil ditambahkan');
    }

    // ===== EXPORT EXCEL =====
    public function exportExcel()
    {
        return Excel::download(new BarangKeluarExport, 'barang-keluar.xlsx');
    }

    // ===== EXPORT PDF =====
    public function exportPdf()
    {
        $barangKeluars = BarangKeluar::with('barang')->latest()->get();
        $pdf = PDF::loadView('dashboard.barang-keluars.pdf', compact('barangKeluars'));
        return $pdf->download('barang-keluar.pdf');
    }
}
