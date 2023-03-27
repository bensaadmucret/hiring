<?php

declare(strict_types=1);

namespace Fulll\Domain\Vehicle\ValueObject;

use Fulll\Helpers\UniqueId;
use Ramsey\Uuid\Exception\InvalidUuidStringException;
use Ramsey\Uuid\Uuid;

final class VehicleId
{
    private UniqueId $id;

    public function __construct(UniqueId $id)
    {
        $this->id = $id::generate();
        $this->validate();
    }

    public function equals(self $other): bool
    {
        return $this->id === $other->id;
    }

    public function validate(): void
    {
        if (!$this->id->isValid()) {
            throw new \InvalidArgumentException('Invalid id format');
        }
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function isValid(): bool
    {
        return $this->id->isValid();

    }
}
