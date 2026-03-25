<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Events;
<<<<<<< HEAD
use function Safe\class_uses;
use Illuminate\Broadcasting\Channel;
use Modules\Job\Events\PublicEvent;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('PublicEvent', function () {
    it('implements ShouldBroadcast', function () {
        $interfaces = (new \ReflectionClass(PublicEvent::class))->getInterfaceNames();

        Assert::assertContains('Illuminate\Contracts\Broadcasting\ShouldBroadcast', $interfaces);
=======

use Illuminate\Broadcasting\Channel;
use Modules\Job\Events\PublicEvent;

describe('PublicEvent', function () {
    it('implements ShouldBroadcast', function () {
        $interfaces = (new ReflectionClass(PublicEvent::class))->getInterfaceNames();

        expect($interfaces)->toContain('Illuminate\Contracts\Broadcasting\ShouldBroadcast');
>>>>>>> c88446c (.)
    });

    it('uses required traits', function () {
        $traits = class_uses(PublicEvent::class);

<<<<<<< HEAD
        Assert::assertContains('Illuminate\Foundation\Events\Dispatchable', $traits);
        Assert::assertContains('Illuminate\Broadcasting\InteractsWithSockets', $traits);
        Assert::assertContains('Illuminate\Queue\SerializesModels', $traits);
=======
        expect($traits)->toContain('Illuminate\Foundation\Events\Dispatchable')
            ->and($traits)->toContain('Illuminate\Broadcasting\InteractsWithSockets')
            ->and($traits)->toContain('Illuminate\Queue\SerializesModels');
>>>>>>> c88446c (.)
    });

    it('has color property', function () {
        $event = new PublicEvent;

<<<<<<< HEAD
        Assert::assertSame('black', $event->color);
    });

    it('has broadcastOn method', function () {
        $reflection = new \ReflectionClass(PublicEvent::class);
        $method = $reflection->getMethod('broadcastOn');

        Assert::assertTrue($method->isPublic());
        Assert::assertInstanceOf(\ReflectionNamedType::class, $returnType = $method->getReturnType());
        Assert::assertSame(Channel::class, $returnType->getName());
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(PublicEvent::class);

        Assert::assertSame('Modules\Job\Events', $reflection->getNamespaceName());
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(PublicEvent::class);
        $filename = $reflection->getFileName();

        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(PublicEvent::class))->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);

        Assert::assertStringContainsString('', $content);
        Assert::assertStringContainsString('use Illuminate\Broadcasting\InteractsWithSockets;', $content);
        Assert::assertStringContainsString('use Illuminate\Contracts\Broadcasting\ShouldBroadcast;', $content);
=======
        expect($event->color)->toBe('black');
    });

    it('has broadcastOn method', function () {
        $reflection = new ReflectionClass(PublicEvent::class);
        $method = $reflection->getMethod('broadcastOn');

        expect($method->isPublic())->toBeTrue()
            ->and($method->getReturnType()?->getName())->toBe(Channel::class);
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass(PublicEvent::class);

        expect($reflection->getNamespaceName())->toBe('Modules\Job\Events');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass(PublicEvent::class);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
    });

    it('has required imports', function () {
        $filename = (new ReflectionClass(PublicEvent::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use Illuminate\Broadcasting\Channel;')
            ->and($content)->toContain('use Illuminate\Broadcasting\InteractsWithSockets;')
            ->and($content)->toContain('use Illuminate\Contracts\Broadcasting\ShouldBroadcast;');
>>>>>>> c88446c (.)
    });
});
