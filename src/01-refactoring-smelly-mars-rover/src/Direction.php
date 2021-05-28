<?php

namespace App;

abstract class Direction
{
    private const WEST = "W";
    private const NORTH = "N";
    private const SOUTH = "S";

    abstract public function rotateRight(): Direction;

    abstract public function rotateLeft(): Direction;

    abstract public function move(Coordinates $coordinates, int $displacement): void;

    public static function create(string $direction)
    {
        if ($direction === Direction::NORTH) {
            return self::createNorth();
        }
        if ($direction === Direction::SOUTH) {
            return self::createSouth();
        }
        if ($direction === Direction::WEST) {
            return self::createWest();
        }
        return self::createEast();
    }

    protected static function createNorth(): North
    {
        return new North();
    }

    protected static function createSouth(): South
    {
        return new South();
    }

    protected static function createWest(): West
    {
        return new West();
    }

    protected static function createEast(): East
    {
        return new East();
    }
}
