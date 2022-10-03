<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (!(auth()->check())) {
            return redirect('/login')->with('fail', 'Kontaktirajte bibliotekara vase skole');
        }
        if (!(auth()->user()->isAdmin())) {
            return redirect('/dashboard')->with('fail', 'Kontaktirajte administratora sistema');
        }
        return $next($request);
    }
}
