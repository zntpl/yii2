<?php

namespace Packages\RestClient\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnCore\Base\Domain\Interfaces\Service\CrudServiceInterface;
use ZnCore\Base\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\AuthorizationEntity;

interface AuthorizationServiceInterface extends CrudServiceInterface
{

    /**
     * @param int $projectId
     * @param string|null $type
     * @return Collection
     */
    public function allByProjectId(int $projectId, string $type = null): Collection;

    /**
     * @param int $projectId
     * @param string $username
     * @param string|null $type
     * @return AuthorizationEntity
     * @throws NotFoundException
     */
    public function oneByUsername(int $projectId, string $username, string $type = null): AuthorizationEntity;

}
