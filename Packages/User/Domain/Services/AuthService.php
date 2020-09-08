<?php

namespace Packages\User\Domain\Services;

use Packages\User\Domain\Entities\IdentityEntity;
use Packages\User\Domain\Interfaces\Repositories\IdentityRepositoryInterface;
use Packages\User\Domain\Interfaces\Services\AuthServiceInterface;
use ZnCore\Base\Domain\Base\BaseCrudService;

class AuthService extends BaseCrudService implements AuthServiceInterface
{

    /*public function __construct(IdentityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }*/

    public function getIdentity()
    {
        //$identity = new IdentityEntity;
        //$identity->setId(\Yii::$app->user->identity->getId());
        return \Yii::$app->user->identity;
    }

    public function authByIdentity(object $identity) {

    }
}
