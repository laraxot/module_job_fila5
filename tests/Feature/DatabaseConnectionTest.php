<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Job\Tests\Feature;

use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Job\Tests\TestCase::class);

test('default database connection is configured', function () {
    Assert::assertNotEmpty(config('database.default'));
=======
uses(\Modules\Job\Tests\TestCase::class);

test('default database connection is configured', function () {
    expect(config('database.default'))->not->toBeEmpty();
>>>>>>> c88446c (.)
});

test('database configuration has required connections', function () {
    $connections = config('database.connections');

<<<<<<< HEAD
    Assert::assertIsArray($connections);
    Assert::assertArrayHasKey('mysql', $connections);
=======
    expect($connections)->toBeArray()
        ->and($connections)->toHaveKey('mysql');
>>>>>>> c88446c (.)
});
