<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;

// use PHPOpenSourceSaver\JWTAuth\JWTAuth;

class JWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            FacadesJWTAuth::parseToken()->authenticate();
            return $next($request);
        } catch (Exception $e) {
            throw new HttpException(401, $e->getMessage());
        }
    }
}
