<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutenticarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica se o usuário está autenticado e se administrador é true (passa por todas as rotas que precisam de autenticação)
        if (Auth::check() && Auth::user()->administrador) {
            return $next($request);
        }
        // Se não passar nos requisitos, volta a tela index
        return redirect()->route('index');
    }
}
