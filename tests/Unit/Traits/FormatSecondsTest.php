<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Traits;

<<<<<<< HEAD
use Modules\Job\Tests\TestCase;
use Modules\Job\Traits\FormatSeconds;
use PHPUnit\Framework\Assert;

uses(\Modules\Job\Tests\TestCase::class);

test('format_seconds_formats_minutes_and_seconds', function (): void {
    $probe = new class()
    {
        use FormatSeconds;
    };

    Assert::assertSame('1 m 30 s', $probe->formatSeconds(90));
});

test('format_seconds_formats_hours', function (): void {
    $probe = new class()
    {
        use FormatSeconds;
    };

    Assert::assertSame('2 h 0 m 0 s', $probe->formatSeconds(7200));
=======
use Modules\Job\Traits\FormatSeconds;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('format_seconds_trait_formats_minutes_and_seconds', function (): void {
    $formatter = new class {
        use FormatSeconds;
    };

    Assert::assertSame('1 m 30 s', $formatter->formatSeconds(90));
});

test('format_seconds_trait_formats_hours', function (): void {
    $formatter = new class {
        use FormatSeconds;
    };

    Assert::assertSame('2 h 0 m 0 s', $formatter->formatSeconds(7200));
>>>>>>> laraxot/dev
});
