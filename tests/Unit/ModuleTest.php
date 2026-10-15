<?php
namespace Modules\Job\Tests\Unit;

use Modules\Job\Tests\TestCase;
use Modules\Job\Models\Job;

it('has main model class', function () {
    expect(class_exists(Job::class))->toBeTrue();
});
