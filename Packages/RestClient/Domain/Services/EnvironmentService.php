<?php

namespace ZnBundle\RestClient\Domain\Services;

use ZnBundle\RestClient\Domain\Interfaces\Services\EnvironmentServiceInterface;
use ZnBundle\RestClient\Domain\Interfaces\Repositories\EnvironmentRepositoryInterface;
use ZnCore\Domain\Base\BaseCrudService;
use ZnCore\Domain\Libs\Query;

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
