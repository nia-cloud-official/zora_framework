<?php

return [
    'mysql' => [
        'default' => [
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'database' => 'mtariri'
        ],
        'custom' => [
            'host' => '',        // User-provided host
            'username' => '',    // User-provided username
            'password' => '',    // User-provided password
            'database' => ''     // User-provided database name
        ]
    ],
    'pgsql' => [
        'default' => [
            'host' => '127.0.0.1',
            'username' => 'postgres',
            'password' => '',
            'database' => 'test_db'
        ],
        'custom' => [
            'host' => '',        // User-provided host
            'username' => '',    // User-provided username
            'password' => '',    // User-provided password
            'database' => ''     // User-provided database name
        ]
    ],
    'mongodb' => [
        'default' => [
            'host' => '127.0.0.1',
            'username' => '',
            'password' => '',
            'database' => 'test_db'
        ],
        'custom' => [
            'host' => '',        // User-provided host
            'username' => '',    // User-provided username
            'password' => '',    // User-provided password
            'database' => ''     // User-provided database name
        ]
    ]
];
