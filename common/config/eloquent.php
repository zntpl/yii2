<?php

return [
    //fos_user
    'connection' => [
        'map' => [
            'fos_user' => 'user_identity',
        ],
    ],
    'fixture' => [
        'directory' => [
            'default' => '/common/fixtures/data',
        ],
    ],
    'migrate' => [
        'directory' => [
            '/Packages/RestClient/Domain/Migrations',
            '/vendor/znbundle/messenger/src/Domain/Migrations',
            '/vendor/znbundle/reference/src/Domain/Migrations'
        ],
    ],
];
