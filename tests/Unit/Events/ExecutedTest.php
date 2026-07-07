<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Events;
<<<<<<< HEAD

use Modules\Job\Events\BroadcastingEvent;
use Modules\Job\Events\Executed;

describe('Executed', function () {
    it('extends BroadcastingEvent', function () {
        expect(is_a(Executed::class, BroadcastingEvent::class, true))->toBeTrue();
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass(Executed::class);

        expect($reflection->getNamespaceName())->toBe('Modules\Job\Events');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass(Executed::class);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
    });

    it('has required imports', function () {
        $filename = (new ReflectionClass(Executed::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Job\Models\Task;')
            ->and($content)->toContain('use Modules\Job\Notifications\TaskCompleted;');
    });

    it('has constructor with Task, float and string parameters', function () {
        $reflection = new ReflectionClass(Executed::class);
        $constructor = $reflection->getConstructor();

        expect($constructor)->not->toBeNull();

        $params = $constructor->getParameters();
        expect($params)->toHaveCount(3)
            ->and($params[0]->getName())->toBe('task')
            ->and($params[1]->getName())->toBe('started')
            ->and($params[2]->getName())->toBe('output');
    });

    it('is instantiable', function () {
        $reflection = new ReflectionClass(Executed::class);

        expect($reflection->isInstantiable())->toBeTrue();
=======
use Modules\Job\Events\BroadcastingEvent;
use Modules\Job\Events\Executed;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('Executed', function () {
    it('extends BroadcastingEvent', function () {
        Assert::assertTrue((new \ReflectionClass(Executed::class))->isSubclassOf(BroadcastingEvent::class));
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Executed::class);

        Assert::assertSame('Modules\Job\Events', $reflection->getNamespaceName());
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Executed::class);
        $filename = $reflection->getFileName();

        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(Executed::class))->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);

        Assert::assertStringContainsString('use Modules\Job\Models\Task;', $content);
        Assert::assertStringContainsString('use Modules\Job\Notifications\TaskCompleted;', $content);
    });

    it('has constructor with Task, float and string parameters', function () {
        $reflection = new \ReflectionClass(Executed::class);
        $constructor = $reflection->getConstructor();

        Assert::assertNotNull($constructor);

        $params = $constructor->getParameters();
        Assert::assertCount(3, $params);
        Assert::assertSame('task', $params[0]->getName());
        Assert::assertSame('started', $params[1]->getName());
        Assert::assertSame('output', $params[2]->getName());
    });

    it('is instantiable', function () {
        $reflection = new \ReflectionClass(Executed::class);

        Assert::assertTrue($reflection->isInstantiable());
>>>>>>> origin/dev
    });
});
