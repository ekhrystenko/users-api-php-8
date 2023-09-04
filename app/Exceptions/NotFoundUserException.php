<?php


namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotFoundUserException extends Exception
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json(['message' => 'Користувача не знайдено'], 404);
    }
}