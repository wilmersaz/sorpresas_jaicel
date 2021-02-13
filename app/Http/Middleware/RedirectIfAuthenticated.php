<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Session;
use Flash;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && Auth::user()->estado == 1) {
            return redirect('/home');
        }elseif (Auth::check() && Auth::user()->estado == 0) {
            Auth::guard()->logout();

            return redirect('/login')->with('mensaje', '¡¡Usuario inactivo!!, por favor comuniquese con el administrador de la plataforma.');
        }
        return $next($request);
    }
}