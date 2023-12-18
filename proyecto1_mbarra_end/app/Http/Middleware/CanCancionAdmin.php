<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CanCancionAdmin
{
    public function handle($request, Closure $next)
    {
        // Verificar si el usuario está autenticado y su correo es 'admin@gmail.com'
        if (Auth::check() && Auth::user()->email == 'admin@gmail.com') {
            return $next($request);
        }

        // Si no cumple con la condición, redirigir o realizar alguna acción
        return redirect()->route('home')->with('error', 'No tienes permisos para acceder a esta área.');
    }
}