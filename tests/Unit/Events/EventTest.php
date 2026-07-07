<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Events;
<<<<<<< HEAD

use Modules\Job\Events\Event;
=======
use function Safe\class_uses;
use Modules\Job\Events\Event;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);
>>>>>>> origin/dev

describe('Event', function () {
    it('can be instantiated', function () {
        $event = new class extends Event {};
<<<<<<< HEAD
        expect($event)->toBeInstanceOf(Event::class);
=======
        Assert::assertInstanceOf(Event::class, $event);
>>>>>>> origin/dev
    });

    it('uses Dispatchable trait', function () {
        $traits = class_uses(Event::class);

<<<<<<< HEAD
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
=======
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
>>>>>>> origin/dev
    });
});
