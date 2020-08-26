<?php

return [
    'defaultLanguage' => 'ru',
    'fallbackLanguage' => 'en',
    'bundles' => [
        'app' => 'common/messages/__lng__/__ns__.json',
        'account' => 'vendor/znsandbox/yii2-legacy/src/yii2bundle/account/domain/v3/i18next/__lng__/__ns__.json',
        'user' => 'vendor/znsandbox/yii2-legacy/src/yii2bundle/account/domain/v3/i18next/__lng__/__ns__.json',
        'storage' => 'vendor/znsandbox/yii2-legacy/src/yubundle/storage/domain/v1/i18next/__lng__/__ns__.json',
        'restclient' => 'Packages/RestClient/Domain/i18next/__lng__/__ns__.json',
        'core' => 'vendor/zncore/base/src/i18next/__lng__/__ns__.json',
        'dashboard' => 'vendor/znsandbox/yii2-legacy/src/yii2bundle/dashboard/domain/i18next/__lng__/__ns__.json',
    ],
];