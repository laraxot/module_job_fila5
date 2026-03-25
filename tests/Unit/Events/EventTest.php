<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Events;
<<<<<<< HEAD
use function Safe\class_uses;
use Modules\Job\Events\Event;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);
=======

use Modules\Job\Events\Event;
>>>>>>> c88446c (.)

describe('Event', function () {
    it('can be instantiated', function () {
        $event = new class extends Event {};
<<<<<<< HEAD
        Assert::assertInstanceOf(Event::class, $event);
=======
        expect($event)->toBeInstanceOf(Event::class);
>>>>>>> c88446c (.)
    });

    it('uses Dispatchable trait', function () {
        $traits = class_uses(Event::class);

<<<<<<< HEAD
        Assert::assertContains('Illuminate\Foundation\Events\Dispatchable', $traits);
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Event::class);
        $filename = $reflection->getFileName();

        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Event::class);

        Assert::assertSame('Modules\Job\Events', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(Event::class))->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);

        Assert::assertStringContainsString('use Illuminate\Foundation\Events\Dispatchable;', $content);
=======
        expect($traits)->toContain('Illuminate\Foundation\Events\Dispatchable');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass(Event::class);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass(Event::class);

        expect($reflection->getNamespaceName())->toBe('Modules\Job\Events');
    });

    it('has required imports', function () {
        $filename = (new ReflectionClass(Event::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use Illuminate\Foundation\Events\Dispatchable;');
>>>>>>> c88446c (.)
    });
});
