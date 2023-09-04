<?php

namespace App\Http\Middleware\Api;

use App\Exceptions\AuthenticationException;
use Closure;
use Illuminate\Http\Request;

/**
 * Class CheckKey
 * @package App\Http\Middleware\Api
 */
class CheckKey
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $token = $request->bearerToken();

        if ($token != config('api_key.key')) {
            throw new AuthenticationException();
        }

        return $next($request);
    }
}
