<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan'; // Tabel yang digunakan

    protected $fillable = [
        'id_pengguna',
        'nama',
        'nomor_telepon',
        'email'
    ];

    // Menambahkan relasi dengan model Pengguna (jika diperlukan)
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
