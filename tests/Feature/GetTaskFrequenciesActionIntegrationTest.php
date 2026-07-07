<?php

declare(strict_types=1);

<<<<<<< HEAD
uses(\Modules\Job\Tests\TestCase::class);

use Modules\Job\Actions\GetTaskFrequenciesAction;

describe('GetTaskFrequenciesAction Integration', function () {
    beforeEach(function () {
=======
use Exception;
use Modules\Job\Actions\GetTaskFrequenciesAction;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('GetTaskFrequenciesAction Integration', function () {
    beforeEach(function () {
        /** @var TestCase $this */
>>>>>>> origin/dev
        $this->action = new GetTaskFrequenciesAction;
    });

    it('returns array when config exists', function () {
<<<<<<< HEAD
        // Set up realistic frequency configuration
=======
        /** @var TestCase $this */
>>>>>>> origin/dev
        config(['totem.frequencies' => [
            'everyMinute' => 'Every Minute',
            'everyFiveMinutes' => 'Every 5 Minutes',
            'hourly' => 'Hourly',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ]]);

<<<<<<< HEAD
        $result = $this->action->execute();

        expect($result)
            ->toBeArray()
            ->and($result)
            ->toHaveKeys([
                'everyMinute',
                'everyFiveMinutes',
                'hourly',
                'daily',
                'weekly',
                'monthly',
            ])
            ->and($result['everyMinute'])
            ->toBe('Every Minute')
            ->and($result['hourly'])
            ->toBe('Hourly')
            ->and($result['daily'])
            ->toBe('Daily');
    });

    it('throws exception when config is not array', function () {
        // Mock config with non-array value
        config(['totem.frequencies' => 'invalid_value']);

        expect($this->action->execute(...))->toThrow(Exception::class);
    });

    it('throws exception when config is null', function () {
        // Mock config with null value
        config(['totem.frequencies' => null]);

        expect($this->action->execute(...))->toThrow(Exception::class);
    });

    it('handles empty array config', function () {
        config(['totem.frequencies' => []]);

        $result = $this->action->execute();

        expect($result)->toBeArray()->and(count($result))->toBe(0);
    });

    it('can be queued', function () {
        // Test that the action can be queued (basic trait functionality)
        expect(method_exists($this->action, 'onQueue'))->toBeTrue();
    });

    it('integrates with Laravel service container', function () {
        // Test that the action can be resolved from container
        $actionFromContainer = app(GetTaskFrequenciesAction::class);

        expect($actionFromContainer)->toBeInstanceOf(GetTaskFrequenciesAction::class);
    });

    it('handles configuration changes dynamically', function () {
        // Test with initial config
        config(['totem.frequencies' => ['initial' => 'Initial Value']]);
        $result1 = $this->action->execute();

        // Change config
        config(['totem.frequencies' => ['changed' => 'Changed Value']]);
        $result2 = $this->action->execute();

        expect($result1)
            ->toHaveKey('initial')
            ->and($result1['initial'])
            ->toBe('Initial Value')
            ->and($result2)
            ->toHaveKey('changed')
            ->and($result2['changed'])
            ->toBe('Changed Value')
            ->and($result2)
            ->not->toHaveKey('initial');
    });

    it('returns string keys and mixed values', function () {
=======
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $result = $action->execute();

        Assert::assertIsArray($result);
        Assert::assertSame('Every Minute', $result['everyMinute']);
        Assert::assertSame('Hourly', $result['hourly']);
        Assert::assertSame('Daily', $result['daily']);
    });

    it('throws exception when config is not array', function () {
        /** @var TestCase $this */
        config(['totem.frequencies' => 'invalid_value']);
        $this->expectApplicationException(Exception::class);
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $action->execute();
    });

    it('throws exception when config is null', function () {
        /** @var TestCase $this */
        config(['totem.frequencies' => null]);
        $this->expectApplicationException(Exception::class);
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $action->execute();
    });

    it('handles empty array config', function () {
        /** @var TestCase $this */
        config(['totem.frequencies' => []]);
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $result = $action->execute();

        Assert::assertIsArray($result);
        Assert::assertCount(0, $result);
    });

    it('can be queued', function () {
        /** @var TestCase $this */
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        Assert::assertTrue(method_exists($action, 'onQueue'));
    });

    it('integrates with Laravel service container', function () {
        $actionFromContainer = app(GetTaskFrequenciesAction::class);
        Assert::assertInstanceOf(GetTaskFrequenciesAction::class, $actionFromContainer);
    });

    it('handles configuration changes dynamically', function () {
        /** @var TestCase $this */
        $action = $this->getAction(GetTaskFrequenciesAction::class);

        config(['totem.frequencies' => ['initial' => 'Initial Value']]);
        $result1 = $action->execute();

        config(['totem.frequencies' => ['changed' => 'Changed Value']]);
        $result2 = $action->execute();

        Assert::assertArrayHasKey('initial', $result1);
        Assert::assertSame('Initial Value', $result1['initial']);
        Assert::assertArrayHasKey('changed', $result2);
        Assert::assertSame('Changed Value', $result2['changed']);
        Assert::assertArrayNotHasKey('initial', $result2);
    });

    it('returns string keys and mixed values', function () {
        /** @var TestCase $this */
>>>>>>> origin/dev
        config(['totem.frequencies' => [
            'string_key' => 'string_value',
            'another_key' => ['nested', 'array'],
            'numeric_key' => 123,
            'boolean_key' => true,
        ]]);

<<<<<<< HEAD
        $result = $this->action->execute();

        expect($result)
            ->toBeArray()
            ->and($result['string_key'])
            ->toBe('string_value')
            ->and($result['another_key'])
            ->toBe(['nested', 'array'])
            ->and($result['numeric_key'])
            ->toBe(123)
            ->and($result['boolean_key'])
            ->toBe(true);
    });

    it('preserves array key types', function () {
=======
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $result = $action->execute();

        Assert::assertIsArray($result);
        Assert::assertSame('string_value', $result['string_key']);
        Assert::assertSame(['nested', 'array'], $result['another_key']);
        Assert::assertSame(123, $result['numeric_key']);
        Assert::assertSame(true, $result['boolean_key']);
    });

    it('preserves array key types', function () {
        /** @var TestCase $this */
>>>>>>> origin/dev
        config(['totem.frequencies' => [
            'string_key' => 'value1',
            0 => 'value2',
            1 => 'value3',
        ]]);

<<<<<<< HEAD
        $result = $this->action->execute();

        expect($result)
            ->toBeArray()
            ->and($result)
            ->toHaveKey('string_key')
            ->and($result)
            ->toHaveKey(0)
            ->and($result)
            ->toHaveKey(1)
            ->and($result['string_key'])
            ->toBe('value1')
            ->and($result[0])
            ->toBe('value2')
            ->and($result[1])
            ->toBe('value3');
    });

    it('maintains consistency across multiple executions', function () {
=======
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $result = $action->execute();

        Assert::assertIsArray($result);
        Assert::assertArrayHasKey('string_key', $result);
        Assert::assertArrayHasKey(0, $result);
        Assert::assertArrayHasKey(1, $result);
        Assert::assertSame('value1', $result['string_key']);
        Assert::assertSame('value2', $result[0]);
        Assert::assertSame('value3', $result[1]);
    });

    it('maintains consistency across multiple executions', function () {
        /** @var TestCase $this */
>>>>>>> origin/dev
        config(['totem.frequencies' => [
            'consistent_key' => 'Consistent Value',
            'another_key' => 'Another Value',
        ]]);

<<<<<<< HEAD
        $results = [];
        for ($i = 0; $i < 3; $i++) {
            $results[] = $this->action->execute();
        }

        // All results should be identical
        foreach ($results as $result) {
            expect($result)->toBe($results[0]);
=======
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $results = [];
        for ($i = 0; $i < 3; $i++) {
            $results[] = $action->execute();
        }

        foreach ($results as $result) {
            Assert::assertSame($results[0], $result);
>>>>>>> origin/dev
        }
    });

    it('works with realistic totem configuration', function () {
<<<<<<< HEAD
        // Test with configuration that would be realistic for Laravel Totem
=======
        /** @var TestCase $this */
>>>>>>> origin/dev
        config(['totem.frequencies' => [
            'everyMinute' => 'Every Minute',
            'everyFiveMinutes' => 'Every Five Minutes',
            'everyTenMinutes' => 'Every Ten Minutes',
            'everyFifteenMinutes' => 'Every Fifteen Minutes',
            'everyThirtyMinutes' => 'Every Thirty Minutes',
            'hourly' => 'Hourly',
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
        ]]);

<<<<<<< HEAD
        $result = $this->action->execute();

        expect($result)
            ->toBeArray()
            ->and(count($result))
            ->toBe(10)
            ->and(isset($result['everyMinute']) ? $result['everyMinute'] : null)
            ->toBe('Every Minute')
            ->and(isset($result['hourly']) ? $result['hourly'] : null)
            ->toBe('Hourly')
            ->and(isset($result['daily']) ? $result['daily'] : null)
            ->toBe('Daily')
            ->and(isset($result['weekly']) ? $result['weekly'] : null)
            ->toBe('Weekly')
            ->and(isset($result['monthly']) ? $result['monthly'] : null)
            ->toBe('Monthly')
            ->and(isset($result['yearly']) ? $result['yearly'] : null)
            ->toBe('Yearly');
=======
        $action = $this->getAction(GetTaskFrequenciesAction::class);
        $result = $action->execute();

        Assert::assertIsArray($result);
        Assert::assertCount(10, $result);
        Assert::assertSame('Every Minute', $result['everyMinute'] ?? null);
        Assert::assertSame('Hourly', $result['hourly'] ?? null);
        Assert::assertSame('Daily', $result['daily'] ?? null);
        Assert::assertSame('Weekly', $result['weekly'] ?? null);
        Assert::assertSame('Monthly', $result['monthly'] ?? null);
        Assert::assertSame('Yearly', $result['yearly'] ?? null);
>>>>>>> origin/dev
    });
});
