<?php

namespace ZnBundle\RestClient\Domain\Repositories\Eloquent;

use ZnCore\Domain\Libs\Query;
use ZnCore\Db\Db\Base\BaseEloquentCrudRepository;
use ZnBundle\RestClient\Domain\Entities\ProjectEntity;
use ZnBundle\RestClient\Domain\Interfaces\Repositories\ProjectRepositoryInterface;

class ProjectRepository extends BaseEloquentCrudRepository implements ProjectRepositoryInterface
{

    protected $tableName = 'restclient_project';

    public function getEntityClass(): string
    {
        return ProjectEntity::class;
    }

    public function oneByName(string $projectName): ProjectEntity
    {
        $query = new Query;
        $query->where('name', $projectName);
        return $this->one($query);
    }
}

