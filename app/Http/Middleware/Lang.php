<?php

namespace App\Http\Middleware;

use Closure;

class Lang
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
        $host = $_SERVER['HTTP_HOST']; 
        
        
        if($host == "www.p2pdz.com" or $host == "p2pdz.com" or $host == '127.0.0.1:8000') {
        } else {
            die;
        }
        app()->setLocale(app('Lang'));

        return $next($request);
    }
}
