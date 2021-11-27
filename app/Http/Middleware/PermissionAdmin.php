<?php

namespace App\Http\Middleware;

use App\Response\Error;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Log;

class PermissionAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


        if((Auth::user()->role == User::ROLE_ADMIN)||($request->route()->getName()=="veiculos.listar")) {
            return $next($request);

        }

        return Error::generic(null,messageErrors('5004'),
        "web",'home');
    }
}
