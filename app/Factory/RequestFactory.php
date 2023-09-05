<?php

namespace App\Factory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

/**
 * Class RequestFactory
 * @package App\Factory
 */
class RequestFactory
{
    /**
     * @param $controller
     * @return mixed
     */
    public static function make($controller): FormRequest
    {
        $controllerName = str_replace('Controller', '', class_basename($controller));
        $requestClass = "App\\Http\\Requests\\Api\\{$controllerName}Request";

        return class_exists($requestClass) ? app($requestClass) : app(Request::class);
    }
}