<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('NODE_API_URL');
    }

    // Fungsi untuk mendapatkan total pengguna
    public function getTotalUsers()
    {
        try {
            $client = new Client();
            $response = $client->get("{$this->apiUrl}/pengguna");

            // Menyimpan respons dari API dalam bentuk array
            $responseBody = json_decode($response->getBody(), true);

            // Memastikan response API berhasil dan data ada
            if ($response->getStatusCode() == 200 && is_array($responseBody)) {
                return count($responseBody); // Menghitung jumlah data pengguna
            }

            return 0; // Jika tidak ada data atau terjadi kesalahan
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Error fetching total users from Node.js API', ['exception' => $e->getMessage()]);
            return 0;
        }
    }

    // Fungsi untuk menampilkan dashboard
    public function dashboard()
    {
        // Memanggil fungsi untuk mendapatkan jumlah pengguna dari API
        $totalUsers = $this->getTotalUsers();

        // Mengirimkan data ke view
        return view('dashboard.main', compact('totalUsers'));
    }
}
