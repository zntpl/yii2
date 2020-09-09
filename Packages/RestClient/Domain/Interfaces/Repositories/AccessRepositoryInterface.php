<?php

namespace Packages\RestClient\Domain\Interfaces\Repositories;

use Illuminate\Support\Collection;
use ZnCore\Domain\Interfaces\Repository\CrudRepositoryInterface;
use ZnCore\Base\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\AccessEntity;

interface AccessRepositoryInterface extends CrudRepositoryInterface
{

    /**
     * @param int $projectId
     * @param int $userId
     * @return AccessEntity
     * @throws NotFoundException
     */
    public function oneByTie(int $projectId, int $userId): AccessEntity;

    public function allByUserId(int $userId): Collection;

}
