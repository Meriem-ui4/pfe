<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié et est un administrateur
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Rediriger vers l'accueil si ce n'est pas un administrateur
        return redirect('/')->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
    }
}
