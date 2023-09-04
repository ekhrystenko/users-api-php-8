<?php

namespace App\Http\Services\Api;

use App\Http\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserService
 * @package App\Http\Services\Api
 */
class UserService implements UserServiceInterface
{
    /**
     * @return Collection|array
     */
    public function getAllUsers(): Collection|array
    {
        return User::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id): mixed
    {
        return User::find($id);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function createUser($user): mixed
    {
        return User::create($user);
    }

    /**
     * @param $dto
     * @param $id
     * @return null
     */
    public function updateUser($dto, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return false; // або ви можете викидати виключення, якщо користувач не знайдений
        }

        $user->update($dto);
        return $user;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id): bool
    {
        $user = User::find($id);

        if (!$user) {
            return false;
        }

        $user->delete();
        return true;
    }
}
