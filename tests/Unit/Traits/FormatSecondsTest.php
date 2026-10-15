<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Unit\Traits;

use Tests\Modules\Job\TestCase;
use Modules\Job\Traits\FormatSeconds;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('format_seconds_formats_minutes_and_seconds', function (): void {
    $probe = new class
    {
        use FormatSeconds;
    };

    Assert::assertSame('1 m 30 s', $probe->formatSeconds(90));
});

test('format_seconds_formats_hours', function (): void {
    $probe = new class
    {
        use FormatSeconds;
    };

    Assert::assertSame('2 h 0 m 0 s', $probe->formatSeconds(7200));
});
