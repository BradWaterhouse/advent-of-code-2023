<?php

declare(strict_types=1);

namespace AoC\DayNine;

class Task
{
    public function partOne(int $limit = 100): array
    {
        $output = [];

        foreach (range(1, $limit) as $number) {
            $type = $number;

            if (self::elf($number) && self::santa($number)) {
                $type = 'SANTA-ELF';
            } elseif (self::santa($number)) {
                $type = 'SANTA';
            } elseif (self::elf($number)) {
                $type = 'ELF';
            }

            $output[$number] = $type;
        }

        return $output;
    }


    private static function santa(int $number): bool
    {
        return $number % 3 === 0;
    }

    private static function elf(int $number): bool
    {
        return $number % 5 === 0;
    }
}
