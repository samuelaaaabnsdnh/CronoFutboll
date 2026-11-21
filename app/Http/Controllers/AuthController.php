<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function register(RegisterRequest $request)
    {
        return response()->json([
            'success' => 'usuario registrado correctamente',
            'data' => $this->authService->registrar($request->validated()),
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        return response()->json([
            'success' => 'inicio de sesión correcto',
            'data' => $this->authService->login(
                $request->validated('email'),
                $request->validated('password')
            ),
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'success' => 'sesión activa',
            'data' => $this->authService->perfil($request->user()),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => 'sesión cerrada correctamente',
        ]);
    }
}
