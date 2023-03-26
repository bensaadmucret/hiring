<?php

declare(strict_types=1);

namespace Fulll\Domain\Fleet;

use Fulll\Domain\Fleet\ValueObject\FleetId;
use Fulll\Domain\Vehicle\ValueObject\VehicleId;
use Fulll\Domain\Vehicle\Vehicle;

class Fleet
{
    private FleetId $id;
    private string $name;
    private array $vehicles;

    public function __construct(FleetId $id, string $name, array $vehicles = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->vehicles = $vehicles;
    }

    public function getId(): FleetId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        if (in_array($vehicle, $this->vehicles)) {
            throw new \InvalidArgumentException('This vehicle is already registered in the fleet');
        }

        $this->vehicles[] = $vehicle;
    }

    public function removeVehicle(VehicleId $vehicleId): void
    {
        $this->vehicles = array_filter($this->vehicles, function (Vehicle $vehicle) use ($vehicleId) {
            return !$vehicle->getId()->equals($vehicleId);
        });
    }
}