<?php

namespace Packages\RestClient\Domain\Repositories\Eloquent;

use PhpLab\Eloquent\Db\Base\BaseEloquentCrudRepository;
use Packages\RestClient\Domain\Entities\EnvironmentEntity;
use Packages\RestClient\Domain\Interfaces\Repositories\EnvironmentRepositoryInterface;

class EnvironmentRepository extends BaseEloquentCrudRepository implements EnvironmentRepositoryInterface
{

    public function tableName() : string
    {
        return 'restclient_environment';
    }

    public function getEntityClass() : string
    {
        return EnvironmentEntity::class;
    }


}

