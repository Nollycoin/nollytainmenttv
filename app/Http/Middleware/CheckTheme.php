<?php

namespace App\Http\Middleware;

use Closure;

class CheckTheme
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
        if (!$request->session()->has('theme_view_path')) {
            //session('theme_view_path', 'themes.flixer');
            //Session::put()
        }

        return $next($request);
    }
}
