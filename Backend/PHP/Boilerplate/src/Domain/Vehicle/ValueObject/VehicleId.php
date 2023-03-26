<?php

declare(strict_types=1);

namespace Fulll\Domain\Vehicle\ValueObject;

use Stringable;


class VehicleId implements Stringable
{
    private string $id;

    public function __construct(string $id)
    {
        if (!preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){3}-[a-f\d]{12}$/i', $id)) {
            throw new \InvalidArgumentException(sprintf('Invalid UUID format for id "%s"', $id));
        }

        $this->id = $id;
    }

    public function equals(self $other): bool
    {
        return $this->id === $other->id;
    }


    public function __toString(): string
    {
        return $this->id;
    }
}
