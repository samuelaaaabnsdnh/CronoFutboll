<?php

return [

    /*
    | Rol que se asigna automaticamente a quien se registra desde el
    | frontend (POST /api/auth/register). El cliente NO puede elegir su rol
    | al registrarse, para evitar que alguien se haga administrador.
    | Si el rol no existe, se crea solo.
    */
    'rol_registro' => env('ROL_REGISTRO', 'Aficionado'),

];
