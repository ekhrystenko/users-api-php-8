<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundException;
use App\Http\Requests\Api\PostRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

/**
 * Class PostController
 * @package App\Http\Controllers\Api
 */
class PostController extends AbstractCrudController
{
    /**
     * @return Post
     */
    protected function getModelName(): Post
    {
        return app(Post::class);
    }

    /**
     * @return string
     */
    protected function getResource(): string
    {
        return 'App\Http\Resources\Api\PostResource';
    }

    /**
     * @param PostRequest $request
     * @return PostResource
     */
    public function store(PostRequest $request): PostResource
    {
        $post = $this->crudService->create(modelName: $this->getModelName(), formData: $request->validated());

        return new PostResource($post);
    }

    /**
     * @param $id
     * @return PostResource
     * @throws NotFoundException
     */
    public function show($id): PostResource
    {
        $post = $this->crudService->getById(modelName: $this->getModelName(), entityId: $id);
        $this->checkModel($post);

        return new PostResource($post);
    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return PostResource|JsonResponse
     * @throws NotFoundException
     */
    public function update(PostRequest $request, $id): PostResource|JsonResponse
    {
        $post = $this->crudService->update(modelName: $this->getModelName(), formData: $request->validated(), entityId: $id);
        $this->checkModel($post);

        return new PostResource($post);
    }
}
