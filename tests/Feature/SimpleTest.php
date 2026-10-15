<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Feature;

use Tests\Modules\Job\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('has a simple passing test', function () {
    Assert::assertSame('job', 'job');
});
