<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerificaUsuario
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario no tiene una sesion activa
        if(!Auth::check()) {
            
            return redirect()->route('login')
            ->with('error', 'Debe iniciar sesión');
        }    

        return $next($request);
    }
}