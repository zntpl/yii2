<?php

namespace ZnBundle\RestClient\Yii\Web;

use Yii;
use ZnBundle\RestClient\Domain\Enums\RestClientPermissionEnum;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{

    public $defaultRoute = 'request';

    public $formatters = [
        'application/json' => 'ZnBundle\RestClient\Yii\Web\formatters\JsonFormatter',
        'application/xml' => 'ZnBundle\RestClient\Yii\Web\formatters\XmlFormatter',
        'text/html' => 'ZnBundle\RestClient\Yii\Web\formatters\HtmlFormatter',
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
