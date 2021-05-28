<?php


namespace App;


class West extends Direction
{
    public function rotateRight(): Direction
    {
        return Direction::createNorth();
    }

    public function rotateLeft(): Direction
    {
        return Direction::createSouth();
    }

    public function move(Coordinates $coordinates, int $displacement): void
    {
        $coordinates->moveAlongX( - $displacement);
    }
}