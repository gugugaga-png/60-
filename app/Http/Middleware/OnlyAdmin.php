<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // 1. Izinkan akses jika URL adalah admin/login (guest/belum login)
    if ($request->is('admin/login')) {
        return $next($request);
    }

    // 2. Cek apakah user sudah login DAN role-nya admin
    if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
    }

    // 3. Jika tidak memenuhi syarat, batalkan akses
    abort(403, 'Unauthorized');
}
}
