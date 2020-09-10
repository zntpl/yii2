<?php

namespace Packages\RestClient\Yii\Api\controllers;

use Packages\RestClient\Domain\Enums\RestClientPermissionEnum;
use Packages\RestClient\Domain\Interfaces\Services\ProjectServiceInterface;
use yii\base\Module;
use ZnLib\Rest\Yii2\Base\BaseCrudController;

class ProjectController extends BaseCrudController
{

	public function __construct(
	    string $id,
        Module $module,
        array $config = [],
        ProjectServiceInterface $projectService
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

}