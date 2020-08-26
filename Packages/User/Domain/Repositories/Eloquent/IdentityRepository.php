<?php

namespace Packages\User\Domain\Repositories\Eloquent;

use PhpLab\Eloquent\Db\Base\BaseEloquentCrudRepository;
use Packages\User\Domain\Interfaces\Repositories\IdentityRepositoryInterface;
use Packages\User\Domain\Entities\IdentityEntity;

class IdentityRepository extends BaseEloquentCrudRepository implements IdentityRepositoryInterface
{

    protected $tableName = 'user_identity';

    public function getEntityClass(): string
    {
        return IdentityEntity::class;
    }
}

