<?php

namespace App\Domain\Fleet\Repository;


use Fulll\Domain\Fleet\ValueObject\FleetId;
use Fulll\Domain\Fleet\Fleet;

interface FleetRepositoryInterface
{
    public function save(Fleet $fleet): void;

    public function findById(FleetId $fleetId): ?Fleet;

    public function findByOwnerId(int $ownerId): array;
}
