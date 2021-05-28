<?php

declare(strict_types=1);
namespace App;

class Rover
{
    const LEFT = "l";
    const RIGHT = "r";
    const FRONT = "f";
    const DISPLACEMENT = 1;

    private Direction $direction;
    private Coordinates $coordinates;


    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = Direction::create($direction);
        $this->coordinates = new Coordinates($x, $y);
    }

    public function receive(string $commandsSequence): void
    {
        $commands = $this->extractCommands($commandsSequence);
        $this->process($commands);
    }

    private function extractCommands(string $commandsSequence): array
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        $commands = [];

        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $commands[] = substr($commandsSequence, $i, 1);
        }

        return $commands;
    }

    private function process(array $commands): void
    {
        foreach ($commands as $command) {
            if ($command === self::RIGHT) {
                $this->direction = $this->direction->rotateRight();
            } else {
                if ($command === self::LEFT) {
                    $this->direction = $this->direction->rotateLeft();
                } else {
                    if ($command === self::FRONT) {
                        $this->direction->move($this->coordinates, self::DISPLACEMENT);
                    } else {
                        $this->direction->move($this->coordinates, -self::DISPLACEMENT);
                    }
                }
            }
        }
    }
}
