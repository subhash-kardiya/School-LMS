<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccessMiddleware
{
    /**
     * Allow only admin or superadmin roles to access.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('auth_id')) {
            return redirect()->route('auth.login');
        }

        $role = session('role');
        if (!in_array($role, ['admin', 'superadmin'], true)) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
