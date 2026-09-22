<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah role user saat ini diizinkan masuk
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses, arahkan kembali dengan pesan error
        return redirect('/')->with('error', 'Anda tidak memiliki hak akses ke halaman ini.');
    }
}