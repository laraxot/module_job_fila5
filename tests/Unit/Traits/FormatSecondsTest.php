<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Traits;

<<<<<<< HEAD
use Modules\Job\Phpstan\FormatSecondsPhpstanProbe;
use Modules\Job\Tests\TestCase;
=======
use Modules\Job\Tests\TestCase;
use Modules\Job\Traits\FormatSeconds;
>>>>>>> origin/dev
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
test('format_seconds_probe_formats_minutes_and_seconds', function (): void {
    $probe = new FormatSecondsPhpstanProbe;

    Assert::assertSame('1 m 30 s', $probe->exposeFormatSeconds(90));
});

test('format_seconds_probe_formats_hours', function (): void {
    $probe = new FormatSecondsPhpstanProbe;

    Assert::assertSame('2 h 0 m 0 s', $probe->exposeFormatSeconds(7200));
=======
test('format_seconds_formats_minutes_and_seconds', function (): void {
    $probe = new class {
        use FormatSeconds;
    };

    Assert::assertSame('1 m 30 s', $probe->formatSeconds(90));
});

test('format_seconds_formats_hours', function (): void {
    $probe = new class {
        use FormatSeconds;
    };

    Assert::assertSame('2 h 0 m 0 s', $probe->formatSeconds(7200));
>>>>>>> origin/dev
});
