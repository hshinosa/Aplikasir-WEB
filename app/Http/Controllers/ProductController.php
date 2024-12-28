<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class PenggunaController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        // Mengambil URL API dari file .env
        $this->apiUrl = env('NODE_API_URL');
    }

    public function index()
    {
        try {
            // Mengambil data dari API Node.js
            $response = Http::get($this->apiUrl . '/pengguna');

            // Jika respons berhasil, ambil data JSON, jika tidak, set menjadi array kosong
            $pengguna = $response->successful() ? $response->json() : [];
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, set pengguna sebagai array kosong dan log error-nya
            $pengguna = [];
        }

        // Tentukan jumlah data per halaman
        $perPage = 5;

        // Menggunakan LengthAwarePaginator untuk mem-paginasi data
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentData = array_slice($pengguna, ($currentPage - 1) * $perPage, $perPage);

        // Menambahkan baris kosong jika data kurang dari 5
        while (count($currentData) < $perPage) {
            $currentData[] = null; // Menambahkan elemen kosong
        }

        // Membuat objek paginator
        $paginatedPengguna = new LengthAwarePaginator(
            $currentData,
            count($pengguna),
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        // Kirim data pengguna ke view 'dashboard.userlist'
        return view('dashboard.userlist', compact('paginatedPengguna'));
    }
}
