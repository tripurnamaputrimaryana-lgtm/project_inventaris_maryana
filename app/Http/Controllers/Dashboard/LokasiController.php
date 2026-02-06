<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Exports\LokasiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('dashboard.lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Lokasi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dashboard.lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('dashboard.lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $lokasi->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('dashboard.lokasi.index')
            ->with('success', 'Lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('dashboard.lokasi.index')
            ->with('success', 'Lokasi berhasil dihapus');
    }

    /**
     * Export data lokasi to Excel.
     */
    public function exportExcel()
    {
        return Excel::download(new LokasiExport, 'lokasi.xlsx');
    }

    /**
     * Export data lokasi to PDF.
     */
    public function exportPdf()
    {
        $lokasis = Lokasi::all();
        $pdf = PDF::loadView('dashboard.lokasi.pdf', compact('lokasis'));
        return $pdf->download('lokasi.pdf');
    }
}
