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
        if (false) {
           /*check for theme here...handled by page controller presently*/
        }

        return $next($request);
    }
}
