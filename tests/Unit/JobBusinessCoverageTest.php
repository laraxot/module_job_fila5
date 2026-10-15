<?php

declare(strict_types=1);

namespace Tests\Modules\Job\Unit;

use Mockery;
use Tests\Modules\Job\TestCase;
use Tests\Modules\Xot\ModuleBusinessCoverage;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-job-db');

afterEach(function (): void {
    Mockery::close();
});

/** @return array{0: string, 1: string} */
/** @return list{string, string} */
function jobBusinessContext(): array
{
    return [dirname(__DIR__, 2).'/app', 'Modules\\Job\\'];
}

describe('Job business coverage', function (): void {
    test('all policies execute authorization methods', function (): void {
        [$appRoot, $ns] = jobBusinessContext();
        ModuleBusinessCoverage::testAllPolicies($appRoot, $ns);
    });

    test('all models expose table and fillable', function (): void {
        [$appRoot, $ns] = jobBusinessContext();
        ModuleBusinessCoverage::testAllModels($appRoot, $ns);
    });

    test('all actions are resolvable', function (): void {
        [$appRoot, $ns] = jobBusinessContext();
        ModuleBusinessCoverage::testAllActions($appRoot, $ns);
    });

    test('all datas are loadable', function (): void {
        [$appRoot, $ns] = jobBusinessContext();
        ModuleBusinessCoverage::testAllDatas($appRoot, $ns);
        Assert::assertGreaterThan(0, count(ModuleBusinessCoverage::discoverPhpClasses($appRoot, $ns, 'Datas')));
    });
});
