<?php

declare(strict_types=1);

use Baka\Support\Time;
use Baka\Support\Str;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    public function testMinsAgo()
    {
        $timeAgo = Time::howLongAgo(date('Y-m-d H:i:s', strtotime('-10 minutes')));

        $this->assertTrue(
            Str::contains($timeAgo, 'mins. ago')
        );
    }

    public function testHoursAgo()
    {
        $timeAgo = Time::howLongAgo(date('Y-m-d H:i:s', strtotime('-8 hours')));

        $this->assertTrue(
            Str::contains($timeAgo, 'hrs. ago')
        );
    }


    public function testDaysAgo()
    {
        $timeAgo = Time::howLongAgo(date('Y-m-d H:i:s', strtotime('-28 hours')));

        $this->assertTrue(
            Str::contains($timeAgo, 'day')
        );
    }

    public function testDatesAgo()
    {
        $timeAgo = Time::howLongAgo(date('Y-m-d H:i:s', strtotime('-750 hours')));

        $this->assertTrue(
            Str::contains($timeAgo, date('Y'))
        );
    }
}
