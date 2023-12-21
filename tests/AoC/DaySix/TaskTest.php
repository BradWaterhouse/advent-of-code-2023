<?php

declare(strict_types=1);

namespace AoC\DaySix;

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testItMultiplesWaysToWinAcrossMultipleRacesTogetherAndReturnsCorrectValue(): void
    {
        $this->assertSame(252000, (new Task())->partOne());
    }

    public function testItGetsWaysToWinSingularCombinedRace(): void
    {
        $this->assertSame(36992486, (new Task())->partTwo());
    }
}
