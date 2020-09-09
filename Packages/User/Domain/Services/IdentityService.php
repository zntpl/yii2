<?php

namespace Packages\User\Domain\Services;

use Packages\User\Domain\Interfaces\Repositories\IdentityRepositoryInterface;
use Packages\User\Domain\Interfaces\Services\IdentityServiceInterface;
use ZnCore\Domain\Base\BaseCrudService;

class IdentityService extends BaseCrudService implements IdentityServiceInterface
{

    public function __construct(IdentityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function updateById($id, $data)
    {
        unset($data['password']);
        return parent::updateById($id, $data);
    }
}
