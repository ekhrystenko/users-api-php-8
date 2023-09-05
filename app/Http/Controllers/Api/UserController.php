<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundException;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

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

    /**
     * @param UserRequest $request
     * @return UserResource
     */
    public function store(UserRequest $request): UserResource
    {
        $user = $this->crudService->create(modelName: $this->getModelName(), formData: $request->validated());

        return new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource|JsonResponse
     * @throws NotFoundException
     */
    public function show($id): UserResource|JsonResponse
    {
        $user = $this->crudService->getById(modelName: $this->getModelName(), entityId: $id);
        $this->checkModel($user);

        return new UserResource($user);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return UserResource|JsonResponse
     * @throws NotFoundException
     */
    public function update(UserRequest $request, $id): UserResource|JsonResponse
    {
        $user = $this->crudService->update(modelName: $this->getModelName(), formData: $request->validated(), entityId: $id);
        $this->checkModel($user);

        return new UserResource($user);
    }
}
