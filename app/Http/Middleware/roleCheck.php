<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleCheck
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $userRole = session('user_role');

            if (in_array($userRole, explode('|', $role))) {
                return $next($request);
            } else {
                if ($userRole === 'FOV4Qtgi5lcQ9kZ') {
                    return redirect()->route('superadmin')->with('message', 'no access');
                } else if ($userRole === 'BfiwyVUDrXOpmStr') {
                    return redirect()->route('toko')->with('message', 'no access');
                } else  if ($userRole === 'TKQR2DSJlQ5b31V2') {
                    return redirect()->route('petugas')->with('message', 'no access');
                } 
                return redirect()->route('index')->with('message', 'no access');
            }
        } else {
            return $next($request);
        }
    }
}
