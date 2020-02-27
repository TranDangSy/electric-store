<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLevel2
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->level==1 || Auth::user()->level==2)
        {
            return $next($request);
        }
        abort(403);
    }
}
