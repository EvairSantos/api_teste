<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class TrustHosts
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
        // Logic for handling trusted hosts
        return $next($request);
    }
}
