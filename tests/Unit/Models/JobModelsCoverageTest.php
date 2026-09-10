<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Models;
<<<<<<< HEAD
use function Safe\class_uses;
=======

>>>>>>> laraxot/dev
use Modules\Job\Models\BaseModel;
use Modules\Job\Models\Export;
use Modules\Job\Models\FailedJob;
use Modules\Job\Models\Frequency;
use Modules\Job\Models\Import;
use Modules\Job\Models\JobBatch;
use Modules\Job\Models\JobManager;
use Modules\Job\Models\Result;
use Modules\Job\Models\Schedule;
use Modules\Job\Models\Task;
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
<<<<<<< HEAD
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);
=======

use function Safe\class_uses;
use function Safe\file_get_contents;

uses(TestCase::class);
>>>>>>> laraxot/dev

describe('Job Models Coverage', function () {
    describe('Task Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $task = new Task;
=======
            $task = new Task();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Task::class, $task);
        });

        it('uses HasXotFactory trait', function () {
            Assert::assertTrue(in_array('Modules\Xot\Models\Traits\HasXotFactory', class_uses(Task::class)));
        });

        it('uses FrontendSortable trait', function () {
            Assert::assertTrue(in_array('Modules\Job\Models\Traits\FrontendSortable', class_uses(Task::class)));
        });

        it('uses Notifiable trait', function () {
            Assert::assertTrue(in_array('Illuminate\Notifications\Notifiable', class_uses(Task::class)));
        });

        it('has fillable fields defined', function () {
<<<<<<< HEAD
            $task = new Task;
=======
            $task = new Task();
>>>>>>> laraxot/dev
            Assert::assertContains('command', $task->getFillable());
            Assert::assertContains('description', $task->getFillable());
            Assert::assertContains('expression', $task->getFillable());
        });

        it('has appends defined', function () {
<<<<<<< HEAD
            $task = new Task;
=======
            $task = new Task();
>>>>>>> laraxot/dev
            Assert::assertContains('activated', $task->getAppends());
            Assert::assertContains('upcoming', $task->getAppends());
            Assert::assertContains('average_runtime', $task->getAppends());
        });

        it('has frequencies relationship', function () {
            $reflection = new \ReflectionClass(Task::class);
            Assert::assertTrue($reflection->hasMethod('frequencies'));
        });

        it('has results relationship', function () {
            $reflection = new \ReflectionClass(Task::class);
            Assert::assertTrue($reflection->hasMethod('results'));
        });

        it('has compileParameters method', function () {
            $reflection = new \ReflectionClass(Task::class);
            Assert::assertTrue($reflection->hasMethod('compileParameters'));
        });

        it('has autoCleanup method', function () {
            $reflection = new \ReflectionClass(Task::class);
            Assert::assertTrue($reflection->hasMethod('autoCleanup'));
        });

        it('has notification routing methods', function () {
            $reflection = new \ReflectionClass(Task::class);
            Assert::assertTrue($reflection->hasMethod('routeNotificationForMail'));
            Assert::assertTrue($reflection->hasMethod('routeNotificationForNexmo'));
            Assert::assertTrue($reflection->hasMethod('routeNotificationForSlack'));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Task::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Frequency Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new Frequency;
=======
            $model = new Frequency();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Frequency::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Frequency::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Frequency::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Result Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new Result;
=======
            $model = new Result();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Result::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Result::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Result::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Schedule Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new Schedule;
=======
            $model = new Schedule();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Schedule::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Schedule::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Schedule::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Import Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new Import;
=======
            $model = new Import();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Import::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Import::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Import::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Export Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new Export;
=======
            $model = new Export();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(Export::class, $model);
        });

        it('extends Filament Export', function () {
            $reflection = new \ReflectionClass(Export::class);
            Assert::assertTrue($reflection->isSubclassOf(\Filament\Actions\Exports\Models\Export::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Export::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('JobBatch Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new JobBatch;
=======
            $model = new JobBatch();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(JobBatch::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(JobBatch::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(JobBatch::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('JobManager Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new JobManager;
=======
            $model = new JobManager();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(JobManager::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(JobManager::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(JobManager::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('FailedJob Model', function () {
        it('can be instantiated', function () {
<<<<<<< HEAD
            $model = new FailedJob;
=======
            $model = new FailedJob();
>>>>>>> laraxot/dev
            Assert::assertInstanceOf(FailedJob::class, $model);
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(FailedJob::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(FailedJob::class);
            $filename = $reflection->getFileName();
<<<<<<< HEAD
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
=======
            Assert::assertNotFalse($filename);
            $content = file_get_contents($filename);
>>>>>>> laraxot/dev
            Assert::assertStringContainsString('', $content);
        });
    });
});
