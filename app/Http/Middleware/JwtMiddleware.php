<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\User;


class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        $jwt_token = $request->cookie('token');
        if ( ! $jwt_token) {
            return $next($request);
        }

        $request->headers->set('Authorization', "Bearer {$jwt_token}");

        return $next($request);
    }
}
