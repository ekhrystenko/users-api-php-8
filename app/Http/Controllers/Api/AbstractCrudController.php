<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundException;
use App\Factory\RequestFactory;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\CrudServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class AbstractCrudController
 * @package App\Http\Controllers\Api
 */
abstract class AbstractCrudController extends Controller
{
    /**
     * @return mixed
     */
    abstract protected function getModelName(): mixed;

    /**
     * AbstractCrudController constructor.
     * @param CrudServiceInterface $crudService
     */
    public function __construct(protected CrudServiceInterface $crudService)
    {
    }

    /**
     * @return mixed
     */
    abstract protected function getResource(): mixed;

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $collection = $this->crudService->getAll(modelName: $this->getModelName());
        return $this->getResource()::collection($collection);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function show($id): mixed
    {
        $entity = $this->crudService->getById(modelName: $this->getModelName(), entityId: $id);
        $this->checkModel($entity);
        $resourceClass = $this->getResource();

        return new $resourceClass($entity);
    }

    /**
     * @param RequestFactory $requestFactory
     * @return mixed
     */
    public function store(RequestFactory $requestFactory): mixed
    {
        $request = $requestFactory->make(controller: $this);
        $resourceClass = $this->getResource();

        $entity = $this->crudService->create(modelName: $this->getModelName(), formData: $request->validated());

        return new $resourceClass($entity);
    }

    /**
     * @param RequestFactory $requestFactory
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function update(RequestFactory $requestFactory, $id): mixed
    {
        $request = $requestFactory->make(controller: $this);
        $resourceClass = $this->getResource();

        $entity = $this->crudService->update(modelName: $this->getModelName(), formData: $request->validated(), entityId: $id);
        $this->checkModel(entity: $entity);

        return new $resourceClass($entity);
    }

    /**
     * @param $id
     * @return NotFoundException|Application|ResponseFactory|JsonResponse|Response
     * @throws NotFoundException
     */
    public function destroy($id): Response|JsonResponse|Application|ResponseFactory|NotFoundException
    {
        $entity = $this->crudService->delete(modelName: $this->getModelName(), entityId: $id);
        $this->checkModel($entity);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $entity
     * @throws NotFoundException
     */
    protected function checkModel($entity)
    {
        if (!$entity) {
            throw new NotFoundException();
        }
    }
}
