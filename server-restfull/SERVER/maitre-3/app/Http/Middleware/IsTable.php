<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class IsTable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status)
    {
        $table_token = DB::table('table')->where('status_codeStatus','=',$status)->first();
       
        if( !$table_token )
            return Redirect('/401-frontend');
        
        return $next($request);
    }
}
