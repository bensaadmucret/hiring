<?php

declare(strict_types=1);

namespace Fulll\Domain\Fleet\ValueObject;

use InvalidArgumentException;
use Stringable;

class FleetId implements Stringable
{
    private string $id;

    public function __construct(string $id)
    {
        if (!preg_match('/^[a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/i', $id)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid UUID.', $id));
        }

        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->id;
    }
}
