<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    */

    'paths' => ['api/*', 'auth/google/callback', 'sanctum/csrf-cookie'],  // Asegura incluir la ruta de autenticación con Google
    'allowed_methods' => ['*'],  // Permite todos los métodos (GET, POST, etc.)
    'allowed_origins' => ['https://profileai.top'],  // Asegúrate de incluir tu dominio principal
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],  // Permite todos los encabezados
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,  // Actívalo si necesitas que las cookies de autenticación se compartan
];
