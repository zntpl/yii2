<?php

namespace ZnBundle\RestClient\Domain\Services;

use Illuminate\Support\Collection;
use ZnCore\Domain\Base\BaseCrudService;
use ZnBundle\RestClient\Domain\Entities\AuthorizationEntity;
use ZnBundle\RestClient\Domain\Interfaces\Repositories\AuthorizationRepositoryInterface;
use ZnBundle\RestClient\Domain\Interfaces\Services\AuthorizationServiceInterface;

class AuthorizationService extends BaseCrudService implements AuthorizationServiceInterface
{

    public function __construct(AuthorizationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function allByProjectId(int $projectId, string $type = null): Collection
    {
        return $this->getRepository()->allByProjectId($projectId, $type);
    }

    public function oneByUsername(int $projectId, string $username, string $type = null): AuthorizationEntity
    {
        return $this->getRepository()->oneByUsername($projectId, $username, $type);
    }

}
