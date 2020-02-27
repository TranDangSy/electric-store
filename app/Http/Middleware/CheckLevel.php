<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckLevel
{
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->level==1)
        {
            return $next($request);
        }
        abort(403);
    }
}
