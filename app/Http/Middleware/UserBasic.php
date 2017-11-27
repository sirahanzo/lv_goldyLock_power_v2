<?php

namespace App\Http\Middleware;

use Closure;

class UserBasic
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
        if (auth()->check() && $request->user()->level == 'user') {

            return redirect()->guest('dashboard');
        }

        return $next($request);

    }
}
