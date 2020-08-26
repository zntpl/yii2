<?php

use RocketLab\Bundle\App\Libs\Kernel;
use RocketLab\Bundle\App\Libs\Loader\AdvancedLoader;
use RocketLab\Bundle\App\Libs\Rails;

$_ENV['APP_ENV'] = 'test';
PhpLab\Core\Libs\Env\DotEnvHelper::init();
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/../console');
$_ENV['APP_NAME'] = 'console';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();
Rails::initAll($_ENV['PROJECT_DIR']);

new yii\console\Application($mainConfig);
restore_error_handler();
