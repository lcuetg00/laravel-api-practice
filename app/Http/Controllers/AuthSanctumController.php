<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AuthUsuarioRequest;
use App\Services\AuthSanctumService;
use Illuminate\Support\Facades\Log;

class AuthSanctumController extends Controller
{
    public function __construct(private readonly AuthSanctumService $authSanctumService) {}

    /**
     * Realizar login utilizando Laravel Sanctum
     *
     * @return void
     */
    public function login(AuthUsuarioRequest $request)
    {
        try {
            $validated = $request->validated();

            $this->authSanctumService->auth($validated['email'], $validated['password']);

        } catch (\Throwable $th) {
            Log::error('Ha ocurrido un error al intentar realizar un login', ['exception' => $th]);
        }

        Log::debug('Entrado en'.self::class.'::'.__FUNCTION__);
    }
}
