<?php

namespace App\Infrastructure\Payment\Stripe;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait StripeEntity
{
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $stripeId = null;

    public function getStripeId(): ?string
    {
        return $this->stripeId;
    }

    public function setStripeId(?string $stripeId): self
    {
        $this->stripeId = $stripeId;

        return $this;
    }
}
