<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddle
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
        if($request->input('age') < 100)
        {
            return redirect('/');
        }
        return $next($request);
    }
}
