<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AlumnusMiddleware
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
        if(Auth::user()->account_type != 'alumnus'){
            return redirect(route('company'));
        }
        return $next($request);
    }
}
