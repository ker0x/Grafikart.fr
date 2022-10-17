<?php

namespace App\Domain\Application\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: '`option`', indexes: [
    new ORM\Index(columns: ['key'], name: 'key_idx')
])]
class Option
{
    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    private string $key;

    #[ORM\Column(type: Types::TEXT)]
    private string $value;

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Option
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Option
    {
        $this->value = $value;

        return $this;
    }
}
