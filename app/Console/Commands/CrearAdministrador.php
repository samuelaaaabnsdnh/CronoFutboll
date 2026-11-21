<?php

namespace App\Console\Commands;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

/**
 * Crea (o asciende) al primer administrador SIN necesitar otro administrador.
 *
 * Solo se puede ejecutar desde la consola del servidor, por eso es seguro:
 * nadie desde la web puede usarlo para hacerse administrador.
 *
 * Uso:
 *   php artisan crono:admin
 *   php artisan crono:admin tu@correo.com --nombre=Juan --apellido=Diego
 *
 * Si el correo ya existe (por ejemplo, te registraste desde la web), solo se le
 * cambia el rol a Administrador y la contraseña se deja como estaba.
 */
class CrearAdministrador extends Command
{
    protected $signature = 'crono:admin
        {email? : Correo del administrador}
        {--nombre= : Nombre (solo si el usuario es nuevo)}
        {--apellido= : Apellido (solo si el usuario es nuevo)}';

    protected $description = 'Crea un usuario Administrador o convierte uno existente en Administrador';

    public function handle(): int
    {
        $rol = Rol::firstOrCreate(
            ['nombre' => 'Administrador'],
            ['descripcion' => 'Acceso total a CronoFutbol', 'estado' => 'activo']
        );

        // Los demás roles que reconoce el frontend (por si la base está vacía).
        foreach (['Director técnico', 'Jugador', 'Árbitro', 'Aficionado'] as $nombre) {
            Rol::firstOrCreate(['nombre' => $nombre], ['descripcion' => $nombre, 'estado' => 'activo']);
        }

        $email = $this->argument('email') ?: $this->ask('Correo del administrador');
        $usuario = Usuario::where('email', $email)->first();

        if ($usuario) {
            $usuario->update(['rol_id' => $rol->id, 'estado' => 'activo']);
            $this->info("El usuario {$email} ahora es Administrador.");

            return self::SUCCESS;
        }

        $nombre = $this->option('nombre') ?: $this->ask('Nombre', 'Admin');
        $apellido = $this->option('apellido') ?: $this->ask('Apellido', 'Crono');
        $password = $this->secret('Contraseña (mínimo 8 caracteres)');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL) || strlen((string) $password) < 8) {
            $this->error('Correo inválido o contraseña de menos de 8 caracteres.');

            return self::FAILURE;
        }

        Usuario::create([
            'rol_id' => $rol->id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'password' => Hash::make($password),
            'estado' => 'activo',
            'fecha_registro' => now(),
        ]);

        $this->info("Administrador {$email} creado. Ya puedes iniciar sesión en el sitio.");

        return self::SUCCESS;
    }
}
