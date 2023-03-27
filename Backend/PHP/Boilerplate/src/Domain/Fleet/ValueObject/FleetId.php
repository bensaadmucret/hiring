<?php

declare(strict_types=1);

namespace Fulll\Domain\Fleet\ValueObject;

use Fulll\Helpers\UniqueId;
use InvalidArgumentException;

final class FleetId
{
    private UniqueId $uuid;

    public function __construct()
    {
        $this->uuid = UniqueId::generate();
        $this->validate();
    }

    public function equals(self $other): bool
    {
        return $this->uuid === $other->uuid;
    }

    public function validate(): void
    {
        $isValid = preg_match('/^[a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/i', $this->uuid);

        if (!$isValid) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid UUID.', $this->uuid));
        }
    }

    public function isValid(): bool
    {
        return $this->uuid->isValid();
    }

}
