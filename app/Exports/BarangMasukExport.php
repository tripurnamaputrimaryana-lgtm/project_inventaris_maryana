<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangMasukExport implements FromCollection, WithHeadings
{
    // Ambil data dari model
    public function collection()
    {
        return BarangMasuk::with('barang')->get()->map(function($item){
            return [
                'Kode Barang'   => $item->barang->kode_barang ?? '-',
                'Nama Barang'   => $item->barang->nama_barang ?? '-',
                'Jumlah'        => $item->jumlah,
                'Jenis Masuk'   => $item->jenis_masuk,
                'Tanggal Masuk' => $item->tanggal_masuk,
            ];
        });
    }

    // Tambahkan header kolom
    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Jenis Masuk',
            'Tanggal Masuk',
        ];
    }
}
