<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Providers;
<<<<<<< HEAD

=======
>>>>>>> origin/dev
use Modules\Job\Providers\EventServiceProvider;
use Modules\Job\Providers\Filament\AdminPanelProvider;
use Modules\Job\Providers\JobServiceProvider;
use Modules\Job\Providers\RouteServiceProvider;
<<<<<<< HEAD
=======
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);
>>>>>>> origin/dev

describe('Job Providers Coverage', function () {
    describe('JobServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new JobServiceProvider(app());
<<<<<<< HEAD
            expect($provider)->toBeInstanceOf(JobServiceProvider::class);
=======
            Assert::assertInstanceOf(JobServiceProvider::class, $provider);
>>>>>>> origin/dev
        });

        it('has correct name', function () {
            $provider = new JobServiceProvider(app());
<<<<<<< HEAD
            expect($provider->name)->toBe('Job');
        });

        it('has module directory via reflection', function () {
            $reflection = new ReflectionProperty(JobServiceProvider::class, 'module_dir');
            expect($reflection->isProtected())->toBeTrue();
            expect($reflection->getDefaultValue())->not->toBeEmpty();
        });

        it('has module namespace via reflection', function () {
            $reflection = new ReflectionProperty(JobServiceProvider::class, 'module_ns');
            expect($reflection->isProtected())->toBeTrue();
        });

        it('has registerQueue method', function () {
            $provider = new JobServiceProvider(app());
            expect(method_exists($provider, 'registerQueue'))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(JobServiceProvider::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertSame('Job', $provider->name);
        });

        it('has module directory via reflection', function () {
            $reflection = new \ReflectionProperty(JobServiceProvider::class, 'module_dir');
            Assert::assertTrue($reflection->isProtected());
            Assert::assertNotEmpty($reflection->getDefaultValue());
        });

        it('has module namespace via reflection', function () {
            $reflection = new \ReflectionProperty(JobServiceProvider::class, 'module_ns');
            Assert::assertTrue($reflection->isProtected());
        });

        it('has registerQueue method', function () {
            $reflection = new \ReflectionClass(JobServiceProvider::class);
            Assert::assertTrue($reflection->hasMethod('registerQueue'));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(JobServiceProvider::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
>>>>>>> origin/dev
        });
    });

    describe('EventServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new EventServiceProvider(app());
<<<<<<< HEAD
            expect($provider)->toBeInstanceOf(EventServiceProvider::class);
        });

        it('extends BaseEventServiceProvider', function () {
            $reflection = new ReflectionClass(EventServiceProvider::class);
            expect($reflection->isSubclassOf(\Illuminate\Foundation\Support\Providers\EventServiceProvider::class))->toBeTrue();
        });

        it('has listen property', function () {
            $reflection = new ReflectionProperty(EventServiceProvider::class, 'listen');
            expect($reflection->isProtected())->toBeTrue();
        });

        it('has shouldDiscoverEvents static property', function () {
            $reflection = new ReflectionProperty(EventServiceProvider::class, 'shouldDiscoverEvents');
            expect($reflection->isStatic())->toBeTrue()
                ->and($reflection->getDefaultValue())->toBeTrue();
        });

        it('has configureEmailVerification method', function () {
            $provider = new EventServiceProvider(app());
            expect(method_exists($provider, 'configureEmailVerification'))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(EventServiceProvider::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(EventServiceProvider::class, $provider);
        });

        it('extends BaseEventServiceProvider', function () {
            $reflection = new \ReflectionClass(EventServiceProvider::class);
            Assert::assertTrue($reflection->isSubclassOf(\Illuminate\Foundation\Support\Providers\EventServiceProvider::class));
        });

        it('has listen property', function () {
            $reflection = new \ReflectionProperty(EventServiceProvider::class, 'listen');
            Assert::assertTrue($reflection->isProtected());
        });

        it('has shouldDiscoverEvents static property', function () {
            $reflection = new \ReflectionProperty(EventServiceProvider::class, 'shouldDiscoverEvents');
            Assert::assertTrue($reflection->isStatic());
        });

        it('has configureEmailVerification method', function () {
            $reflection = new \ReflectionClass(EventServiceProvider::class);
            Assert::assertTrue($reflection->hasMethod('configureEmailVerification'));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(EventServiceProvider::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
>>>>>>> origin/dev
        });
    });

    describe('RouteServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new RouteServiceProvider(app());
<<<<<<< HEAD
            expect($provider)->toBeInstanceOf(RouteServiceProvider::class);
=======
            Assert::assertInstanceOf(RouteServiceProvider::class, $provider);
>>>>>>> origin/dev
        });

        it('has correct name', function () {
            $provider = new RouteServiceProvider(app());
<<<<<<< HEAD
            expect($provider->name)->toBe('Job');
        });

        it('has module namespace via reflection', function () {
            $reflection = new ReflectionProperty(RouteServiceProvider::class, 'moduleNamespace');
            expect($reflection->isProtected())->toBeTrue();
            expect($reflection->getDefaultValue())->toBe('Modules\Job\Http\Controllers');
        });

        it('has module directory via reflection', function () {
            $reflection = new ReflectionProperty(RouteServiceProvider::class, 'module_dir');
            expect($reflection->isProtected())->toBeTrue();
            expect($reflection->getDefaultValue())->not->toBeEmpty();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(RouteServiceProvider::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertSame('Job', $provider->name);
        });

        it('has module namespace via reflection', function () {
            $reflection = new \ReflectionProperty(RouteServiceProvider::class, 'moduleNamespace');
            Assert::assertTrue($reflection->isProtected());
            Assert::assertSame('Modules\Job\Http\Controllers', $reflection->getDefaultValue());
        });

        it('has module directory via reflection', function () {
            $reflection = new \ReflectionProperty(RouteServiceProvider::class, 'module_dir');
            Assert::assertTrue($reflection->isProtected());
            Assert::assertNotEmpty($reflection->getDefaultValue());
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(RouteServiceProvider::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
>>>>>>> origin/dev
        });
    });

    describe('AdminPanelProvider', function () {
        it('can be instantiated', function () {
            $provider = new AdminPanelProvider(app());
<<<<<<< HEAD
            expect($provider)->toBeInstanceOf(AdminPanelProvider::class);
=======
            Assert::assertInstanceOf(AdminPanelProvider::class, $provider);
>>>>>>> origin/dev
        });

        it('has module property', function () {
            $provider = new AdminPanelProvider(app());
<<<<<<< HEAD
            $reflection = new ReflectionProperty(AdminPanelProvider::class, 'module');
            expect($reflection->isProtected())->toBeTrue();
            expect($reflection->getDefaultValue())->toBe('Job');
        });

        it('has panel method', function () {
            $provider = new AdminPanelProvider(app());
            expect(method_exists($provider, 'panel'))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(AdminPanelProvider::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            $reflection = new \ReflectionProperty(AdminPanelProvider::class, 'module');
            Assert::assertTrue($reflection->isProtected());
            Assert::assertSame('Job', $reflection->getDefaultValue());
        });

        it('has panel method', function () {
            $reflection = new \ReflectionClass(AdminPanelProvider::class);
            Assert::assertTrue($reflection->hasMethod('panel'));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(AdminPanelProvider::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
>>>>>>> origin/dev
        });
    });
});
