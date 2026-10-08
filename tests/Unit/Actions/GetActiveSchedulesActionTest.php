<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Cache;
use Modules\Job\Actions\ClearScheduleCacheAction;
use Modules\Job\Actions\GetActiveSchedulesAction;
use Modules\Job\Models\Schedule;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

uses(TestCase::class);

/*
 * Schedule che risponde senza database: la query torna sempre una riga di questa stessa classe,
 * cosi' si vede QUALE model l'Action ha risolto da config('job::model').
 */
final class ConfiguredSchedule extends Schedule
{
    /**
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return Builder<static>
     */
    public function newEloquentBuilder($query): Builder
    {
        return new class($query) extends Builder
        {
            /**
             * @param  array<int, string>|string  $columns
             * @return EloquentCollection<int, ConfiguredSchedule>
             */
            public function get($columns = ['*']): EloquentCollection
            {
                return new EloquentCollection([new ConfiguredSchedule]);
            }
        };
    }
}

describe('GetActiveSchedulesAction', function () {
    it('can be instantiated', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertTrue($reflection->isInstantiable());
    });

    it('has execute method', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertTrue($reflection->hasMethod('execute'));
    });

    it('uses QueueableAction trait', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertContains(QueueableAction::class, $reflection->getTraitNames());
    });

    it('has private getFromCache method', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertTrue($reflection->hasMethod('getFromCache'));
        $method = $reflection->getMethod('getFromCache');
        Assert::assertTrue($method->isPrivate());
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertSame('Modules\Job\Actions', $reflection->getNamespaceName());
    });

    it('has model property', function () {
        $reflection = new \ReflectionClass(GetActiveSchedulesAction::class);
        Assert::assertTrue($reflection->hasProperty('model'));
    });
});

describe('GetActiveSchedulesAction behavior', function () {
    it('queries the model class named in config', function () {
        config(['job::model' => ConfiguredSchedule::class, 'job::cache.enabled' => false]);

        $schedules = app(GetActiveSchedulesAction::class)->execute();

        Assert::assertCount(1, $schedules);
        Assert::assertInstanceOf(ConfiguredSchedule::class, $schedules->first());
    });

    it('can be built when config does not name a model', function () {
        Assert::assertInstanceOf(GetActiveSchedulesAction::class, app(GetActiveSchedulesAction::class));
    });

    it('caches under the configured store and key until ClearScheduleCacheAction runs', function () {
        config([
            'job::model' => ConfiguredSchedule::class,
            'job::cache.enabled' => true,
            'job::cache.store' => 'array',
            'job::cache.key' => 'job-test-active-schedules',
        ]);
        Cache::store('array')->forget('job-test-active-schedules');

        app(GetActiveSchedulesAction::class)->execute();
        Assert::assertTrue(Cache::store('array')->has('job-test-active-schedules'));

        app(ClearScheduleCacheAction::class)->execute();
        Assert::assertFalse(Cache::store('array')->has('job-test-active-schedules'));
    });
});
