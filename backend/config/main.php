<?php

return [
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        //'admin', // add module id to bootstrap for proper aliases and url routes binding
    ],
    'modules' => [
        'error' => 'yii2bundle\error\module\Module',
        'user' => 'yii2bundle\account\module\Module',
        'storage' => 'yubundle\storage\web\Module',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY_ADMIN'],
        ],
        'user' => [
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true,
            ],
            'loginUrl' => ['user/auth'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'errorHandler' => [
            'errorAction' => 'error/error/error',
        ],
        'urlManager' => [
            'rules' => [
            ],
        ],
    ],
];
