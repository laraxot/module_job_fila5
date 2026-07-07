<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions;
<<<<<<< HEAD

use Modules\Job\Actions\DummyAction;

describe('DummyAction', function () {
    beforeEach(function () {
        $action = new DummyAction;
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
            ->toBe('void');
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

        expect($content)->toContain('use Spatie\QueueableAction\QueueableAction;');
=======
use function Safe\class_uses;
use Modules\Job\Actions\DummyAction;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('DummyAction', function (): void {
    test('can be instantiated', function (): void {
        $action = new DummyAction;
        Assert::assertInstanceOf(DummyAction::class, $action);
    });

    test('has correct method signature', function (): void {
        $reflection = new \ReflectionClass(DummyAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(0, $method->getNumberOfParameters());
        Assert::assertInstanceOf(\ReflectionNamedType::class, $returnType = $method->getReturnType());
        Assert::assertSame('void', $returnType->getName());
    });

    test('uses QueueableAction trait', function (): void {
        $traits = class_uses(DummyAction::class);
        Assert::assertContains('Spatie\QueueableAction\QueueableAction', $traits);
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(DummyAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    test('has correct namespace', function (): void {
        $reflection = new \ReflectionClass(DummyAction::class);
        Assert::assertSame('Modules\Job\Actions', $reflection->getNamespaceName());
    });

    test('has proper class structure', function (): void {
        $reflection = new \ReflectionClass(DummyAction::class);
        Assert::assertTrue($reflection->isInstantiable());
        Assert::assertFalse($reflection->isFinal());
        Assert::assertFalse($reflection->isAbstract());
    });

    test('has required imports', function (): void {
        $reflection = new \ReflectionClass(DummyAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction;', $content);
>>>>>>> origin/dev
    });
});
