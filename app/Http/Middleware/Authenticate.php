<?php

namespace App\Http\Middleware;

use App\Response\Error;
use Closure;

class Authenticate
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
//        dd(route('login'));
        if(!auth()->check())
            return Error::generic(null,messageErrors('5004'),
                "web",'login');
        return $next($request);
    }
}
