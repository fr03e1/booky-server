<?php

namespace App\Http\Middleware;

use App\Enums\RoleEnum;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();

        if($user->hasRole(RoleEnum::ADMIN->value))
            return $next($request);

        if($user->hasRole(RoleEnum::MANAGER->value))
            return $next($request);

        return abort(401);
    }
}
