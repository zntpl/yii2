<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use ZnCore\Base\Legacy\Yii\Helpers\FileHelper;
use ZnCore\Base\Libs\Benchmark;
use ZnLib\Rest\Helpers\CorsHelper;
use RocketLab\Bundle\App\Libs\Kernel;
use RocketLab\Bundle\App\Libs\Loader\AdvancedLoader;
use RocketLab\Bundle\App\Libs\Rails;

require __DIR__ . '/../../vendor/autoload.php';
//require_once __DIR__ . '/../../common/Bootstrap/autoload.php';

/*register_shutdown_function(function (){
    $file = __DIR__ . '/../../common/runtime/logs/usedClasses/'.time().'.json';
    $classes = get_declared_classes();

    $all = [];
    foreach ($classes as $class) {
        $reflection = new ReflectionClass($class);
        if($reflection->isUserDefined()) {
            $all['user'][] = $class;
        } else {
            $all['system'][] = $class;
        }
    }
    $json = json_encode($all, JSON_PRETTY_PRINT);
    FileHelper::save($file, $json);
});*/

CorsHelper::autoload();

ZnCore\Base\Libs\Env\DotEnvHelper::init(__DIR__ . '/../..');
$_ENV['PROJECT_DIR'] = realpath(__DIR__ . '/../..');
$_ENV['APP_DIR'] = realpath(__DIR__ . '/..');
$_ENV['APP_NAME'] = 'frontend';

$loader = new AdvancedLoader($_ENV);
$kernel = new Kernel($_ENV, $loader);
$mainConfig = $kernel->run();
Rails::initAll($_ENV['PROJECT_DIR']);

$application = new yii\web\Application($mainConfig);

/*for($i=0; $i<100; $i++) {
    $arr = [];
    for($j=0; $j<1000; $j++) {
        $arr[] = [
            md5($i),
            mt_rand(1, 100),
            mt_rand(0, 1),
        ];
        $application->db->createCommand()->batchInsert('test', ['name', 'cat_id', 'is_deleted'], $arr)->execute();
    }
}*/

//Benchmark::begin('is_deleted');
//$application->db->createCommand('SELECT * FROM "test" WHERE "is_deleted" = \'0\' /*ORDER BY "cat_id"*/ LIMIT 50')->queryAll();
//Benchmark::end('is_deleted');
//
//Benchmark::begin('cat_id');
//$application->db->createCommand('SELECT * FROM "test" WHERE "cat_id" = \'1\' /*ORDER BY "is_deleted"*/ LIMIT 50')->queryAll();
//Benchmark::end('cat_id');

//dd(Benchmark::allFlat());

$application->run();
