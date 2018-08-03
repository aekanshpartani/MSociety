<?php

namespace App\Http\Middleware;

use Closure;

class Security
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

        if(Auth::check()){
            if(Auth::user()->isSecurity()){
                return $next($request);
            }
        }
        return abort(403, 'Unauthorized action.');
    }
}
