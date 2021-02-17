<?php

namespace App\Http\Middleware;

use Closure;

class Every
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
        //echo '全局中间件<br>';
        return $next($request);
    }
}
