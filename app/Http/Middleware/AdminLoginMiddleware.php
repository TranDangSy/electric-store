<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminLoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->status==1 && Auth::user()->level>0)
                return $next($request);
            else{
                return redirect('admin/login');
            }
        }
        else{
            return redirect('admin/login');
        }
    }
}
