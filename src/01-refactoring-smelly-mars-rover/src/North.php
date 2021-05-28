<?php


namespace App;


class North extends Direction
{
    public function rotateRight(): Direction
    {
        return Direction::createEast();
    }

    public function rotateLeft(): Direction
    {
        return Direction::createWest();
    }

    public function move(Coordinates $coordinates, int $displacement): void
    {
        $coordinates->moveAlongY( $displacement);
    }
}