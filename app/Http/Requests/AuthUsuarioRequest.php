<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|string',
            'email' => 'nullable|string|email',
        ];
    }

    /**
     * Traducción de los atributos
     *
     * @return array|string[]
     */
    public function attributes(): array
    {
        return [
            'password' => trans('input.password'),
            'email' => trans('input.email'),
        ];
    }
}
