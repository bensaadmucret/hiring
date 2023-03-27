<?php

declare(strict_types=1);

namespace Fulll\Domain\Vehicle;

use Fulll\Domain\Vehicle\ValueObject\VehicleId;
use Fulll\Domain\Vehicle\ValueObject\VehiclePlateNumber;
use Fulll\Helpers\GeneratePlateNumber;
use Fulll\Helpers\UniqueId;
use Stringable;

final class Vehicle implements Stringable
{
    private UniqueId $id;
    private GeneratePlateNumber $plateNumber;

    public function __construct(GeneratePlateNumber $plateNumber, UniqueId $uniqueId)
    {
        $this->id = $uniqueId::generate();
        $this->plateNumber = new GeneratePlateNumber();
    }

    public function getId(): UniqueId
    {
        return $this->id;
    }

    public function getPlateNumber(): GeneratePlateNumber
    {
        return $this->plateNumber;
    }

    public function equals(self $other): bool
    {
        return $this->id->equals($other->id);
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}