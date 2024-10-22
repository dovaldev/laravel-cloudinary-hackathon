<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxies
    |--------------------------------------------------------------------------
    |
    | Set the trusted proxies for your application. This is useful if you
    | are using a load balancer or a proxy like Cloudflare, and you need to
    | ensure that Laravel recognizes requests coming from a trusted source.
    |
    */

    'proxies' => '*',  // Permite confiar en todos los proxies, puedes cambiar '*' por una IP o un rango específico si lo prefieres

    /*
    |--------------------------------------------------------------------------
    | Headers
    |--------------------------------------------------------------------------
    |
    | This option defines which headers should be used to detect proxies.
    | It is necessary to ensure proper detection of the client's IP address.
    |
    */

    'headers' => Illuminate\Http\Request::HEADER_X_FORWARDED_ALL,  // Confía en todas las cabeceras X-Forwarded
];
