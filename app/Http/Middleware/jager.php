<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class jager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if ($user) {
            // Check if user has any of the required roles
            if (empty($roles) || in_array($user->role, $roles)) {
                return $next($request);
            }
            // If user does not have the required role
            abort(403, 'Unauthorized action.');
        }
        return redirect()->route('login');
    }
}