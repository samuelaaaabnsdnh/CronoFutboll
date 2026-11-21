<?php

namespace Database\Seeders;

use App\Models\EstadisticasJugadores;
use App\Models\Equipos;
use App\Models\Inscripciones;
use App\Models\Jugadores;
use App\Models\Partidos;
use App\Models\Rol;
use App\Models\Torneos;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Datos de ejemplo para ver el frontend funcionando.
 * Uso (desde cero): php artisan migrate:fresh --seed
 *
 * Cuentas de prueba (clave de todas: Crono12345):
 *   admin@cronofutbol.com    -> Administrador
 *   dt@cronofutbol.com       -> Director técnico (equipo Halcones FC)
 *   jugador@cronofutbol.com  -> Jugador (Luis Mora)
 *   arbitro@cronofutbol.com  -> Árbitro
 *   aficionado@cronofutbol.com -> Aficionado
 */
class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Los nombres de rol deben coincidir con los que reconoce el frontend.
        $roles = [];
        foreach (['Administrador', 'Director técnico', 'Jugador', 'Árbitro', 'Aficionado'] as $nombreRol) {
            $roles[$nombreRol] = Rol::firstOrCreate(
                ['nombre' => $nombreRol],
                ['descripcion' => $nombreRol, 'estado' => 'activo']
            );
        }

        $crearUsuario = fn (string $rol, string $nombre, string $apellido, string $email) => Usuario::create([
            'rol_id' => $roles[$rol]->id,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'password' => Hash::make('Crono12345'),
            'telefono' => null,
            'estado' => 'activo',
            'fecha_registro' => now(),
        ]);

        $admin = $crearUsuario('Administrador', 'Admin', 'Crono', 'admin@cronofutbol.com');
        $uDt = $crearUsuario('Director técnico', 'Carlos', 'Rojas', 'dt@cronofutbol.com');
        $uJug = $crearUsuario('Jugador', 'Luis', 'Mora', 'jugador@cronofutbol.com');
        $crearUsuario('Árbitro', 'Ana', 'Referí', 'arbitro@cronofutbol.com');
        $crearUsuario('Aficionado', 'Sofía', 'Hincha', 'aficionado@cronofutbol.com');

        $t1 = Torneos::create(['nombre' => 'Copa Crono 2026', 'categoria' => 'Sub-17', 'descripcion' => 'Torneo relámpago de fin de año', 'fecha_inicio' => '2026-10-15', 'fecha_fin' => '2026-12-10', 'estado' => 'en_curso']);
        $t2 = Torneos::create(['nombre' => 'Liga Barrial', 'categoria' => 'Libre', 'descripcion' => 'Temporada regular', 'fecha_inicio' => '2026-03-01', 'fecha_fin' => '2026-06-30', 'estado' => 'finalizado']);
        Torneos::create(['nombre' => 'Torneo Apertura 2027', 'categoria' => 'Libre', 'descripcion' => 'Próxima temporada', 'fecha_inicio' => '2027-02-01', 'fecha_fin' => '2027-05-30', 'estado' => 'programado']);

        $eq = [];
        foreach (['Halcones FC' => 'Carlos Rojas', 'Titanes' => 'Marta Gómez', 'Real Barrio' => 'Pedro Silva', 'Rayo Verde' => 'Laura Díaz'] as $n => $dt) {
            $eq[] = Equipos::create([
                'nombre' => $n,
                'entrenador' => $dt,
                'correo' => count($eq) === 0 ? $uDt->email : null,
                'estado' => 'activo',
                'fecha_registro' => now(),
                'usuario_id' => count($eq) === 0 ? $uDt->id : null,
            ]);
        }

        $jug = [];
        $datos = [
            [0, 'Luis', 'Mora', 'Delantero', 9], [0, 'Iván', 'Cruz', 'Defensa', 4],
            [1, 'Andrés', 'Pino', 'Portero', 1], [1, 'Mateo', 'Vega', 'Mediocampista', 10],
            [2, 'Diego', 'Rey', 'Mediocampista', 8], [2, 'Sergio', 'Lara', 'Delantero', 11],
            [3, 'Jorge', 'Ibarra', 'Defensa', 3], [3, 'Tomás', 'Peña', 'Delantero', 7],
        ];
        foreach ($datos as $i => [$e, $n, $a, $p, $num]) {
            $jug[] = Jugadores::create(['equipo_id' => $eq[$e]->id, 'nombre' => $n, 'apellido' => $a, 'documento' => '1000' . $i, 'fecha_nacimiento' => '2008-05-0' . (($i % 9) + 1), 'posicion' => $p, 'numero_camiseta' => $num, 'estado' => 'activo', 'usuario_id' => $i === 0 ? $uJug->id : null]);
        }

        // Inscripciones: la tabla de posiciones del frontend se arma con ellas.
        foreach ([[$t1, [0, 1, 2, 3]], [$t2, [1, 2]]] as [$torneo, $equipos]) {
            foreach ($equipos as $e) {
                Inscripciones::create(['torneo_id' => $torneo->id, 'equipo_id' => $eq[$e]->id, 'fecha_inscripcion' => now(), 'estado' => 'activa']);
            }
        }

        $p1 = Partidos::create(['torneo_id' => $t2->id, 'equipo_local_id' => $eq[1]->id, 'equipo_visitante_id' => $eq[2]->id, 'fecha' => '2026-06-20', 'hora' => '16:00', 'lugar' => 'Cancha Sur', 'goles_local' => 3, 'goles_visitante' => 1, 'estado' => 'finalizado']);
        $p2 = Partidos::create(['torneo_id' => $t1->id, 'equipo_local_id' => $eq[0]->id, 'equipo_visitante_id' => $eq[3]->id, 'fecha' => '2026-10-20', 'hora' => '15:00', 'lugar' => 'Cancha Central', 'goles_local' => 2, 'goles_visitante' => 2, 'estado' => 'finalizado']);
        Partidos::create(['torneo_id' => $t1->id, 'equipo_local_id' => $eq[2]->id, 'equipo_visitante_id' => $eq[0]->id, 'fecha' => now()->toDateString(), 'hora' => '18:00', 'lugar' => 'Cancha Norte', 'estado' => 'en_curso']);
        Partidos::create(['torneo_id' => $t1->id, 'equipo_local_id' => $eq[1]->id, 'equipo_visitante_id' => $eq[3]->id, 'fecha' => now()->addDays(5)->toDateString(), 'hora' => '16:30', 'lugar' => 'Cancha Central', 'estado' => 'programado']);

        $stats = [[$p1, 3, 2, 1, 0, 0, 90], [$p1, 4, 1, 2, 1, 0, 85], [$p1, 2, 0, 0, 0, 0, 90], [$p2, 0, 1, 0, 0, 0, 90], [$p2, 7, 2, 1, 0, 0, 88], [$p2, 1, 0, 0, 1, 0, 90]];
        foreach ($stats as [$p, $j, $g, $a, $y, $r, $m]) {
            EstadisticasJugadores::create(['jugador_id' => $jug[$j]->id, 'partido_id' => $p->id, 'goles' => $g, 'asistencias' => $a, 'tarjetas_amarillas' => $y, 'tarjetas_rojas' => $r, 'minutos_jugados' => $m]);
        }
    }
}
