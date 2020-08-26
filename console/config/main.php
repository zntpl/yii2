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
            'class' => 'yii2tool\deeMigrate\MigrateController',
            'migrationPath' => '@common/migrations',
            //'migrationNamespaces' => ['Da\\User\\Migration'],
            'migrationLookup' => [
                '@yii/rbac/migrations',

                //'@mdm/autonumber/migrations',
                //'@mdm/upload/migrations',
                //'@Zelenin/yii/modules/I18n/migrations',

                '@vendor/znsandbox/yii2-legacy/src/yii2bundle/account/domain/v3/migrations',
                '@vendor/znsandbox/yii2-legacy/src/yii2bundle/rbac/domain/migrations',
                '@vendor/znsandbox/yii2-legacy/src/yii2bundle/lang/domain/migrations',
                //'@vendor/znsandbox/yii2-legacy/src/yii2bundle/geo/domain/migrations',
                //'@vendor/znsandbox/yii2-legacy/src/yubundle/reference/domain/migrations',
                //'@vendor/znsandbox/yii2-legacy/src/yubundle/storage/domain/v1/migrations',
            ],
        ],
    ],
];
