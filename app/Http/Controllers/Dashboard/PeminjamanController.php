<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamen = Peminjaman::with('user')->latest()->get();
        return view('dashboard.peminjaman.index', compact('peminjamen'));
    }

    public function create()
    {
        $last = Peminjaman::where('kode_peminjaman', 'like', 'PJM-%')
            ->orderBy('id', 'desc')
            ->first();

        $number = $last
            ? (int) str_replace('PJM-', '', $last->kode_peminjaman) + 1
            : 1;

        $kode = 'PJM-' . str_pad($number, 3, '0', STR_PAD_LEFT);

        $barangs = Barang::all();

        return view('dashboard.peminjaman.create', compact('kode', 'barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'jenis_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
        ]);

        $last = Peminjaman::where('kode_peminjaman', 'like', 'PJM-%')
            ->orderBy('id', 'desc')
            ->first();

        $number = $last
            ? (int) str_replace('PJM-', '', $last->kode_peminjaman) + 1
            : 1;

        $kode = 'PJM-' . str_pad($number, 3, '0', STR_PAD_LEFT);

        Peminjaman::create([
            'kode_peminjaman' => $kode,
            'nama_peminjam' => $request->nama_peminjam,
            'jenis_peminjam' => $request->jenis_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'dipinjam',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard.peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load('details.barang', 'user');
        return view('dashboard.peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('dashboard.peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update($request->only([
            'nama_peminjam',
            'jenis_peminjam',
            'tanggal_kembali',
            'status'
        ]));

        return redirect()->route('dashboard.peminjaman.index')
            ->with('success', 'Data diperbarui');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return back()->with('success', 'Data dihapus');
    }

     public function exportExcel()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

    public function exportPdf()
    {
        $peminjamen = Peminjaman::with('user')->latest()->get();
        $pdf = Pdf::loadView('dashboard.peminjaman.pdf', compact('peminjamen'));
        return $pdf->download('peminjaman.pdf');
    }
}
