<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Illuminate\Container\Container;
use ZnCore\Base\Libs\Env\DotEnvHelper;
use ZnLib\Rest\Helpers\CorsHelper;
use ZnLib\Rest\Helpers\RestApiControllerHelper;
use Symfony\Component\Routing\RouteCollection;

require_once __DIR__ . '/../../common/Bootstrap/autoload.php';
DotEnvHelper::init(__DIR__ . '/../..');

CorsHelper::autoload();

$container = Container::getInstance();
$routeCollection = new RouteCollection;

require_once __DIR__ . '/../../vendor/zncrypt/tunnel/src/Symfony/config/bootstrap.php';

$response = RestApiControllerHelper::run($routeCollection, $container);
$response->send();
