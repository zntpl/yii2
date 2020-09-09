<?php

namespace Packages\User\Domain;

use ZnCore\Domain\Interfaces\DomainInterface;

class Domain implements DomainInterface
{

    public function getName()
    {
        return 'user';
    }


}

