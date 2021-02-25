<?php

namespace App\Http\Middleware;

use Closure;

class RespondWithJson
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
        // Modify the incoming request so it says it
        // always wants JSON returned.
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
