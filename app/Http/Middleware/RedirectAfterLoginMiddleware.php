<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RedirectAfterLoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user();

            // Redirige en fonction du rôle
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}