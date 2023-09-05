<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends AbstractCrudController
{
    /**
     * @return User
     */
    protected function getModelName(): User
    {
        return app(User::class);
    }

    /**
     * @return string
     */
    protected function getResource(): string
    {
        return 'App\Http\Resources\Api\UserResource';
    }
}
