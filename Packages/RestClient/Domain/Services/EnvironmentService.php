<?php

namespace Packages\RestClient\Domain\Services;

use Packages\RestClient\Domain\Interfaces\Services\EnvironmentServiceInterface;
use Packages\RestClient\Domain\Interfaces\Repositories\EnvironmentRepositoryInterface;
use PhpLab\Core\Domain\Base\BaseCrudService;
use PhpLab\Core\Domain\Libs\Query;

class EnvironmentService extends BaseCrudService implements EnvironmentServiceInterface
{

    public function __construct(EnvironmentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function allByProjectId(int $projectId, Query $query = null) {
        $query = Query::forge($query);
        $query->where('project_id', $projectId);
        return $this->all($query);
    }
}
