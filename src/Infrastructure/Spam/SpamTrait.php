<?php

namespace App\Infrastructure\Spam;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait SpamTrait
{
    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => true])]
    private bool $spam = false;

    public function isSpam(): bool
    {
        return $this->spam;
    }

    public function setSpam(bool $spam): self
    {
        $this->spam = $spam;

        return $this;
    }
}
