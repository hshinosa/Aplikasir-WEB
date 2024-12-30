<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
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
            $response = Http::get($this->apiUrl . '/produk');
            $productData = $response->successful() ? $response->json() : [];

            // Paginate data
            $perPage = 5;
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $currentData = array_slice($productData, ($currentPage - 1) * $perPage, $perPage);

            $paginatedData = new LengthAwarePaginator(
                $currentData,
                count($productData),
                $perPage,
                $currentPage,
                ['path' => url()->current()]
            );

            return view('dashboard.productall', [
                'products' => $paginatedData,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengambil data produk.');
        }
    }

    public function showByUser ($userId)
    {
        try {
            // Ambil data produk dari API yang difilter berdasarkan ID pengguna
            $response = Http::get($this->apiUrl . "/produk?user_id=$userId");

            // Jika respons berhasil, ambil data JSON
            $products = $response->successful() ? $response->json() : [];

            // Ambil data pengguna berdasarkan ID
            $userResponse = Http::get($this->apiUrl . "/pengguna/$userId");
            $pengguna = $userResponse->successful() ? $userResponse->json() : null;

            if ($pengguna === null) {
                abort(404, 'Pengguna tidak ditemukan');
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, set products sebagai array kosong
            $products = [];
            $pengguna = null;
        }

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentData = array_slice($products, ($currentPage - 1) * $perPage, $perPage);

        $paginatedProducts = new LengthAwarePaginator(
            $currentData,
            count($products),
            $perPage,
            $currentPage,
            ['path' => url()->current()]
        );

        return view('dashboard.productuser', [
            'products' => $paginatedProducts,
            'pengguna' => $pengguna // Pass the pengguna variable to the view
        ]);
    }

    public function update(Request $request, $id, $productId)
    {
        \Log::info("Update Product Input:", $request->all());

        $validated = $request->validate([
            'id_pengguna' => 'required|integer',
            'nama_produk' => 'required|string|max:255',
            'kode_produk' => 'required|string|max:50',
            'jumlah_produk' => 'required|integer|min:0',
            'harga_modal' => 'nullable|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        try {
            \Log::info("Sending PUT request to API: {$this->apiUrl}/produk/{$productId}", $validated);

            $response = Http::put($this->apiUrl . "/produk/{$productId}", $validated);

            \Log::info('API Response:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            if ($response->successful()) {
                return redirect()->route('dashboard.productuser', ['id' => $id])
                    ->with('success', 'Produk berhasil diperbarui.');
            } else {
                \Log::error('API Error:', ['body' => $response->body()]);
                return back()->with('error', 'Gagal memperbarui data produk.');
            }
        } catch (\Exception $e) {
            \Log::error('Update Produk Exception:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id, $productId)
    {
        try {
            $response = Http::delete($this->apiUrl . "/produk/{$productId}");

            if ($response->successful()) {
                return redirect()->route('dashboard.productuser', ['id' => $id])
                    ->with('success', 'Produk berhasil dihapus.');
            } else {
                return back()->with('error', 'Gagal menghapus data produk.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data produk.');
        }
    }
}
