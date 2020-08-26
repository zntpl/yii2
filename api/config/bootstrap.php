<?php

define('API_VERSION', '1');
define('API_VERSION_STRING', 'v1');

\PhpLab\Rest\Helpers\CorsHelper::autoload();

Yii::$container->set('yii\web\ErrorHandler', [
    'class' => 'yii2bundle\error\domain\web\ErrorHandler',
    /*'filters' => [
        'yii2bundle\rbac\domain\filters\PermissionException',
    ],*/
]);
