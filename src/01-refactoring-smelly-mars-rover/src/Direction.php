<?php

namespace App;

class Direction
{
    public const EAST = "E";
    public const WEST = "W";
    public const NORTH = "N";
    public const SOUTH = "S";

    private string $direction;

    public function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public function isNorth(): bool
    {
        return $this->direction === self::NORTH;
    }

    public function isSouth(): bool
    {
        return $this->direction === self::SOUTH;
    }

    public function isWest(): bool
    {
        return $this->direction === self::WEST;
    }
}
