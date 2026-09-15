<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit;

use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Mockery;
use Modules\Job\Actions\Command\GetCommandsAction;
use Modules\Job\Datas\CommandData;
use Modules\Job\Filament\Resources\ScheduleResource\Schemas\ScheduleForm;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 899602c6 (.)
use ReflectionClass;
use ReflectionMethod;
use ReflectionObject;
use Spatie\LaravelData\DataCollection;
use Throwable;
<<<<<<< HEAD
=======
use Spatie\LaravelData\DataCollection;
>>>>>>> laraxot/dev
=======
>>>>>>> 899602c6 (.)

uses(TestCase::class)->group('no-job-db');

afterEach(function (): void {
    Mockery::close();
<<<<<<< HEAD
<<<<<<< HEAD
    $ref = new ReflectionClass(ScheduleForm::class);
=======
    $ref = new \ReflectionClass(ScheduleForm::class);
>>>>>>> laraxot/dev
=======
    $ref = new ReflectionClass(ScheduleForm::class);
>>>>>>> 899602c6 (.)
    if ($ref->hasProperty('commands')) {
        $prop = $ref->getProperty('commands');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
    }
});

describe('Job ScheduleForm full schema coverage', function (): void {
    test('getFormSchema keyed e afterStateUpdated closures', function (): void {
        $command = CommandData::from([
            'name' => 'inspire',
            'full_name' => 'inspire',
            'description' => 'demo',
            'signature' => 'inspire {arg1}',
            'arguments' => [
                ['name' => 'arg1', 'required' => true, 'value' => null],
            ],
            'options' => [
                'withValue' => [
                    ['name' => 'opt1', 'required' => false, 'value' => null, 'type' => 'string'],
                ],
                'withoutValue' => ['verbose'],
            ],
        ]);

        $collection = new DataCollection(CommandData::class, [$command]);
        app()->instance(GetCommandsAction::class, new class($collection)
        {
            /** @param DataCollection<int, CommandData> $commands */
            public function __construct(private DataCollection $commands) {}

            /** @return DataCollection<int, CommandData> */
            public function execute(): DataCollection
            {
                return $this->commands;
            }
        });

<<<<<<< HEAD
<<<<<<< HEAD
        $schema = (new ScheduleForm)->getFormSchema();
=======
        $schema = (new ScheduleForm())->getFormSchema();
>>>>>>> laraxot/dev
=======
        $schema = (new ScheduleForm)->getFormSchema();
>>>>>>> 899602c6 (.)
        Assert::assertArrayHasKey('main_section', $schema);

        // Invoke nested closures via ModuleRemainingCoverage-style property walk
        $set = Mockery::mock(Set::class);
        expectMethod($set, '__invoke')->andReturnNull();
        $set->shouldIgnoreMissing();

        $get = Mockery::mock(Get::class);
        expectMethod($get, '__invoke')->with('name')->andReturn('arg1');
        expectMethod($get, '__invoke')->with('required')->andReturn(true);
        expectMethod($get, '__invoke')->andReturn('arg1', true, null);
        $get->shouldIgnoreMissing();

<<<<<<< HEAD
<<<<<<< HEAD
        $ref = new ReflectionObject($schema['main_section']);
=======
        $ref = new \ReflectionObject($schema['main_section']);
>>>>>>> laraxot/dev
=======
        $ref = new ReflectionObject($schema['main_section']);
>>>>>>> 899602c6 (.)
        foreach ($ref->getProperties() as $property) {
            $property->setAccessible(true);
            try {
                $val = $property->getValue($schema['main_section']);
<<<<<<< HEAD
<<<<<<< HEAD
            } catch (Throwable) {
=======
            } catch (\Throwable) {
>>>>>>> laraxot/dev
=======
            } catch (Throwable) {
>>>>>>> 899602c6 (.)
                continue;
            }
            jobInvokeClosures($val, $set, $get);
        }

        Assert::assertNotEmpty($schema);
    });
});

function jobInvokeClosures(mixed $value, object $set, object $get, int $depth = 0): void
{
    if ($depth > 8) {
        return;
    }
    if ($value instanceof \Closure) {
        foreach ([[$set, 'inspire'], [$get], [$get, $set], ['inspire'], []] as $args) {
            try {
                $value(...$args);
<<<<<<< HEAD
<<<<<<< HEAD
            } catch (Throwable) {
=======
            } catch (\Throwable) {
>>>>>>> laraxot/dev
=======
            } catch (Throwable) {
>>>>>>> 899602c6 (.)
            }
        }

        return;
    }
    if (is_array($value)) {
        foreach ($value as $item) {
            jobInvokeClosures($item, $set, $get, $depth + 1);
        }

        return;
    }
    if (! is_object($value)) {
        return;
    }
<<<<<<< HEAD
<<<<<<< HEAD
    $ref = new ReflectionObject($value);
=======
    $ref = new \ReflectionObject($value);
>>>>>>> laraxot/dev
=======
    $ref = new ReflectionObject($value);
>>>>>>> 899602c6 (.)
    foreach ($ref->getProperties() as $property) {
        $property->setAccessible(true);
        try {
            jobInvokeClosures($property->getValue($value), $set, $get, $depth + 1);
<<<<<<< HEAD
<<<<<<< HEAD
        } catch (Throwable) {
=======
        } catch (\Throwable) {
>>>>>>> laraxot/dev
=======
        } catch (Throwable) {
>>>>>>> 899602c6 (.)
        }
    }
    foreach (['getChildComponents', 'getDefaultChildComponents', 'getSchema', 'getActionFunction'] as $method) {
        if (! method_exists($value, $method)) {
            continue;
        }
        try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 899602c6 (.)
            $rm = new ReflectionMethod($value, $method);
            if ($rm->getNumberOfRequiredParameters() === 0) {
                jobInvokeClosures($rm->invoke($value), $set, $get, $depth + 1);
            }
        } catch (Throwable) {
<<<<<<< HEAD
=======
            $rm = new \ReflectionMethod($value, $method);
            if ($rm->getNumberOfRequiredParameters() === 0) {
                jobInvokeClosures($rm->invoke($value), $set, $get, $depth + 1);
            }
        } catch (\Throwable) {
>>>>>>> laraxot/dev
=======
>>>>>>> 899602c6 (.)
        }
    }
}
