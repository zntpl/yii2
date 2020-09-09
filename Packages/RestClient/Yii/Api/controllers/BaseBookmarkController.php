<?php

namespace Packages\RestClient\Yii\Api\controllers;

use ZnCore\Domain\Helpers\QueryHelper;
use ZnCore\Base\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use Packages\RestClient\Domain\Interfaces\Services\BookmarkServiceInterface;
use yii\base\Module;
use RocketLab\Bundle\Rest\Base\BaseCrudController;
use yii\web\NotFoundHttpException;

/**
 * Class BaseBookmarkController
 * @package Packages\RestClient\Yii\Api\controllers
 *
 * @property-read BookmarkServiceInterface $service
 */
class BaseBookmarkController extends BaseCrudController
{

	public function __construct(
	    string $id,
        Module $module,
        array $config = [],
        BookmarkServiceInterface $projectService
    )
    {
        parent::__construct($id, $module, $config);
        $this->service = $projectService;
    }

    public function authentication(): array
    {
        return [
            'create',
            'update',
            'delete',
            'index',
            'view',
        ];
    }

    public function access(): array
    {
        return [
            [
                [RestClientPermissionEnum::PROJECT_WRITE], ['create', 'update', 'delete'],
            ],
            [
                [RestClientPermissionEnum::PROJECT_READ], ['index', 'view'],
            ],
        ];
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete']);

        return $actions;
    }

    protected function normalizerContext(): array
    {
        return [
            /*AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'queryData',
                'bodyData',
                'headerData',
                'status',
            ]*/
        ];
    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->getQueryParam('id');
        $this->service->removeByHash($id);
        \Yii::$app->response->setStatusCode(204);
    }

    public function actionView($id)
    {
        $queryParams = \Yii::$app->request->get();
        unset($queryParams['id']);
        $query = QueryHelper::getAllParams($queryParams);
        try {
            $entity = $this->service->oneByHash($id, $query);
            return $entity;
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException();
        }
    }
}
