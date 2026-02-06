<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    private function generateKodeBarang()
    {
        $lastBarang = Barang::orderBy('id', 'desc')->first();

        if ($lastBarang && $lastBarang->kode_barang) {
            $lastNumber = (int) substr($lastBarang->kode_barang, -3);
            $number = $lastNumber + 1;
        } else {
            $number = 1;
        }

        return 'BRG-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with(['kategori', 'lokasi'])->get();
        return view('dashboard.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();
        $kodeBarang = $this->generateKodeBarang();

        return view('dashboard.barang.create', compact('kategori', 'lokasi', 'kodeBarang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'lokasi_id'     => 'required|exists:lokasis,id',
            'kondisi'       => 'required|in:baik,rusak_ringan,rusak_berat,hilang',
            'jumlah'        => 'required|integer|min:1',
            'satuan'        => 'required|string|max:50',
            'tanggal_beli'  => 'nullable|date',
            'harga'         => 'nullable|numeric',
        ]);

        Barang::create([
            'kode_barang'   => $this->generateKodeBarang(),
            'nama_barang'   => $request->nama_barang,
            'kategori_id'   => $request->kategori_id,
            'lokasi_id'     => $request->lokasi_id,
            'kondisi'       => $request->kondisi,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'tanggal_beli'  => $request->tanggal_beli,
            'harga'         => $request->harga,
        ]);

        return redirect()
            ->route('dashboard.barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::with(['kategori', 'lokasi'])->findOrFail($id);
        return view('dashboard.barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $lokasi = Lokasi::all();

        return view('dashboard.barang.edit', compact('barang', 'kategori', 'lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'kategori_id'   => 'required|exists:kategoris,id',
            'lokasi_id'     => 'required|exists:lokasis,id',
            'kondisi'       => 'required|in:baik,rusak_ringan,rusak_berat,hilang',
            'jumlah'        => 'required|integer|min:1',
            'satuan'        => 'required|string|max:50',
            'tanggal_beli'  => 'nullable|date',
            'harga'         => 'nullable|numeric',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang'   => $request->nama_barang,
            'kategori_id'   => $request->kategori_id,
            'lokasi_id'     => $request->lokasi_id,
            'kondisi'       => $request->kondisi,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'tanggal_beli'  => $request->tanggal_beli,
            'harga'         => $request->harga,
        ]);

        return redirect()
            ->route('dashboard.barang.index')
            ->with('success', 'Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()
            ->route('dashboard.barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }

    // EXPORT EXCEL
    public function exportExcel()
    {
        return Excel::download(new BarangExport, 'data-barang.xlsx');
    }

    // EXPORT PDF
    public function exportPdf()
    {
        $barangs = Barang::with(['kategori', 'lokasi'])->get();

        $pdf = Pdf::loadView('dashboard.barang.export-pdf', compact('barangs'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('data-barang.pdf');
    }
}
