<?php

return [
    'controllerNamespace' => 'console\controllers',
    'bootstrap' => [
        'log',
    ],
    'modules' => [

    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
        ],
        'migrate' => [
            'class' => 'ZnSandbox\Sandbox\Yii2\DeeMigrate\MigrateController',
            'migrationPath' => '@common/migrations',
            //'migrationNamespaces' => ['Da\\User\\Migration'],
            'migrationLookup' => [
                '@yii/rbac/migrations',

                //'@mdm/autonumber/migrations',
                //'@mdm/upload/migrations',
                //'@Zelenin/yii/modules/I18n/migrations',

                '@vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/account/domain/v3/migrations',
                '@vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/rbac/domain/migrations',
                '@vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/lang/domain/migrations',
                //'@vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/geo/domain/migrations',
                //'@vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/reference/domain/migrations',
                //'@vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/storage/domain/v1/migrations',
            ],
        ],
    ],
];
