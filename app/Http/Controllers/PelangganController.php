<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;


class PelangganController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        // Mengambil URL API dari file .env
        $this->apiUrl = env('NODE_API_URL');
    }

    // Menampilkan data pelanggan dari API Node.js
    public function index($id)
    {
        try {
            $response = Http::get($this->apiUrl . '/pengguna/' . $id . '/pelanggan');
            $pelangganData = $response->successful() ? $response->json() : [];

            // Check if the data is an array and paginate it
            if (is_array($pelangganData) && count($pelangganData) > 0) {
                // Define the number of items per page
                $perPage = 5;

                // Get the current page from the request
                $currentPage = LengthAwarePaginator::resolveCurrentPage();

                // Slice the array to get the items for the current page
                $currentData = array_slice($pelangganData, ($currentPage - 1) * $perPage, $perPage);

                // Create a LengthAwarePaginator instance
                $paginatedData = new LengthAwarePaginator(
                    $currentData,
                    count($pelangganData),
                    $perPage,
                    $currentPage,
                    ['path' => url()->current()]
                );
            } else {
                // If no data, create an empty paginator
                $paginatedData = new LengthAwarePaginator([], 0, 5, 1, ['path' => url()->current()]);
            }
            return view('dashboard.customeruser', [
                'pelangganData' => $paginatedData,
                'pengguna' => [
                    'id' => $id
                ]
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengambil data pelanggan');
        }
    }

    // Mengupdate data pelanggan
    public function update(Request $request, $id, $customerId)
    {
        // Log input request
        \Log::info('Update Pelanggan Input:', $request->all());

        // Validasi input
        $validated = $request->validate([
            'id_pengguna' => 'required|integer',
            'nama' => 'required|string|max:255',
            'nomor_telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        try {
            // Log request ke API
            \Log::info("Sending PUT request to API: {$this->apiUrl}/pelanggan/{$customerId}", $validated);

            // Kirim request ke API
            $response = Http::put($this->apiUrl . "/pelanggan/{$customerId}", $validated);

            // Log respons dari API
            \Log::info('API Response:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            // Cek apakah respons berhasil
            if ($response->successful()) {
                return redirect()->route('dashboard.customeruser', ['id' => $id])
                    ->with('success', 'Pelanggan berhasil diperbarui.');
            } else {
                \Log::error('API Error:', ['body' => $response->body()]);
                return back()->with('error', 'Gagal memperbarui data pelanggan.');
            }
        } catch (\Exception $e) {
            // Log error jika terjadi exception
            \Log::error('Update Pelanggan Exception:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    // Menghapus data pelanggan
    public function destroy($id)
    {
        try {
            // Menghapus data pelanggan melalui API
            $response = Http::delete($this->apiUrl . '/pelanggan/' . $id);

            // Jika respons berhasil, alihkan ke halaman daftar pelanggan
            if ($response->successful()) {
                return redirect()->route('dashboard.customeruser')->with('success', 'Pelanggan berhasil dihapus.');
            } else {
                return back()->with('error', 'Gagal menghapus data pelanggan.');
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tampilkan pesan error
            return back()->with('error', 'Terjadi kesalahan saat menghapus data pelanggan.');
        }
    }
}