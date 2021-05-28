<?php

namespace App;

class East extends Direction
{
    public function rotateRight(): Direction
    {
        return Direction::createSouth();
    }

    public function rotateLeft(): Direction
    {
        return Direction::createNorth();
    }

    public function move(Coordinates $coordinates, int $displacement): void
    {
        $coordinates->moveAlongX( $displacement);
    }

}