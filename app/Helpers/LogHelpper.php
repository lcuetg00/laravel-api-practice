<?php

declare(strict_types=1);

namespace App\Helpers;

use Illuminate\Support\Str;

class LogHelpper
{
    public const array CAMPOS_SENSIBLES = [
        'password',
        'password_confirmation',
        'current_password',
        'token',
        'access_token',
        'refresh_token',
    ];

    /**
     * Sanitiza campos, por ejemplo de contraseñas, que no queremos guardar en un log
     */
    public static function sanitizarCampos(array $campos): array
    {
        $camposSanitizados = [];
        foreach ($campos as $campo => $valor) {
            if (in_array(strtolower($campo), self::CAMPOS_SENSIBLES, true)) {
                $camposSanitizados[$campo] = Str::repeat('*', Str::length(trim($valor)));
            } else {
                $camposSanitizados[$campo] = trim($valor);
            }
        }

        return $camposSanitizados;
    }
}
