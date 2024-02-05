<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            abort(403, 'Accès interdit');
        }

        return $next($request);
    }
}
