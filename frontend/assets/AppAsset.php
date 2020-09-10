<?php

namespace frontend\assets;

use ZnSandbox\Sandbox\Html\Yii2\Widgets\Toastr\assets\ToastrAsset;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        ToastrAsset::class,
    ];
}
