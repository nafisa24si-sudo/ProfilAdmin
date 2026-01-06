<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Usage: ->middleware('role:super_admin') or ->middleware('role:admin,petugas')
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        if (!empty($roles) && !in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak. Role Anda: ' . $user->role);
        }

        return $next($request);
    }
}
