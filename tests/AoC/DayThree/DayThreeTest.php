<?php

declare(strict_types=1);

namespace AoC\DayThree;

use PHPUnit\Framework\TestCase;

class DayThreeTest extends TestCase
{
    public function testItMultipliesTogetherWinningCardNumbers(): void
    {
        $this->assertSame(25231, (new Task())->partOne());
    }
}
