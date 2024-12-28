<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah terautentikasi
        if (!Auth::check()) {
            // Jika tidak, redirect ke halaman login
            return redirect()->route('login')->with('error', 'You must be logged in to access that page.');
        }

        return $next($request);
    }
}