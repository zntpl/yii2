<?php

$definitions = [
    'PhpLab\Sandbox\Dashboard\Domain\Interfaces\Services\DocServiceInterface' => 'PhpLab\Sandbox\Dashboard\Domain\Services\DocService',
];

$definitions = array_merge($definitions, require(__DIR__ . '/../../Packages/RestClient/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../Packages/User/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/reference/src/Domain/config/container.php'));
$definitions = array_merge($definitions, require(__DIR__ . '/../../vendor/znbundle/messenger/src/Domain/config/container.php'));

return [
    'definitions' => $definitions,
    'singletons' => [
        //'PhpLab\Core\Libs\I18Next\Interfaces\Services\TranslationServiceInterface' => 'PhpLab\Core\Libs\I18Next\Services\TranslationService',
        'PhpLab\Core\Libs\I18Next\Interfaces\Services\TranslationServiceInterface' => function() {
            $service = new \PhpLab\Core\Libs\I18Next\Services\TranslationService([], Yii::$app->language);
            return $service;
        },
        \Psr\Container\ContainerInterface::class => function() use($definitions) {
            $container = \Illuminate\Container\Container::getInstance();
            foreach ($definitions as $abstract => $concrete) {
                $container->bind($abstract, $concrete);
            }
            return $container;
        },
    ],
];