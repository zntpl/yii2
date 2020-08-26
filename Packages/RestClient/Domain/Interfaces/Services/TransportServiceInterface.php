<?php

namespace Packages\RestClient\Domain\Interfaces\Services;

use Packages\RestClient\Domain\Entities\ProjectEntity;
use Psr\Http\Message\ResponseInterface;
use Packages\RestClient\Yii\Web\models\RequestForm;

interface TransportServiceInterface
{

    public function send(ProjectEntity $projectEntity, RequestForm $model): ResponseInterface;

}

