<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if(Auth::user()->role === "user"){
            if($request->route()->user && Auth::id() === $request->route()->user->id ){
                return $next($request);
            }
            return redirect("home");
        }

        return $next($request);
    }
}
