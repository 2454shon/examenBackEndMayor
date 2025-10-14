<?php

namespace App\Http\Middleware;

use App\Models\Auth\Usuario;
use App\Models\Rol;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd(Auth::user()->rol_id);
        
        // Verificar si el usuario tiene rol de administrador (1)
        if (Auth::user()->rol_id !== 1) {
            return response()->json([
                'error' => 'Acceso denegado',
                'message' => 'No tienes permisos de administrador para acceder a este recurso'
            ], 403);
        }
        return $next($request);
    }
}
