<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfUserMayStore
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
        $userId = Auth()->user()->id;
        if((int) $request->user_id === $userId) {
            return $next($request);
        }
        return Redirect()->back();
    }
}
