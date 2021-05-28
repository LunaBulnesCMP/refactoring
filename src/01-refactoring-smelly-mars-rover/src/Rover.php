<?php

declare(strict_types=1);
namespace App;

class Rover
{
    const LEFT = "l";
    const RIGHT = "r";

    private Direction $directionType;
    private Coordinates $coordinates;


    public function __construct(int $x, int $y, string $direction)
    {
        $this->setDirection($direction);
        $this->setCoordinates($x, $y);
    }
    private function setDirection(string $direction): void
    {
        $this->directionType = new Direction($direction);
    }

    private function setCoordinates(int $x, int $y): void
    {

        $this->coordinates = new Coordinates($x, $y);
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === self::RIGHT) {
                // Rotate Rover
                if ($this->isFacingNorth()) {
                    $this->setDirection(Direction::EAST);
                } elseif ($this->isFacingSouth()) {
                    $this->setDirection(Direction::WEST);
                } elseif ($this->isFacingWest()) {
                    $this->setDirection(Direction::NORTH);
                } else {
                    $this->setDirection(Direction::SOUTH);
                }
            } else if ($command === self::LEFT) {
                // Rotate Rover
                if ($this->isFacingNorth()) {
                    $this->setDirection(Direction::WEST);
                } elseif ($this->isFacingSouth()) {
                    $this->setDirection(Direction::EAST);
                } elseif ($this->isFacingWest()) {
                    $this->setDirection(Direction::SOUTH);
                } else {
                    $this->setDirection(Direction::NORTH);
                }
            } else {
                // Displace Rover
                $displacement1 = -1;
                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->isFacingNorth()) {
                    $this->setCoordinates($this->coordinates->x(), $this->coordinates->y() + $displacement);
                } elseif ($this->isFacingSouth()) {
                    $this->setCoordinates($this->coordinates->x(), $this->coordinates->y() - $displacement);
                } elseif ($this->isFacingWest()) {
                    $this->setCoordinates($this->coordinates->x() - $displacement, $this->coordinates->y());
                } else {
                    $this->setCoordinates($this->coordinates->x() + $displacement, $this->coordinates->y());
                }
            }
        }
    }

    private function isFacingNorth(): bool
    {
        return $this->directionType->isNorth();
    }

    private function isFacingSouth(): bool
    {
        return $this->directionType->isSouth();
    }
    private function isFacingWest(): bool
    {
        return $this->directionType->isWest();
    }
}