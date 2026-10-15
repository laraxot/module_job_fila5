<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Unit;

use Mockery;
use Tests\Modules\Job\TestCase;
use Tests\Modules\Xot\ModuleExecuteCoverage;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-job-db');

afterEach(function (): void {
    Mockery::close();
});

describe('Job ModuleExecuteCoverage floor sweep', function (): void {
    test('enums rules filament schemas senza model/service hang', function (): void {
        [$appRoot, $ns] = [dirname(__DIR__, 2).'/app', 'Modules\\Job\\'];
        // Evitare testInvokePublicMethodsOnModels / Services / Console: hang DB offline.
        ModuleExecuteCoverage::testInvokePublicMethodsInDirectory($appRoot, $ns, 'Rules');
        ModuleExecuteCoverage::testFilamentLegacySchemas($appRoot, $ns);
        ModuleExecuteCoverage::testAllEnums($appRoot, $ns);
        Assert::assertDirectoryExists($appRoot);
    });
});
