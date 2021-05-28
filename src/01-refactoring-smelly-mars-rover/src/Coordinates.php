<?php


namespace App;


class Coordinates
{

    private $x;
    private $y;

    public function __construct(int $x, int $y)
    {

        $this->x = $x;
        $this->y = $y;
    }


    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function moveAlongX($displacement) {
        $this->x += $displacement;
    }

    public function moveAlongY($displacement) {
        $this->y += $displacement;
    }
}