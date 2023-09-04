<?php

namespace App\Http\DTO;

use JetBrains\PhpStorm\Pure;

/**
 * Class PostsDTO
 * @package App\Http\DTO
 */
class PostsDTO
{
    public int $user_id;
    public string $title;
    public string $content;

    /**
     * @param $request
     * @return array
     */
    #[Pure] public function createFormRequest(array $request): array
    {
        $data = [];

        foreach ($request as $key => $value) {
            if (property_exists($this, $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}