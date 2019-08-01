<?php

return [

    // default db config
    'default' => env('DB_CONNECTION', 'mongodb'),

    'connections' => [

        'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('DB_HOST'),
            'port'     => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE'),
            // 'dns' => env('DB_DNS'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'options'  => [
                'database' => env('DB_DATABASE')
            ]

        ]

    ],

    // migrations
    'migrations' => 'migrations'


];
