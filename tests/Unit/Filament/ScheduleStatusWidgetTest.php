<?php

declare(strict_types=1);

use Illuminate\Contracts\Console\Kernel;
use Modules\Job\Filament\Widgets\ScheduleStatusWidget;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ScheduleStatusWidget espone solo comandi schedule in whitelist', function (): void {
<<<<<<< .merge_file_8UQ3EW
=======
    $kernel = Mockery::mock(Kernel::class);
    $kernel->shouldReceive('call')->never();
    app()->instance(Kernel::class, $kernel);

>>>>>>> .merge_file_MFJZ5c
    $widget = new ScheduleStatusWidget;
    Assert::assertContains('schedule:list', $widget->getAllowedCommands());
    $widget->artisan('migrate:fresh');
    Assert::assertSame('', $widget->out);
});
