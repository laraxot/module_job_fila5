<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Feature;

use Modules\Job\Tests\TestCase;
<<<<<<< HEAD

uses(TestCase::class);

test('default database connection is configured', function () {
    expect(config('database.default'))->not->toBeEmpty();
=======
use PHPUnit\Framework\Assert;

uses(\Modules\Job\Tests\TestCase::class);

test('default database connection is configured', function () {
    Assert::assertNotEmpty(config('database.default'));
>>>>>>> origin/dev
});

test('database configuration has required connections', function () {
    $connections = config('database.connections');

<<<<<<< HEAD
    expect($connections)->toBeArray()
        ->and($connections)->toHaveKey('mysql');
=======
    Assert::assertIsArray($connections);
    Assert::assertArrayHasKey('mysql', $connections);
>>>>>>> origin/dev
});
