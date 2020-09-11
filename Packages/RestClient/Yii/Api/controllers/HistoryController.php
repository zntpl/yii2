<?php

namespace ZnBundle\RestClient\Yii\Api\controllers;

use ZnBundle\RestClient\Domain\Enums\RestClientPermissionEnum;
use ZnBundle\RestClient\Domain\Interfaces\Services\BookmarkServiceInterface;
use ZnBundle\RestClient\Domain\Interfaces\Services\ProjectServiceInterface;
use yii\base\Module;
use ZnLib\Rest\Yii2\Base\BaseCrudController;

class HistoryController extends BaseBookmarkController
{

    public function actionAllByProject($projectId) {
	    return $this->service->allHistoryByProject($projectId);
    }

    public function actionAddToFavorite() {
        $this->service->addToCollection(\Yii::$app->request->post('hash'));
    }
}
