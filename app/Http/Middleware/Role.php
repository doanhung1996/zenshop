<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        if (empty(auth()->user())){
            return redirect()->route('home');
        }
        if(!auth()->user()->isAdmin() || !auth()->user()->isVerified()){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
