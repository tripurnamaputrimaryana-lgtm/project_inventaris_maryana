<?php

namespace App\Exports;

use App\Models\Lokasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LokasiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Lokasi::select('id','nama','deskripsi')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nama Lokasi', 'Deskripsi'];
    }
}
