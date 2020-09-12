<?php

use ZnSandbox\Sandbox\Yii2\App\Kernel;
use ZnSandbox\Sandbox\Yii2\App\Loader\AdvancedLoader;
use ZnSandbox\Sandbox\Yii2\App\Rails;

$_ENV['APP_ENV'] = 'test';
ZnCore\Base\Libs\Env\DotEnvHelper::init();
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../console');
$_ENV['APP_NAME'] = 'console';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();
Rails::initAll($_ENV['PROJECT_DIR']);

new yii\console\Application($mainConfig);
restore_error_handler();
