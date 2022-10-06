<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, $redirectTo ,...$guards )
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard("web")->check()) {

                if(request()->routeIs('admin.login')){
                    return  redirect($redirectTo);
                }

                if((request()->routeIs('admin') || request()->is("admin/*"))){
                    return  redirect($redirectTo);
                }else{
                    return redirect('/');
                }
            }
        }

        return $next($request);
    }
}