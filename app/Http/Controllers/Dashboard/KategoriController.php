<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KategoriExport;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::latest()->get();
        return view('dashboard.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kategori::create($request->only('nama', 'deskripsi'));

        return redirect()->route('dashboard.kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori->update($request->only('nama', 'deskripsi'));

        return redirect()->route('dashboard.kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('dashboard.kategori.index')
                         ->with('success', 'Kategori berhasil dihapus');
    }

    // Export Excel
    public function exportExcel()
    {
        return Excel::download(new KategoriExport, 'kategori.xlsx');
    }

    // Export PDF
    public function exportPdf()
    {
        $kategoris = Kategori::all();
        $pdf = Pdf::loadView('dashboard.kategori.pdf', compact('kategoris'));
        return $pdf->download('kategori.pdf');
    }
}
