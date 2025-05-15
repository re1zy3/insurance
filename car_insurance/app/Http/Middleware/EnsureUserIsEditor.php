<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsEditor
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()?->role === 'editor') {
            abort(403);
        }
        return $next($request);
    }
}
