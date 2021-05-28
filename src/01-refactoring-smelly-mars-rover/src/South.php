<?php


namespace App;


class South extends Direction
{
    public function rotateRight(): Direction
    {
        return Direction::createWest();
    }

    public function rotateLeft(): Direction
    {
        return Direction::createEast();
    }

    public function move(Coordinates $coordinates, int $displacement): void
    {
        $coordinates->moveAlongY( - $displacement);
    }
}