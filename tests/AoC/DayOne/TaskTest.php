<?php

declare(strict_types=1);

namespace AoC\DayOne;

use PHPUnit\Framework\TestCase;

final class TaskTest extends TestCase
{
    public function testItSumsResultsAndReturnsCorrectValue(): void
    {
        $this->assertSame(54304, (new Task())->partOne());
    }

    public function testItSumsStringResultsAndReturnsCorrectValue(): void
    {
        $this->assertSame(54418, (new Task())->partTwo());
    }
}
