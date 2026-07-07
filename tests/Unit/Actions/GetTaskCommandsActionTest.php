<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions;
<<<<<<< HEAD

use Illuminate\Support\Collection;
use Modules\Job\Actions\GetTaskCommandsAction;

describe('GetTaskCommandsAction', function () {
    beforeEach(function () {
        $action = new GetTaskCommandsAction;
    });

    it('can be instantiated', function () {
        expect($action);
    });

    it('has correct method signature', function () {
        $reflection = new ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())
            ->toBeTrue()
            ->and($method->getNumberOfParameters())
            ->toBe(0)
            ->and($method->getReturnType()?->getName())
            ->toBe(Collection::class);
    });

    it('can be resolved from container', function () {
        $actionFromContainer = app(GetTaskCommandsAction::class);

        expect($actionFromContainer)->toBeInstanceOf(GetTaskCommandsAction::class);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses($action);

        expect($traits)->toContain('Spatie\QueueableAction\QueueableAction');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass($action);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass($action);

        expect($reflection->getNamespaceName())->toBe('Modules\Job\Actions');
    });

    it('has proper class structure', function () {
        $reflection = new ReflectionClass($action);

        expect($reflection->isInstantiable())
            ->toBeTrue()
            ->and($reflection->isFinal())
            ->toBeFalse()
            ->and($reflection->isAbstract())
            ->toBeFalse();
    });

    it('implements queueable functionality', function () {
        expect(method_exists($action, 'onQueue'));
    });

    it('has required imports', function () {
        $filename = (new ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Illuminate\Support\Collection;')
            ->and($content)->toContain('use Illuminate\Support\Facades\Artisan;')
            ->and($content)->toContain('use Spatie\QueueableAction\QueueableAction;');
    });

    it('returns collection type from execute method', function () {
        $reflection = new ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        // Method should return Collection
        expect($method->getReturnType()?->getName())->toBe(Collection::class);
=======
use function Safe\class_uses;
use Illuminate\Support\Collection;
use Modules\Job\Actions\GetTaskCommandsAction;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('GetTaskCommandsAction', function (): void {
    test('can be instantiated', function (): void {
        $action = new GetTaskCommandsAction;
        Assert::assertInstanceOf(GetTaskCommandsAction::class, $action);
    });

    test('has correct method signature', function (): void {
        $reflection = new \ReflectionClass(GetTaskCommandsAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(0, $method->getNumberOfParameters());
        Assert::assertInstanceOf(\ReflectionNamedType::class, $returnType = $method->getReturnType());
        Assert::assertSame(Collection::class, $returnType->getName());
    });

    test('can be resolved from container', function (): void {
        $actionFromContainer = app(GetTaskCommandsAction::class);
        Assert::assertInstanceOf(GetTaskCommandsAction::class, $actionFromContainer);
    });

    test('uses QueueableAction trait', function (): void {
        $traits = class_uses(GetTaskCommandsAction::class);
        Assert::assertContains('Spatie\QueueableAction\QueueableAction', $traits);
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(GetTaskCommandsAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    test('has correct namespace', function (): void {
        $reflection = new \ReflectionClass(GetTaskCommandsAction::class);
        Assert::assertSame('Modules\Job\Actions', $reflection->getNamespaceName());
    });

    test('has proper class structure', function (): void {
        $reflection = new \ReflectionClass(GetTaskCommandsAction::class);
        Assert::assertTrue($reflection->isInstantiable());
        Assert::assertFalse($reflection->isFinal());
        Assert::assertFalse($reflection->isAbstract());
    });

    test('has required imports', function (): void {
        $reflection = new \ReflectionClass(GetTaskCommandsAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('use Illuminate\Support\Facades\Artisan;', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction;', $content);
>>>>>>> origin/dev
    });
});
