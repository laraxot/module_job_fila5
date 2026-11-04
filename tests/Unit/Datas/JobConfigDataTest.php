<?php

declare(strict_types=1);

use Modules\Job\Datas\JobConfigData;
use Modules\Job\Filament\Pages\SettingPage;
use Modules\Job\Tests\TestCase;

uses(TestCase::class)->group('no-job-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('job')
        ->and(SettingPage::getConfigDataClass())->toBe(JobConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(JobConfigData::tenantConfigName())->toBe('job');
});
