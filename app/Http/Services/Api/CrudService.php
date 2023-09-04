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
     * @param $model
     * @return Collection|array
     */
    public function getAll($model): Collection|array
    {
        return $model->get();
    }

    /**
     * @param $model
     * @param $id
     * @return mixed
     */
    public function getById($model, $id): mixed
    {
        return $model::find($id);
    }

    /**
     * @param $model
     * @param $dto
     * @return mixed
     */
    public function create($model, $dto): mixed
    {
        return $model::create($dto);
    }

    /**
     * @param $model
     * @param $dto
     * @param $id
     * @return false
     */
    public function update($model, $dto, $id)
    {
        $updateModel = $model::find($id);
        if (!$updateModel) {
            return false;
        }

        $updateModel->update($dto);
        return $updateModel;
    }

    /**
     * @param $model
     * @param $id
     * @return bool
     */
    public function delete($model, $id): bool
    {
        $deleteModel = $model::find($id);

        if (!$deleteModel) {
            return false;
        }

        $deleteModel->delete();
        return true;
    }
}
