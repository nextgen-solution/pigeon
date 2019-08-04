<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pigeon Host
    |--------------------------------------------------------------------------
    |
    | This option use for determining which Pigeon's host you want to connect.
    |
    */

    'host' => env('PIGEON_HOST', 'https://pigeon.ngs.in.th'),

    /*
    |--------------------------------------------------------------------------
    | Pigeon key
    |--------------------------------------------------------------------------
    |
    | This is a secret key for user authentication.
    | You can issue a new one from our service.
    |
    */

    'key' => env('PIGEON_KEY'),

];
