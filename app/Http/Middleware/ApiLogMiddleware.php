<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Helpers\LogHelpper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiLogMiddleware
{
    /**
     * Utilizado para hacer un registro debug de las entradas y salidas a todos lo métodos de la api
     * Registra un log debug, con los parámetros de entrada y de salida.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $parametros = LogHelpper::sanitizarCampos($request->all());

        Log::debug($request->route()?->getActionMethod().' | Entrado en la ruta con los parámetros:', $parametros);

        try {
            return $next($request);
        } finally {
            Log::debug($request->route()?->getActionMethod().' | Salido de la ruta :', $parametros);
        }
    }
}
