<?php

declare(strict_types=1);

namespace AoC\DayTwo;

class Task
{
    public function partOne(): int
    {
        $file = file(__DIR__ . '/input.txt');

        $games = self::formatInput($file);

        $invalidGameIds = [];

        foreach ($games as $id => $game) {
            foreach ($game as $pickup) {
                $red = $pickup['red'] ?? 0;
                $blue = $pickup['blue'] ?? 0;
                $green = $pickup['green'] ?? 0;

                if ($red > 12 || $blue > 14 || $green > 13) {
                    $invalidGameIds[] = $id;
                }
            }
        }

        $validGameIds = self::findMissingNumbers(array_unique($invalidGameIds));

        return \array_sum($validGameIds);
    }

    public function partTwo(): int
    {
        $file = file(__DIR__ . '/input.txt');
        $games = self::formatInput($file);

        $minimumCubes = [];

        foreach ($games as $game) {
            $maxRed = $maxBlue = $maxGreen = 0;

            foreach ($game as $pickup) {
                $maxRed = max($pickup['red'] ?? 0, $maxRed);
                $maxBlue = max($pickup['blue'] ?? 0, $maxBlue);
                $maxGreen = max($pickup['green'] ?? 0, $maxGreen);
            }

            $minimumCubes[] = $maxRed * $maxBlue * $maxGreen;
        }

        return array_sum($minimumCubes);
    }

    private static function formatInput(array $file): array
    {
        $formatted = [];

        foreach ($file as $line) {
            $startIndex = \strpos($line, ':');
            $id = (int)\str_replace('Game ', '', \substr($line, 0, $startIndex));

            $game = explode(';', substr($line, $startIndex + 1));

            foreach ($game as $index => $pickUp) {
                $cubes = explode(',', $pickUp);

                foreach ($cubes as $cube) {
                    preg_match('/(\d+)\s*([a-zA-Z]+)/', $cube, $matches);

                    $number = (int)$matches[1];
                    $color = $matches[2];

                    $formatted[$id][$index][$color] = $number;
                }
            }
        }

        return $formatted;
    }

    private static function findMissingNumbers(array $numbers): array
    {
        $allNumbers = range(1, 100);

        $missingNumbers = array_diff($allNumbers, $numbers);

        return array_values($missingNumbers);
    }
}
