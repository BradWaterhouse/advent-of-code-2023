<?php

declare(strict_types=1);

namespace AoC\DayTwo;

use PHPUnit\Framework\TestCase;

final class TaskTest extends TestCase
{
    public function testItSumsResultsAndReturnsCorrectValue(): void
    {
        $this->assertSame(2348, (new Task())->partOne());
    }

    public function testItFindsMinimumNumberOfCubesRequiredToPlayGameMultipliedTogether(): void
    {
        $this->assertSame(76008, (new Task())->partTwo());
    }
}
