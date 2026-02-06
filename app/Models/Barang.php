<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori_id',
        'lokasi_id',
        'kondisi',
        'jumlah',
        'satuan',
        'tanggal_beli',
        'harga',
        'deskripsi',
        'foto'
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi ke lokasi
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    // Generate kode barang otomatis
    public static function generateKodeBarang()
    {
        $last = self::latest('id')->first();
        $number = $last ? intval(substr($last->kode_barang, 3)) + 1 : 1;
        return 'BRG' . str_pad($number, 5, '0', STR_PAD_LEFT);
    }

    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
