<?php

$config = [];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

//$config['components']['user']['class'] = 'yii2bundle\account\domain\v3\web\User';
//$config['components']['user']['identityClass'] = 'yii2bundle\account\domain\v3\entities\LoginEntity';

return $config;
