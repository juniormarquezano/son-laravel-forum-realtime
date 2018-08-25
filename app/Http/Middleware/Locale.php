<?php

namespace App\Http\Middleware;

use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// Recupera a session e joga na variavel global do laravel
		// setLocale
    	app()->setLocale(session('locale'));
        return $next($request);
    }
}
