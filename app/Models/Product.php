<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'products';

    // Tentukan kolom mana yang dapat diisi massal
    protected $fillable = [
        'nama_produk',
        'kode_produk',
        'gambar_produk',
        'jumlah_produk',
        'harga_modal',
        'harga_jual',
        'id_pengguna',
    ];

    // Tentukan kolom yang akan di-cast menjadi tipe data tertentu
    protected $casts = [
        'harga_modal' => 'float',
        'harga_jual' => 'float',
        'jumlah_produk' => 'integer',
    ];

    // // Relasi dengan tabel Pengguna
    // public function pengguna()
    // {
    //     return $this->belongsTo(Pengguna::class, 'id_pengguna');
    // }
}
