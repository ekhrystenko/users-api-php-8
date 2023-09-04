<?php


namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface UserServiceInterface
 * @package App\Http\Interfaces
 */
interface UserServiceInterface
{
    /**
     * @return Collection|array
     */
    public function getAllUsers(): Collection|array;

    /**
     * @param $id
     * @return mixed
     */
    public function getUserById($id): mixed;

    /**
     * @param $dto
     * @return mixed
     */
    public function createUser($dto);

    /**
     * @param $dto
     * @param $id
     * @return mixed
     */
    public function updateUser($dto, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id);
}