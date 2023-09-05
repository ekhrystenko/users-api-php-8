<?php

namespace App\Http\Services\Api;

use App\Http\Interfaces\CrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CrudService
 * @package App\Http\Services\Api
 */
class CrudService implements CrudServiceInterface
{
    /**
     * @param $modelName
     * @return Collection|array
     */
    public function getAll($modelName): Collection|array
    {
        return $modelName->get();
    }

    /**
     * @param $modelName
     * @param $entityId
     * @return mixed
     */
    public function getById($modelName, $entityId): mixed
    {
        return $modelName::find($entityId);
    }

    /**
     * @param $modelName
     * @param $formData
     * @return mixed
     */
    public function create($modelName, $formData): mixed
    {
        return $modelName::create($formData);
    }

    /**
     * @param $modelName
     * @param $formData
     * @param $entityId
     * @return false|mixed
     */
    public function update($modelName, $formData, $entityId)
    {
        $model = $modelName::find($entityId);
        if (!$model) {
            return false;
        }

        $model->update($formData);
        return $model;
    }

    /**
     * @param $modelName
     * @param $entityId
     * @return bool
     */
    public function delete($modelName, $entityId): bool
    {
        $model = $modelName::find($entityId);

        if (!$model) {
            return false;
        }

        $model->delete();
        return true;
    }
}
