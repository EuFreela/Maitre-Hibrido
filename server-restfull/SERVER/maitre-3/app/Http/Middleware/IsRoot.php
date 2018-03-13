<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsRoot
{
    
    public function handle($request, Closure $next)
    {

        if( Auth::user()->nivel_idnivel > 2 )
            return Redirect('/401');

        return $next($request);
    }
}
