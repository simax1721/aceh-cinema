<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DetectDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = strtolower($request->header('User-Agent'));

        // Deteksi perangkat mobile
        $isMobile = preg_match('/mobile|android|iphone|ipad|ipod|blackberry|opera mini|windows phone/i', $agent);

        // Simpan flag di session agar bisa diakses di controller/view jika perlu
        session(['isMobile' => $isMobile]);

        // Cegah redirect loop
        if ($isMobile && !$request->is('mobile-view*')) {
            return redirect('/mobile-view');
        }

        if (!$isMobile && $request->is('mobile-view*')) {
            return redirect('/');
        }

        return $next($request);
    }
}
