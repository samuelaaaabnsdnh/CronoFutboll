<?php

use Illuminate\Support\Facades\Route;

// Frontend de CronoFutbol: pagina unica (public/crono.html) que consume /api.
// No requiere npm ni Vite: basta con "php artisan serve".
Route::get('/', fn () => response()->file(public_path('crono.html')));
