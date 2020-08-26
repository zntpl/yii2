<?php

namespace Packages\RestClient\Yii\Web;

use Yii;
use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{

    public $defaultRoute = 'request';

    public $formatters = [
        'application/json' => 'Packages\RestClient\Yii\Web\formatters\JsonFormatter',
        'application/xml' => 'Packages\RestClient\Yii\Web\formatters\XmlFormatter',
        'text/html' => 'Packages\RestClient\Yii\Web\formatters\HtmlFormatter',
    ];

    public function behaviors()
    {
        return [
            'as access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [RestClientPermissionEnum::PROJECT_READ],
                    ],
                ],
            ]
        ];
    }

}
