<?php

declare(strict_types=1);

namespace AoC\DayOne;

class Task
{
    public function partOne(): int
    {
        $file = file(__DIR__ . '/input.txt');

        $results = [];

        foreach ($file as $line) {
            $digits = [];
            $valueArray = \str_split(\trim($line));

            foreach ($valueArray as $character) {
                if (\is_numeric($character)) {
                    $digits[] = $character;
                }
            }

            $firstDigit = $digits[0];
            $lastDigit = $digits[\count($digits) - 1];

            $results[] = $firstDigit . $lastDigit;
        }

        return \array_sum($results);
    }

    public function partTwo(): int
    {
        $file = file(__DIR__ . '/input.txt');

        $total = 0;

        foreach ($file as $line) {
            $positions = [];

            $positions = $this->findNumericalPositions($line, $positions);
            $positions = $this->findNumericalStringPositions($line, $positions);

            ksort($positions);

            $output = (int) ($positions[array_key_first($positions)] . $positions[array_key_last($positions)]);

            $total += $output;
        }

        return $total;
    }

    private function findNumericalPositions(string $line, array $positions): array
    {
        $characters = \str_split(trim($line));

        foreach ($characters as $position => $character) {
            if (\is_numeric($character)) {
                $positions[$position] = (int) $character;
            }
        }

        return $positions;
    }

    private function findNumericalStringPositions(string $line, array $positions): array
    {
        foreach (self::stringToValue() as $numericalString => $number) {
            if (str_contains($line, $numericalString)) {
                $positions[strpos($line, $numericalString)] = $number;
                $positions[strrpos($line, $numericalString)] = $number;
            }
        }

        return $positions;
    }

    private static function stringToValue(): array
    {
        return [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9
        ];
    }
}
