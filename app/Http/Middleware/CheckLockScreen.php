<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLockScreen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (session()->get('is_locked', false)) {
            // Prevent circular redirection to the lock screen
            if ($request->route()->getName() !== 'lock_screen.show') {
                return redirect()->route('lock_screen.show');
            }
        }

        return $next($request);
    }
}
