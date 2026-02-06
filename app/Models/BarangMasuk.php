<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuks';

    protected $fillable = [
        'barang_id',
        'jumlah',
        'jenis_masuk',
        'tanggal_masuk'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
