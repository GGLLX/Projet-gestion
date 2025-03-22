<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et a le rôle 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Autorise la requête à passer
        }

        // Si l'utilisateur n'est pas admin, redirige vers une page avec un message d'erreur
        return redirect('/dashboard')->with('error', 'Accès refusé. Vous n\'avez pas les droits nécessaires.');
    }
}