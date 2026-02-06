<?php

namespace App\Exports;

use App\Models\BarangKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangKeluarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangKeluar::with('barang')
            ->latest()
            ->get()
            ->map(function($item){
                return [
                    'Barang' => $item->barang->nama_barang ?? '-',
                    'Jumlah' => $item->jumlah,
                    'Jenis Keluar' => $item->jenis_keluar,
                    'Tanggal' => $item->tanggal_keluar,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Barang',
            'Jumlah',
            'Jenis Keluar',
            'Tanggal',
        ];
    }
}
