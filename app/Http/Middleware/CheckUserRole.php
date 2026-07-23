<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            abort('401', 'Unauthorized');
        }
        if ($request->user()->user_type->id == 2) {
            return $next($request);
        } else {
            abort(403, 'You do not have the correct user role to access this page.');
        }
    }
}
