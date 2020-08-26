<?php

namespace Packages\RestClient\Yii\Api\controllers;

use Packages\RestClient\Domain\Entities\ProjectEntity;
use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use Packages\RestClient\Domain\Interfaces\Services\ProjectServiceInterface;
use Packages\RestClient\Domain\Interfaces\Services\TransportServiceInterface;
use Packages\RestClient\Yii\Web\helpers\AdapterHelper;
use Packages\RestClient\Yii\Web\models\RequestForm;
use PhpLab\Rest\Helpers\RestResponseHelper;
use Yii;
use yii\base\Module;
use RocketLab\Bundle\Rest\Base\BaseController;
use yii\helpers\ArrayHelper;

class RequestController extends BaseController
{

    private $transportService;
    private $projectService;

	public function __construct(
        string $id,
        Module $module,
        array $config = [],
        TransportServiceInterface $transportService,
        ProjectServiceInterface $projectService
    )
    {
        parent::__construct($id, $module, $config);
        $this->transportService = $transportService;
        $this->projectService = $projectService;
    }

    public function authentication(): array
    {
        return [
            'send',
        ];
    }

    public function access(): array
    {
        return [
            [
                [RestClientPermissionEnum::PROJECT_WRITE], ['send'],
            ],
        ];
    }

    public function actionSend($projectId)
    {
        $body = Yii::$app->request->getBodyParams();
        $form = new RequestForm();
        $form->setAttributes($body);
        $form->baseUrl = $body['baseUrl'];
        AdapterHelper::compactValues($form, 'query', ArrayHelper::getValue($body, 'query', []));
        AdapterHelper::compactValues($form, 'body', ArrayHelper::getValue($body, 'body', []));
        AdapterHelper::compactValues($form, 'header', ArrayHelper::getValue($body, 'header', []));

        /** @var ProjectEntity $projectEntity */
        $projectEntity = $this->projectService->oneById($projectId);

        $responseEntity = $this->transportService->send($projectEntity, $form);

        Yii::$app->response->setStatusCode($responseEntity->getStatusCode());
        Yii::$app->response->headers->removeAll();
        foreach ($responseEntity->getHeaders() as $headerKey => $headerValue) {
            Yii::$app->response->headers->add($headerKey, $headerValue[0]);
        }

        return RestResponseHelper::getDataFromResponse($responseEntity);
    }

}