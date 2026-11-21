<?php

namespace App\Services;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Registra un usuario con el rol por defecto y le entrega un token.
     */
    public function registrar(array $data): array
    {
        $rol = Rol::firstOrCreate(
            ['nombre' => config('cronofutbol.rol_registro')],
            ['descripcion' => 'Rol por defecto al registrarse', 'estado' => 'activo']
        );

        $usuario = Usuario::create([
            'rol_id' => $rol->id,
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefono' => $data['telefono'] ?? null,
            'estado' => 'activo',
            'fecha_registro' => now(),
        ]);

        return $this->respuestaConToken($usuario);
    }

    /**
     * Valida credenciales y entrega un token de Sanctum.
     */
    public function login(string $email, string $password): array
    {
        $usuario = Usuario::where('email', $email)->first();

        if (! $usuario || ! Hash::check($password, $usuario->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales no son correctas.'],
            ]);
        }

        if (strcasecmp((string) $usuario->estado, 'activo') !== 0) {
            throw ValidationException::withMessages([
                'email' => ['Tu usuario no está activo. Contacta al administrador.'],
            ]);
        }

        return $this->respuestaConToken($usuario);
    }

    /**
     * Datos del usuario con su rol y permisos (para armar el menu del frontend).
     */
    public function perfil(Usuario $usuario): array
    {
        $usuario->loadMissing('rol.permisos');

        return [
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'email' => $usuario->email,
            'telefono' => $usuario->telefono,
            'estado' => $usuario->estado,
            'fecha_registro' => $usuario->fecha_registro,
            'rol' => $usuario->rol ? [
                'id' => $usuario->rol->id,
                'nombre' => $usuario->rol->nombre,
            ] : null,
            'permisos' => $usuario->rol
                ? $usuario->rol->permisos->pluck('nombre')->values()
                : [],
        ];
    }

    private function respuestaConToken(Usuario $usuario): array
    {
        return [
            'token' => $usuario->createToken('cronofutbol-frontend')->plainTextToken,
            'token_type' => 'Bearer',
            'usuario' => $this->perfil($usuario),
        ];
    }
}
