<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';

    protected $fillable = [
        'kode_peminjaman',
        'nama_peminjam',
        'jenis_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'user_id'
    ];

    // RELASI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }
}
