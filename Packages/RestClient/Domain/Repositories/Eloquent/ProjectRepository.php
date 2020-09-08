<?php

namespace Packages\RestClient\Domain\Repositories\Eloquent;

use ZnCore\Base\Domain\Libs\Query;
use ZnCore\Db\Db\Base\BaseEloquentCrudRepository;
use Packages\RestClient\Domain\Entities\ProjectEntity;
use Packages\RestClient\Domain\Interfaces\Repositories\ProjectRepositoryInterface;

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

