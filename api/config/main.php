<?php

$version = 'v1';

return [
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'dashboard' => 'RocketLab\Bundle\Dashboard\Api\Module',
        'account' => 'yii2bundle\account\api\v3\Module',
        'user' => 'yubundle\user\api\v1\Module',
        'notify' => 'yii2bundle\notify\api\Module',
        'staff' => 'yubundle\staff\api\v1\Module',
        //'storage' => 'yubundle\storage\api\Module',
        //'reference' => 'yubundle\reference\api\Module',
        'rbac' => 'yii2bundle\rbac\api\Module',
        'dev' => 'yubundle\common\dev\api\Module',
        //'settings' => 'yii2bundle\settings\api\v1\Module',
        'model' => 'yii2bundle\model\api\v1\Module',
        //'geo' => 'yii2bundle\geo\api\Module',
        'restclient' => 'Packages\RestClient\Yii\Api\Module',
        'messenger' => 'ZnBundle\Messenger\Yii\Api\Module',
    ],
    'components' => [
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'multipart/form-data' => 'yii\web\MultipartFormDataParser',
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'formatters' => [
                'json' => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
                'xml' => 'yii\web\XmlResponseFormatter',
            ],
        ],
        'user' => [
            'enableAutoLogin' => false,
            'enableSession' => false,
            'loginUrl' => null,
            'authMethod' => [
                'yii2bundle\account\domain\v3\filters\auth\HttpTokenAuth',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'showScriptName' => false,
            'rules' => array_merge(
                //include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/geo/api/config/routes.php',
                include __DIR__ . '/../../vendor/znbundle/messenger/src/Yii/Api/config/routes.php',
                include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/account/api/v3/config/routes.php',
                include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/rocket-php-lab/Bundle/Dashboard/Api/config/routes.php',
                include __DIR__ . '/../../Packages/RestClient/Yii/Api/config/routes.php',
                //include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/storage/api/config/routes.php',
                //include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/reference/api/config/routes.php',
                include __DIR__ . '/../../vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/rbac/api/config/routes.php'
            ),
        ],
        'formatter' => [
            'dateFormat' => 'Y-m-d\TH:i:s\Z',
            'timeFormat' => 'Y-m-d\TH:i:s\Z',
            'datetimeFormat' => 'Y-m-d\TH:i:s\Z',
        ],
    ],
];
