<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions\Command;
<<<<<<< HEAD
use function Safe\class_uses;
use Modules\Job\Actions\Command\GetCommandOptionsActions;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Symfony\Component\Console\Command\Command;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('GetCommandOptionsActions', function (): void {
    test('can be instantiated', function (): void {
        $action = new GetCommandOptionsActions;
        Assert::assertInstanceOf(GetCommandOptionsActions::class, $action);
    });

    test('has correct method signature', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        $method = $reflection->getMethod('execute');
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    test('returns array with structure', function (): void {
        $action = new GetCommandOptionsActions;
        $command = new Command('test');
        $result = $action->execute($command);

        Assert::assertArrayHasKey('withValue', $result);
        Assert::assertArrayHasKey('withoutValue', $result);
    });

    test('includes default options in withoutValue', function (): void {
        $action = new GetCommandOptionsActions;
        $command = new Command('test');
        $result = $action->execute($command);

        Assert::assertContains('verbose', $result['withoutValue']);
        Assert::assertContains('quiet', $result['withoutValue']);
        Assert::assertContains('ansi', $result['withoutValue']);
        Assert::assertContains('no-ansi', $result['withoutValue']);
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    test('has correct namespace', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        Assert::assertSame('Modules\Job\Actions\Command', $reflection->getNamespaceName());
    });

    test('uses QueueableAction trait', function (): void {
        $traits = class_uses(GetCommandOptionsActions::class);
        Assert::assertContains('Spatie\QueueableAction\QueueableAction', $traits);
    });

    test('has proper class structure', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        Assert::assertTrue($reflection->isInstantiable());
        Assert::assertFalse($reflection->isFinal());
        Assert::assertFalse($reflection->isAbstract());
    });

    test('implements queueable functionality', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        Assert::assertTrue($reflection->hasMethod('onQueue'));
    });

    test('has required imports', function (): void {
        $reflection = new \ReflectionClass(GetCommandOptionsActions::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('', $content);
=======

use Modules\Job\Actions\Command\GetCommandOptionsActions;
use Symfony\Component\Console\Command\Command;

describe('GetCommandOptionsActions', function () {
    beforeEach(function () {
        $action = new GetCommandOptionsActions;
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
            ->toBe(1);
    });

    it('returns array with structure', function () {
        // Create a mock command for testing
        $command = new Command('test');
        $result = $action->execute($command);

        expect($result)->toBeArray()
            ->toHaveKey('withValue')
            ->toHaveKey('withoutValue');
    });

    it('includes default options in withoutValue', function () {
        $command = new Command('test');
        $result = $action->execute($command);

        expect($result['withoutValue'])->toContain('verbose')
            ->toContain('quiet')
            ->toContain('ansi')
            ->toContain('no-ansi');
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

        expect($reflection->getNamespaceName())->toBe('Modules\Job\Actions\Command');
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses($action);

        expect($traits)->toContain('Spatie\QueueableAction\QueueableAction');
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

        expect($content)->toContain('use Spatie\QueueableAction\QueueableAction;')
            ->and($content)->toContain('use Symfony\Component\Console\Command\Command;');
>>>>>>> c88446c (.)
    });
});
