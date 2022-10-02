<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LibrarianMiddleware
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
        if (auth()->user()->isLibrarian() || auth()->user()->isAdmin()) {
            return $next($request);
        }
//        auth()->logout();
        return redirect('/')->with('fail', 'Ovaj sistem je namijenjen iskljucivo bibliotekarima.');
    }
}
