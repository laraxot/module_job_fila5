<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Feature;

use Tests\Modules\Job\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('default database connection is configured', function () {
    Assert::assertNotEmpty(config('database.default'));
});

test('database configuration has required connections', function () {
    $connections = config('database.connections');

    Assert::assertIsArray($connections);
    Assert::assertArrayHasKey('mysql', $connections);
});
