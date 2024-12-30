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

        // Filter hanya untuk pengguna dengan role "pengguna"
        $filteredPengguna = array_filter($pengguna, function ($user) {
            return isset($user['role']) && $user['role'] === 'pengguna';
        });

        // Tentukan jumlah data per halaman
        $perPage = 5;

        // Menggunakan LengthAwarePaginator untuk mem-paginasi data
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentData = array_slice($filteredPengguna, ($currentPage - 1) * $perPage, $perPage);

        // Membuat objek paginator
        $paginatedPengguna = new LengthAwarePaginator(
            $currentData,
            count($filteredPengguna),
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

    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'nullable|string|min:8',
        'email' => 'required|email|max:255',
        'nomor_telepon' => 'nullable|string|max:20',
        'nama_toko' => 'nullable|string|max:255',
        'alamat_toko' => 'nullable|string|max:255',
        'role' => 'required|string|in:pengguna,admin'
    ]);

    try {
        \Log::info("[DEBUG] Updating user ID: {$id}");
        \Log::info("[DEBUG] Validated data: ", $validated);

        $data = $validated;

        // Jika password tidak diubah, hapus dari data yang dikirim
        if (empty($request->password)) {
            unset($data['password']);
        }

        // Kirim permintaan ke API
        \Log::info("[DEBUG] Sending PUT request to API with data: ", $data);
        $response = Http::put($this->apiUrl . '/pengguna/' . $id, $data);

        if ($response->successful()) {
            \Log::info("[DEBUG] API response: ", $response->json());
            return redirect()->route('dashboard.pengguna')->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            \Log::error("[ERROR] API response error: ", $response->json());
            return back()->with('error', 'Gagal memperbarui data pengguna.');
        }
    } catch (\Exception $e) {
        \Log::error("[ERROR] Exception occurred while updating user ID: {$id}. Message: {$e->getMessage()}");
        return back()->with('error', 'Terjadi kesalahan saat memperbarui data pengguna: ' . $e->getMessage());
    }
}

    public function destroy($id)
    {
        try {
            // Logika hapus pengguna
            $response = Http::delete($this->apiUrl . '/pengguna/' . $id);
            if ($response->successful()) {
                return redirect()->route('dashboard.pengguna')->with('success', 'Pengguna berhasil dihapus.');
            } else {
                return back()->with('error', 'Gagal menghapus pengguna.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus pengguna.');
        }
    }


    public function showProducts($id)
    {
        try {
            // Memanggil API untuk mendapatkan data produk berdasarkan ID pengguna
            $response = Http::get($this->apiUrl . '/pengguna/' . $id . '/produk');
            $produk = $response->successful() ? $response->json() : [];
        } catch (\Exception $e) {
            // Tangani kesalahan jika gagal memanggil API
            return redirect()->route('dashboard.pengguna')->with('error', 'Gagal mengambil data produk');
        }

        // Kirim data produk ke view
        return view('dashboard.productuser', compact('produk'));
    }

    public function showCustomer($id)
    {
        try {
            // Memanggil API untuk mengambil data pelanggan berdasarkan ID pengguna
            $response = Http::get($this->apiUrl . '/pengguna/' . $id . '/pelanggan');
            $pelanggan = $response->successful() ? $response->json() : [];

            if (empty($pelanggan)) {
                // Jika data pelanggan tidak ditemukan, tampilkan halaman 404
                abort(404, 'Pelanggan tidak ditemukan');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan jika gagal mengambil data pelanggan
            return redirect()->route('dashboard.pengguna')->with('error', 'Gagal mengambil data pelanggan');
        }

        // Kirim data pelanggan ke view 'dashboard.userdetail'
        return view('dashboard.userdetail', compact('pelanggan'));
    }

}
