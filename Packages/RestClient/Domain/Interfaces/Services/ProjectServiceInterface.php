<?php

namespace Packages\RestClient\Domain\Interfaces\Services;

use ZnCore\Base\Domain\Interfaces\Service\CrudServiceInterface;
use ZnCore\Base\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\ProjectEntity;

interface ProjectServiceInterface extends CrudServiceInterface
{

    public function allWithoutUserId(int $userId);

    public function allByUserId(int $userId);

    public function isAllowProject(int $projectId, int $userId);

    /**
     * @param string $projectName
     * @return ProjectEntity
     * @throws NotFoundException
     */
    public function oneByName(string $projectName): ProjectEntity;

    /**
     * @param string $tag
     * @return string
     * @throws NotFoundException
     */
    public function projectNameByHash(string $tag): string;

}
