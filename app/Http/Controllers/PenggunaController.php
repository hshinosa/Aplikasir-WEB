<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Pengguna;

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


    public function show($id)
    {
        try {
            // Mengambil data pengguna berdasarkan ID dari API Node.js
            $response = Http::get($this->apiUrl . '/pengguna/' . $id);

            // Jika respons berhasil, ambil data JSON, jika tidak, set menjadi null
            $pengguna = $response->successful() ? $response->json() : null;

            if ($pengguna === null) {
                // Jika pengguna tidak ditemukan, tampilkan halaman 404
                abort(404, 'Pengguna tidak ditemukan');
            }

        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi error pada API
            return redirect()->route('dashboard.pengguna')->with('error', 'Gagal mengambil data pengguna');
        }

        // Kirim data pengguna ke view 'dashboard.userdetail'
        return view('dashboard.userdetail', compact('pengguna'));
    }
}
