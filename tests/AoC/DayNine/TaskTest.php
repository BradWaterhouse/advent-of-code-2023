<?php

declare(strict_types=1);

namespace AoC\DayNine;

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testItReturnsCorrectNamesForNumberTypes(): void
    {
        $expected = [
            1 => 1,
            2 => 2,
            3 => 'SANTA',
            4 => 4,
            5 => 'ELF',
            6 => 'SANTA',
            7 => 7,
            8 => 8,
            9 => 'SANTA',
            10 => 'ELF',
            11 => 11,
            12 => 'SANTA',
            13 => 13,
            14 => 14,
            15 => 'SANTA-ELF',
            16 => 16,
            17 => 17,
            18 => 'SANTA',
            19 => 19,
            20 => 'ELF',
        ];

        $this->assertSame($expected, (new Task())->partOne(20));
    }
}
