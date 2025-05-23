<?php

namespace App\Http\Middleware;

use App\Constants\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, [Role::SUPER_ADMIN, Role::ADMIN, Role::GENERAL_ADMIN])) {
            return response()->json(['error' => 'Access denied. Admins only.'], 403);
        }

        return $next($request);
    }
}
