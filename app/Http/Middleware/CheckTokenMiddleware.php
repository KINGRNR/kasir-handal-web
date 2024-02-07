<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('api')->check()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return redirect('/login'); 
        }

        return $next($request);
    }
}