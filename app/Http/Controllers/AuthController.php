<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        // URL API Node.js Anda
        $this->apiUrl = env('NODE_API_URL');
    }

    // Fungsi Login
    public function login(Request $request)
    {
        // Tambahkan default value untuk role jika tidak tersedia
        $request->merge(['role' => $request->role ?? 'admin']);
        
        // Validasi input
        try {
            $validatedData = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'role' => 'required|string|in:admin,pengguna',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 400);
        }

        try {
            // Buat client Guzzle untuk mengirim permintaan ke Node.js API
            $client = new Client();
        
            $response = $client->post("{$this->apiUrl}/auth/login", [
                'json' => [
                    'username' => $request->username,
                    'password' => $request->password,
                    'role' => $request->role,
                ]
            ]);

            return redirect()->route('dashboard');
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Log error yang terjadi saat mencoba menghubungi Node.js API
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse()->getBody()->getContents();
                Log::error('Node.js API returned error response', ['errorResponse' => $errorResponse]);
                return response()->json(['message' => 'Error from Node.js API', 'error' => $errorResponse], $e->getCode());
            }

            Log::error('Error connecting to Node.js API', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Error connecting to Node.js API', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Log error lainnya
            Log::error('Unexpected error during login', ['exception' => $e->getMessage()]);
            return response()->json(['message' => 'Internal server error', 'error' => $e->getMessage()], 500);
        }
    }

}
