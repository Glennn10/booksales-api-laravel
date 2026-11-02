<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->role !== 'customer') {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak. Hanya customer yang dapat mengakses.',
            ], 403);
        }

        return $next($request);
    }
}