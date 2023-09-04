<?php


namespace App\Http\DTO;

use JetBrains\PhpStorm\Pure;

/**
 * Class UsersDTO
 * @package App\Http\DTO
 */
class UsersDTO
{
    public string $name;
    public string $email;
    public string $phone;
    public string $password;

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