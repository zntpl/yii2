<?php

namespace Packages\RestClient\Domain\Interfaces\Repositories;

use PhpLab\Core\Domain\Interfaces\Repository\CrudRepositoryInterface;
use PhpLab\Core\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\ProjectEntity;

interface ProjectRepositoryInterface extends CrudRepositoryInterface
{

    /**
     * @param string $projectName
     * @return ProjectEntity
     * @throws NotFoundException
     */
    public function oneByName(string $projectName): ProjectEntity;

}
