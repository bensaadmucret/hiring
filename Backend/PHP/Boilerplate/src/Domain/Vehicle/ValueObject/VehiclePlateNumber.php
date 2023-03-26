<?php

declare(strict_types=1);

namespace Fulll\Domain\Vehicle\ValueObject;

use Stringable;

class VehiclePlateNumber implements Stringable
{
    public function __construct(private string $plateNumber)
    {
        $this->validate();
    }

    public function __toString(): string
    {
        return $this->plateNumber;
    }

    public function equals(self $other): bool
    {
        return $this->plateNumber === $other->plateNumber;
    }

    private function validate(): void
    {
        $isValid = preg_match('/^[A-Z]{2}-[0-9]{3}-[A-Z]{2}$/', $this->plateNumber);

        if (!$isValid) {
            throw new \InvalidArgumentException('Invalid plate number format');
        }
    }
}
