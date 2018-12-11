<?php
namespace App\Http\Middleware;
use Closure;
class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if ($request->user() === null) {
            abort(401);
        }
        if ($request->user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        abort(401);
    }
}
