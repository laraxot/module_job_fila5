<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Feature;

use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(\Modules\Job\Tests\TestCase::class);
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

it('has a simple passing test', function () {
    Assert::assertSame('job', 'job');
});
