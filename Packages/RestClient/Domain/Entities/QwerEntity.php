<?php

namespace Packages\RestClient\Domain\Entities;

use Symfony\Component\Validator\Constraints as Assert;
use PhpLab\Core\Domain\Interfaces\Entity\ValidateEntityInterface;

class QwerEntity implements ValidateEntityInterface
{

    private $title = null;

    public function validationRules()
    {
        return [];
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }


}

