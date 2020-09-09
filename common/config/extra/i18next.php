<?php

return [
    'defaultLanguage' => 'ru',
    'fallbackLanguage' => 'en',
    'bundles' => [
        'app' => 'common/i18next/__lng__/__ns__.json',
        'account' => 'vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/account/domain/v3/i18next/__lng__/__ns__.json',
        'user' => 'vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/account/domain/v3/i18next/__lng__/__ns__.json',
        'storage' => 'vendor/znsandbox/sandbox/src/YiiLegacy/yubundle/storage/domain/v1/i18next/__lng__/__ns__.json',
        'restclient' => 'Packages/RestClient/Domain/i18next/__lng__/__ns__.json',
        'core' => 'vendor/zncore/base/src/i18next/__lng__/__ns__.json',
        'dashboard' => 'vendor/znsandbox/sandbox/src/YiiLegacy/yii2bundle/dashboard/domain/i18next/__lng__/__ns__.json',
    ],
];