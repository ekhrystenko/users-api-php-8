<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UserRequest
 * @package App\Http\Requests\Api
 */
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric'],
        ];

        if (!is_null($userId)) {
            $rules['email'][] = Rule::unique('users', 'email')->ignore($userId);
        } else {
            $rules['email'][] = Rule::unique('users', 'email');
            $rules['password'] = ['required', 'min:8', 'confirmed'];
        }

        return $rules;
    }
}
