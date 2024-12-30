<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';  // Nama tabel
    protected $fillable = [
        'nama', 'username', 'email', 'password', 'role'
    ];

    // Relasi dengan model DetailPengguna
    public function detail()
    {
        return $this->hasOne(DetailPengguna::class, 'pengguna_id');
    }
}
