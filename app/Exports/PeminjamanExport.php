<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Peminjaman::with('user')->get()->map(function($p){
            return [
                'Kode' => $p->kode_peminjaman,
                'Nama' => $p->nama_peminjam,
                'Jenis' => ucfirst($p->jenis_peminjam),
                'Status' => $p->status,
                'User' => $p->user->name,
            ];
        });
    }

    public function headings(): array
    {
        return ['Kode', 'Nama', 'Jenis', 'Status', 'User'];
    }
}
