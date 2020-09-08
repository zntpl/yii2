<?php

namespace Packages\RestClient\Domain\Interfaces\Services;

use Illuminate\Support\Collection;
use ZnCore\Base\Domain\Exceptions\UnprocessibleEntityException;
use ZnCore\Base\Domain\Interfaces\Service\CrudServiceInterface;
use ZnCore\Base\Exceptions\NotFoundException;
use Packages\RestClient\Domain\Entities\BookmarkEntity;

interface BookmarkServiceInterface extends CrudServiceInterface
{

    /**
     * @param array $data
     * @return BookmarkEntity
     * @throws UnprocessibleEntityException
     */
    public function createOrUpdate(array $data): BookmarkEntity;

    /**
     * @param string $hash
     * @return BookmarkEntity
     * @throws NotFoundException
     */
    public function addToCollection(string $hash): BookmarkEntity;

    /**
     * @param string $hash
     * @return void
     * @throws NotFoundException
     */
    public function removeByHash(string $hash): void;

    /**
     * @param string $hash
     * @return BookmarkEntity
     * @throws NotFoundException
     */
    public function oneByHash(string $hash): BookmarkEntity;

    /**
     * @param int $projectId
     * @return Collection
     */
    public function allFavoriteByProject(int $projectId): Collection;

    /**
     * @param int $projectId
     * @return Collection
     */
    public function allHistoryByProject(int $projectId): Collection;

    /**
     * @param int $projectId
     * @return void
     */
    public function clearHistory(int $projectId): void;
}

