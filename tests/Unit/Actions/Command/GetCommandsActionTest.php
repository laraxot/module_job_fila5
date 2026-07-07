<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions\Command;
<<<<<<< HEAD

use Modules\Job\Actions\Command\GetCommandsAction;

describe('GetCommandsAction', function () {
    beforeEach(function () {
        $action = new GetCommandsAction;
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
            ->toBe(0);
    });

    it('can be resolved from container', function () {
        $actionFromContainer = app(GetCommandsAction::class);

        expect($actionFromContainer)->toBeInstanceOf(GetCommandsAction::class);
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

    it('uses required imports', function () {
        $filename = (new ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Illuminate\Console\Application;')
            ->and($content)->toContain('use Illuminate\Support\Collection;')
            ->and($content)->toContain('use Modules\Job\Datas\CommandData;');
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

    it('has execute method returning DataCollection', function () {
        $reflection = new ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        // Method should return DataCollection type
        $returnType = $method->getReturnType();
        expect($returnType)->not->toBeNull();
=======
use Modules\Job\Actions\Command\GetCommandsAction;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\LaravelData\DataCollection;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('GetCommandsAction', function (): void {
    test('can be instantiated', function (): void {
        $action = new GetCommandsAction;
        Assert::assertInstanceOf(GetCommandsAction::class, $action);
    });

    test('has correct method signature', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        $method = $reflection->getMethod('execute');
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(0, $method->getNumberOfParameters());
    });

    test('can be resolved from container', function (): void {
        $actionFromContainer = app(GetCommandsAction::class);
        Assert::assertInstanceOf(GetCommandsAction::class, $actionFromContainer);
    });

    test('uses strict types', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    test('has correct namespace', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        Assert::assertSame('Modules\Job\Actions\Command', $reflection->getNamespaceName());
    });

    test('uses required imports', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
        Assert::assertStringContainsString('use Illuminate\Support\Collection;', $content);
        Assert::assertStringContainsString('use Modules\Job\Datas\CommandData;', $content);
    });

    test('has proper class structure', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        Assert::assertTrue($reflection->isInstantiable());
        Assert::assertFalse($reflection->isFinal());
        Assert::assertFalse($reflection->isAbstract());
    });

    test('has execute method returning DataCollection', function (): void {
        $reflection = new \ReflectionClass(GetCommandsAction::class);
        $method = $reflection->getMethod('execute');
        Assert::assertInstanceOf(\ReflectionNamedType::class, $returnType = $method->getReturnType());
        Assert::assertSame(DataCollection::class, $returnType->getName());
>>>>>>> origin/dev
    });
});
