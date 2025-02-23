<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfsAdmins
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Verifica se o usuário é um adm
        if (Auth::user()->isAdm()) {
            // Se for um adm, ele vai continuar a requisição
            return next($request);
        }

        // Se não for um adm, ele vai redirecionar para a rota home (dashboard)
        return redirect()->route('home');
    }
}
