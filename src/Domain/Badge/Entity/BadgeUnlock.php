<?php

namespace App\Domain\Badge\Entity;

use App\Domain\Auth\User;
use App\Domain\Badge\Repository\BadgeRepository;
use App\Domain\Badge\Repository\BadgeUnlockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
class BadgeUnlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $createdAt;

    public function __construct(
        #[ORM\ManyToOne(targetEntity: User::class)]
        #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
        private User $owner,

        #[ORM\ManyToOne(targetEntity: Badge::class)]
        #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
        private Badge $badge
    ) {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): BadgeUnlock
    {
        $this->id = $id;

        return $this;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): BadgeUnlock
    {
        $this->owner = $owner;

        return $this;
    }

    public function getBadge(): Badge
    {
        return $this->badge;
    }

    public function setBadge(Badge $badge): BadgeUnlock
    {
        $this->badge = $badge;

        return $this;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): BadgeUnlock
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
