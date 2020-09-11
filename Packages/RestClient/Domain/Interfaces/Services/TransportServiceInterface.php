<?php

namespace ZnBundle\RestClient\Domain\Interfaces\Services;

use ZnBundle\RestClient\Domain\Entities\ProjectEntity;
use Psr\Http\Message\ResponseInterface;
use ZnBundle\RestClient\Yii\Web\models\RequestForm;

interface TransportServiceInterface
{

    public function send(ProjectEntity $projectEntity, RequestForm $model): ResponseInterface;

}

