<?php

declare(strict_types=1);

namespace Fulll\Domain\Vehicle;

use Fulll\Domain\Vehicle\ValueObject\VehicleId;
use Fulll\Domain\Vehicle\ValueObject\VehiclePlateNumber;

class Vehicle
{
    private $id;
    private $plateNumber;

    public function __construct(VehicleId $id, VehiclePlateNumber $plateNumber)
    {
        $this->id = $id;
        $this->plateNumber = $plateNumber;
    }

    public function getId(): VehicleId
    {
        return $this->id;
    }

    public function getPlateNumber(): VehiclePlateNumber
    {
        return $this->plateNumber;
    }
}