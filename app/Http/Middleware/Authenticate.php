<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class Authenticate
{


    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $jwt_token = $request->cookie('jwt_token');
        if ( ! $jwt_token) {
            return $next($request);
        }

        $request->headers->set('Authorization', "Bearer {$jwt_token}");

        return $next($request);
    }
}
