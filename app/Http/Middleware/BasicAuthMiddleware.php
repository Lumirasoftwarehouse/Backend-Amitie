<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class BasicAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Mengecek apakah ada header Authorization
        if ($request->hasHeader('Authorization')) {
            $authHeader = $request->header('Authorization');

            // Decode base64 pada header Authorization
            $credentials = explode(':', base64_decode(substr($authHeader, 6)));

            // Pastikan bahwa credentials terdiri dari username dan password
            if (count($credentials) === 2) {
                [$username, $password] = $credentials;

                // Cek apakah username dan password sesuai
                if ($username === 'sensor' && $password === 'sensor') {
                    // Jika autentikasi berhasil, lanjutkan ke request berikutnya
                    return $next($request);
                }
            }
        }

        // Jika autentikasi gagal
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
