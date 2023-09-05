<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;

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
}
