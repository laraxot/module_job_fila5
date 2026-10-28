<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Traits;

use Modules\Job\Traits\FormatSeconds;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
test('format_seconds_formats_minutes_and_seconds', function (): void {
    $probe = new class
    {
=======
test('format_seconds_trait_formats_minutes_and_seconds', function (): void {
    $formatter = new class {
>>>>>>> bb5d203c (.)
        use FormatSeconds;
    };

    Assert::assertSame('1 m 30 s', $formatter->formatSeconds(90));
});

<<<<<<< HEAD
test('format_seconds_formats_hours', function (): void {
    $probe = new class
    {
=======
test('format_seconds_trait_formats_hours', function (): void {
    $formatter = new class {
>>>>>>> bb5d203c (.)
        use FormatSeconds;
    };

    Assert::assertSame('2 h 0 m 0 s', $formatter->formatSeconds(7200));
});
