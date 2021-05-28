<?php

declare(strict_types=1);

namespace App;

class Rover
{
    const LEFT = "l";
    const RIGHT = "r";
    const EAST = "E";
    const WEST = "W";
    const NORTH = "N";
    const SOUTH = "S";

    private Direction $directionType;

    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->setDirection($direction);
        $this->y = $y;
        $this->x = $x;
    }

    private function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === self::RIGHT) {
                // Rotate Rover
                switch ($this->direction) {
                    case self::NORTH:
                        $this->setDirection(self::EAST);
                        break;
                    case self::SOUTH:
                        $this->setDirection(self::WEST);
                        break;
                    case self::WEST:
                        $this->setDirection(self::NORTH);
                        break;
                    default:
                        $this->setDirection(self::SOUTH);
                }
            } else if ($command === self::LEFT) {
                // Rotate Rover
                switch ($this->direction) {
                    case self::NORTH:
                        $this->setDirection(self::WEST);
                        break;
                    case self::SOUTH:
                        $this->setDirection(self::EAST);
                        break;
                    case self::WEST:
                        $this->setDirection(self::SOUTH);
                        break;
                    default:
                        $this->setDirection(self::NORTH);
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                switch ($this->direction) {
                    case self::NORTH:
                        $this->y += $displacement;
                        break;
                    case self::SOUTH:
                        $this->y -= $displacement;
                        break;
                    case self::WEST:
                        $this->x -= $displacement;
                        break;
                    default:
                        $this->x += $displacement;
                }
            }
        }
    }
}
