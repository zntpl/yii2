<?php

use yii2bundle\lang\domain\enums\LanguageEnum;

return [
    'language' => LanguageEnum::RU, // current Language
    'sourceLanguage' => LanguageEnum::SOURCE, // Language development
    'timeZone' => 'UTC',
    'runtimePath' => '@common/runtime',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'container' => include('container.php'),
    'components' => [
        //'language' => 'yii2bundle\lang\domain\components\Language',
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => true,
        ],
        // authManager' => 'yii2bundle\rbac\domain\rbac\PhpManager',
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'user' => [
            'class' => 'yii2bundle\account\domain\v3\web\User',
            //'identityClass' => 'common\models\User',
            'identityClass' => 'yii2bundle\account\domain\v3\entities\LoginEntity',
        ],
        'db' => [
            'class' => 'RocketLab\Bundle\App\Components\Connection',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@' . $_ENV['CACHE_DIRECTORY'],
        ],
        'i18n' => [
            'class' => 'yii2bundle\lang\domain\i18n\I18N',
            'aliases' => [
                '*' => '@common/messages',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];
