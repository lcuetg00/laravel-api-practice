<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'primer_apellido' => 'required|string',
            'segundo_apellido' => 'nullable|string',
            'email' => 'nullable|string|email|unique:users,email',
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
            'nombre' => trans('input.nombre'),
            'primer_apellido' => trans('input.primer_apellido'),
            'segundo_apellido' => trans('input.segundo_apellido'),
            'email' => trans('input.email'),
        ];
    }
}
