<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    public $timestamps = false;

    protected $fillable = [
        'peminjaman_id',
        'barang_id',
        'jumlah',
        'kondisi_sebelum',
        'kondisi_sesudah'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
