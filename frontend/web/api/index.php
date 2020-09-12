<?php

use ZnSandbox\Sandbox\Yii2\App\Kernel;
use ZnSandbox\Sandbox\Yii2\App\Loader\AdvancedLoader;
use ZnSandbox\Sandbox\Yii2\App\Rails;

require __DIR__ . '/../../../vendor/autoload.php';

ZnCore\Base\Libs\Env\DotEnvHelper::init(__DIR__ . '/../../..');
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/../../..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../../../api');
$_ENV['APP_NAME'] = 'api';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();
Rails::initAll($_ENV['PROJECT_DIR']);

$application = new yii\web\Application($mainConfig);
$application->run();