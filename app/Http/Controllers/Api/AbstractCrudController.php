<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundException;
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
     * UserController constructor.
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
        $posts = $this->crudService->getAll($this->getModelName());
        return $this->getResource()::collection($posts);
    }

    /**
     * @param $id
     * @return NotFoundException|Application|ResponseFactory|JsonResponse|Response
     * @throws NotFoundException
     */
    public function destroy($id): Response|JsonResponse|Application|ResponseFactory|NotFoundException
    {
        $user = $this->crudService->delete($this->getModelName(), $id);
        $this->checkModel($user);

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param $model
     * @throws NotFoundException
     */
    protected function checkModel($model)
    {
        if (!$model) {
            throw new NotFoundException();
        }
    }
}
