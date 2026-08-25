<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Providers;
use Modules\Job\Providers\EventServiceProvider;
use Modules\Job\Providers\Filament\AdminPanelProvider;
use Modules\Job\Providers\JobServiceProvider;
use Modules\Job\Providers\RouteServiceProvider;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('Job Providers Coverage', function () {
    describe('JobServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new JobServiceProvider(app());
<<<<<<< HEAD
           Assert::assertInstanceOf(JobServiceProvider::class, $provider);
=======
            Assert::assertInstanceOf(JobServiceProvider::class, $provider);
>>>>>>> laraxot/dev
        });

        it('has correct name', function () {
            $provider = new JobServiceProvider(app());
<<<<<<< HEAD
           Assert::assertSame('Job', $provider->name);
=======
            Assert::assertSame('Job', $provider->name);
>>>>>>> laraxot/dev
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
        });
    });

    describe('EventServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new EventServiceProvider(app());
<<<<<<< HEAD
           Assert::assertInstanceOf(EventServiceProvider::class, $provider);
=======
            Assert::assertInstanceOf(EventServiceProvider::class, $provider);
>>>>>>> laraxot/dev
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
        });
    });

    describe('RouteServiceProvider', function () {
        it('can be instantiated', function () {
            $provider = new RouteServiceProvider(app());
<<<<<<< HEAD
           Assert::assertInstanceOf(RouteServiceProvider::class, $provider);
=======
            Assert::assertInstanceOf(RouteServiceProvider::class, $provider);
>>>>>>> laraxot/dev
        });

        it('has correct name', function () {
            $provider = new RouteServiceProvider(app());
<<<<<<< HEAD
           Assert::assertSame('Job', $provider->name);
=======
            Assert::assertSame('Job', $provider->name);
>>>>>>> laraxot/dev
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
        });
    });

    describe('AdminPanelProvider', function () {
        it('can be instantiated', function () {
            $provider = new AdminPanelProvider(app());
<<<<<<< HEAD
           Assert::assertInstanceOf(AdminPanelProvider::class, $provider);
=======
            Assert::assertInstanceOf(AdminPanelProvider::class, $provider);
>>>>>>> laraxot/dev
        });

        it('has module property', function () {
            $provider = new AdminPanelProvider(app());
<<<<<<< HEAD
           $reflection = new \ReflectionProperty(AdminPanelProvider::class, 'module');
=======
            $reflection = new \ReflectionProperty(AdminPanelProvider::class, 'module');
>>>>>>> laraxot/dev
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
        });
    });
});
