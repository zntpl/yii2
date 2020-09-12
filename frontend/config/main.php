<?php

return [
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'rest-client/project/index',
    'name' => 'Demo',
    'bootstrap' => [
        'log',
    ],
    'modules' => [
        'error' => 'yii2bundle\error\module\Module',
        'user' => 'yii2bundle\account\module\Module',
        'storage' => 'yubundle\storage\web\Module',
        'rest-client' => 'ZnTool\RestClient\Yii\Web\Module',
        'dashboard' => 'yii2bundle\dashboard\web\Module',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'cookieValidationKey' => $_ENV['COOKIE_VALIDATION_KEY_WEB'],
        ],
        'user' => [
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-frontend',
                'httpOnly' => true,
            ],
            'loginUrl' => ['user/auth'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'errorHandler' => [
            'errorAction' => 'error/error/error',
        ],
        'urlManager' => [
            'rules' => array_merge(
                include __DIR__ . '/../../Packages/RestClient/Yii/Web/config/routes.php',
                [
                    '/' => 'dashboard',
                ]
            ),
        ],
    ],
];
