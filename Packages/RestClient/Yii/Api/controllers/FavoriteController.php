<?php

namespace Packages\RestClient\Yii\Api\controllers;

use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use Packages\RestClient\Domain\Interfaces\Services\BookmarkServiceInterface;
use Packages\RestClient\Domain\Interfaces\Services\ProjectServiceInterface;
use yii\base\Module;
use RocketLab\Bundle\Rest\Base\BaseCrudController;

class FavoriteController extends BaseBookmarkController
{

    public function actionAllByProject($projectId) {
	    return $this->service->allFavoriteByProject($projectId);
    }

}
