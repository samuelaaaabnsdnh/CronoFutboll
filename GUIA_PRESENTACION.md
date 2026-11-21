# CronoFutbol – Guía para dejarlo funcionando y presentarlo

El frontend (`public/crono.html`) lo sirve Laravel en `/` y consume la API en `/api`.
No necesita npm ni Vite.

## Opción A – AMPPS / XAMPP (PHP 8.2+ y MySQL)
1. Inicia MySQL y crea la base de datos **cronofutbol** en phpMyAdmin (cotejamiento `utf8mb4_unicode_ci`).
2. Revisa `.env` (ya viene listo): `DB_USERNAME=root`, `DB_PASSWORD=mysql` (cámbialo si tu MySQL usa otra clave).
3. En la carpeta del proyecto:
   ```
   php artisan migrate:fresh --seed
   php artisan serve
   ```
4. Abre http://127.0.0.1:8000

## Opción B – Docker
```
copy .env.docker .env        (en Linux/Mac: cp .env.docker .env)
docker compose up -d --build
docker compose exec app php artisan migrate:fresh --seed
```
Abre http://localhost:8000 (phpMyAdmin: http://localhost:8881, usuario root / clave 1234).

## Cuentas de prueba (clave de todas: `Crono12345`)
| Correo | Rol |
|---|---|
| admin@cronofutbol.com | Administrador |
| dt@cronofutbol.com | Director técnico (equipo Halcones FC) |
| jugador@cronofutbol.com | Jugador (Luis Mora) |
| arbitro@cronofutbol.com | Árbitro |
| aficionado@cronofutbol.com | Aficionado |

Quien se registra desde el frontend entra como **Aficionado**; el administrador le cambia el rol en la pestaña *Usuarios*.

## Cómo saber que está conectado
Arriba a la derecha, el frontend muestra **“API conectada”** (verde). Si ves **“Modo demostración”** (amarillo), no está
llegando a Laravel: revisa que `php artisan serve` esté corriendo y que la base exista. Ese modo guarda datos solo
en el navegador, así que **no** lo uses para presentar.

## Qué se cambió
- `public/crono.html`: nuevo frontend; además marca como obligatorios los campos que exige el backend.
- Migración `2026_10_27_..._add_usuario_id_...`: columna `usuario_id` en `equipos` y `jugadores` (para “Mi equipo” / “Mi perfil”).
- Modelos: `usuario_id` en fillable; se quitó el cast `boolean` de `estado` en `Jugadores` e `Inscripciones`
  (la columna es texto y un jugador “inactivo” se veía como activo); se corrigieron las relaciones de `Equipos`.
- Validaciones: `usuario_id` en equipos/jugadores; `fecha_fin` del torneo ahora es opcional (la BD ya lo permitía).
- `routes/api.php`: lectura pública de torneos/equipos/jugadores/partidos/estadísticas/inscripciones; todo lo demás
  (crear, editar, borrar, usuarios, roles…) exige token.
- `UsuarioController`: solo el administrador lista/crea/borra usuarios; cada usuario edita solo su perfil y no puede cambiarse el rol.
- `InscripcionRepository`: al quitar un equipo de un torneo se borra de verdad (el `UNIQUE torneo+equipo` impedía reinscribirlo).
- `bootstrap/app.php`: errores de `/api` siempre en JSON.
- `DemoSeeder`: roles, usuarios de prueba, inscripciones y datos con `estado` correcto.

## Pendiente / a tener en cuenta
- Los permisos por rol (quién crea torneos, etc.) los aplica el frontend; el backend solo exige estar autenticado
  (salvo en usuarios). Para una app real, agrega políticas por rol en cada controlador.
- Los enlaces de WhatsApp/Instagram/Facebook/TikTok están con datos de ejemplo: edita `CONTACTOS` al inicio del script de `crono.html`.
- `migrate:fresh` borra todos los datos; úsalo solo para dejar la base limpia antes de presentar.
