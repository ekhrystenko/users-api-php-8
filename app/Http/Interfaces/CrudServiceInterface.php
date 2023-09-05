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
     * @param $modelName
     * @return Collection|array
     */
    public function getAll($modelName): Collection|array;

    /**
     * @param $modelName
     * @param $entityId
     * @return mixed
     */
    public function getById($modelName, $entityId): mixed;

    /**
     * @param $modelName
     * @param $formData
     * @return mixed
     */
    public function create($modelName, $formData);

    /**
     * @param $modelName
     * @param $formData
     * @param $entityId
     * @return mixed
     */
    public function update($modelName, $formData, $entityId);

    /**
     * @param $modelName
     * @param $entityId
     * @return mixed
     */
    public function delete($modelName, $entityId);
}