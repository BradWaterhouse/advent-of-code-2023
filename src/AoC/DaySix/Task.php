<?php

declare(strict_types=1);

namespace AoC\DaySix;

class Task
{
    public function partOne(): int
    {
        $races = [
            ['time' => 48, 'recordDistance' => 255],
            ['time' => 87, 'recordDistance' => 1288],
            ['time' => 69, 'recordDistance' => 1117],
            ['time' => 81, 'recordDistance' => 1623]
        ];

        $total = 0;

        foreach ($races as $race) {
            $output[] = $this->getWaysToWin($race['time'], $race['recordDistance']);
        }

        $total +=  \array_reduce(\array_values($output), static function ($result, $value) {
            return $result * $value;
        }, 1);

        return $total;
    }

    public function partTwo(): int
    {
        return $this->getWaysToWin(48876981, 255128811171623);
    }

    public function getWaysToWin(int $raceLengthTime, int $recordDistance): int
    {
        $count = 0;

        for ($time = 0; $time < $raceLengthTime; $time++) {
            $buttonHeldDownTime = $raceLengthTime - $time;
            $remainingRaceTime = $raceLengthTime - $buttonHeldDownTime;

            $speed = $buttonHeldDownTime;
            $totalDistance = $speed * $remainingRaceTime;

            if ($totalDistance > $recordDistance) {
                $count++;
            }
        }

        return $count;
    }
}
