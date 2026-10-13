<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ApiException;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthSanctumService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function auth(string $email, string $password): array
    {

        $usuario = Usuario::query()->where('email', $email)->firstOrFail();

        if (! ($usuario && Hash::check($usuario->password, $password))) {
            throw new ApiException;
        }

        return [
            'message' => 'Usuario autenticado',
            'code' => 401,
            'token' => $usuario->createToken('sanctum_token')->plainTextToken,
            'data' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'primer_apellido' => $usuario->primer_apellido,
                'segundo_apellido' => $usuario?->segundo_apellido,
                'email' => $usuario->email,
            ],
        ];
    }
}
