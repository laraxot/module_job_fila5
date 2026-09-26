<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions;

use Modules\Job\Actions\ClearScheduleCacheAction;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use Spatie\QueueableAction\QueueableAction;

<<<<<<< .merge_file_GsZV9E
uses(\Modules\Job\Tests\TestCase::class);
=======
uses(TestCase::class);
>>>>>>> .merge_file_NZLVHz
=======

uses(\Modules\Job\Tests\TestCase::class);
>>>>>>> laraxot/dev

describe('ClearScheduleCacheAction', function () {
    it('can be instantiated', function () {
        $reflection = new \ReflectionClass(ClearScheduleCacheAction::class);
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has execute method', function () {
        $reflection = new \ReflectionClass(ClearScheduleCacheAction::class);
        Assert::assertTrue($reflection->hasMethod('execute'));
    });

    it('uses QueueableAction trait', function () {
        $reflection = new \ReflectionClass(ClearScheduleCacheAction::class);
<<<<<<< HEAD
        Assert::assertContains(QueueableAction::class, $reflection->getTraitNames());
=======
        Assert::assertContains(\Spatie\QueueableAction\QueueableAction::class, $reflection->getTraitNames());
>>>>>>> laraxot/dev
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(ClearScheduleCacheAction::class);
        Assert::assertSame('Modules\Job\Actions', $reflection->getNamespaceName());
    });
});
