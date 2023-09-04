<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Collection;

/**
 * Interface CrudServiceInterface
 * @package App\Http\Interfaces
 */
interface CrudServiceInterface
{
    /**
     * @param $model
     * @return Collection|array
     */
    public function getAll($model): Collection|array;

    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public function getById($model, $id): mixed;

    /**
     * @param $model
     * @param $dto
     * @return mixed
     */
    public function create($model, $dto);

    /**
     * @param $model
     * @param $dto
     * @param $id
     * @return mixed
     */
    public function update($model, $dto, $id);

    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public function delete($model, $id);
}