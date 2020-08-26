<?php

namespace Packages\RestClient\Domain\Services;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use PhpLab\Core\Domain\Base\BaseService;
use PhpLab\Core\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\ProjectEntity;
use Packages\RestClient\Domain\Interfaces\Services\AuthorizationServiceInterface;
use Packages\RestClient\Domain\Interfaces\Services\TransportServiceInterface;
use Packages\RestClient\Yii\Web\helpers\AdapterHelper;
use Packages\RestClient\Yii\Web\models\RequestForm;
use PhpLab\Rest\Contract\Authorization\BearerAuthorization;
use PhpLab\Rest\Contract\Client\RestClient;
use Psr\Http\Message\ResponseInterface;

class TransportService extends BaseService implements TransportServiceInterface
{

    private $authorizationService;

    public function __construct(AuthorizationServiceInterface $authorizationService)
    {
        $this->authorizationService = $authorizationService;
    }

    public function send(ProjectEntity $projectEntity, RequestForm $model): ResponseInterface
    {
        $config = [
            'base_uri' => $model->baseUrl. '/',
            //'base_uri' => $projectEntity->getUrl() . '/',
        ];
        $guzzleClient = new Client($config);
        $authAgent = new BearerAuthorization($guzzleClient);
        $restClient = new RestClient($guzzleClient, $authAgent);
        if ($model->authorization) {
            try {
                $authEntity = $this->authorizationService->oneByUsername($projectEntity->getId(), $model->authorization, 'bearer');
                $restClient->getAuthAgent()->authByLogin($authEntity->getUsername(), $authEntity->getPassword());
            } catch (NotFoundException $e) {
            }
        }
        $options = $this->extractOptions($model);
        $response = $restClient->sendRequest($model->method, $model->endpoint, $options);
        return $response;
    }

    private function extractOptions(RequestForm $model): array
    {
        $bodyParam = $model->files ? RequestOptions::MULTIPART : RequestOptions::FORM_PARAMS;

        $options = [];
        $query = AdapterHelper::collapseFields($model, 'query');
        if ($query) {
            $options[RequestOptions::QUERY] = $query;
        }
        $header = AdapterHelper::collapseFields($model, 'header');
        if ($header) {
            $options[RequestOptions::HEADERS] = $header;
        }
        $body = AdapterHelper::collapseFields($model, 'body');
        if ($body) {
            if($bodyParam == RequestOptions::MULTIPART) {
                foreach ($body as $name => $value) {
                    $options[$bodyParam][] = [
                        'name'     => $name,
                        'contents' => $value,
                    ];
                }
            } else {
                $options[$bodyParam] = $body;
            }
        }
        if ($model->files) {
            foreach ($model->files as $fileUpload) {
                //dd($model->files);
                $options[$bodyParam][] = [
                    'name'     => $fileUpload->name,
                    'contents' => fopen($fileUpload->tempName, 'r'),
                ];
            }
        }
        return $options;
    }

}

