<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

/**
 * Class AuthenticationException
 * @package App\Exceptions
 */
class AuthenticationException extends \Exception
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json(['message' => 'Аутентифікація не пройдена, перевірте ключ!'], 401);
    }
}