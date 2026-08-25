<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Models;
use function Safe\class_uses;
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
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);

describe('Job Models Coverage', function () {
    describe('Task Model', function () {
        it('can be instantiated', function () {
            $task = new Task;
<<<<<<< HEAD
           Assert::assertInstanceOf(Task::class, $task);
=======
            Assert::assertInstanceOf(Task::class, $task);
>>>>>>> laraxot/dev
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
            $task = new Task;
<<<<<<< HEAD
           Assert::assertContains('command', $task->getFillable());
=======
            Assert::assertContains('command', $task->getFillable());
>>>>>>> laraxot/dev
            Assert::assertContains('description', $task->getFillable());
            Assert::assertContains('expression', $task->getFillable());
        });

        it('has appends defined', function () {
            $task = new Task;
<<<<<<< HEAD
           Assert::assertContains('activated', $task->getAppends());
=======
            Assert::assertContains('activated', $task->getAppends());
>>>>>>> laraxot/dev
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
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Frequency Model', function () {
        it('can be instantiated', function () {
            $model = new Frequency;
<<<<<<< HEAD
           Assert::assertInstanceOf(Frequency::class, $model);
=======
            Assert::assertInstanceOf(Frequency::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Frequency::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Frequency::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Result Model', function () {
        it('can be instantiated', function () {
            $model = new Result;
<<<<<<< HEAD
           Assert::assertInstanceOf(Result::class, $model);
=======
            Assert::assertInstanceOf(Result::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Result::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Result::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Schedule Model', function () {
        it('can be instantiated', function () {
            $model = new Schedule;
<<<<<<< HEAD
           Assert::assertInstanceOf(Schedule::class, $model);
=======
            Assert::assertInstanceOf(Schedule::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Schedule::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Schedule::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Import Model', function () {
        it('can be instantiated', function () {
            $model = new Import;
<<<<<<< HEAD
           Assert::assertInstanceOf(Import::class, $model);
=======
            Assert::assertInstanceOf(Import::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(Import::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Import::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('Export Model', function () {
        it('can be instantiated', function () {
            $model = new Export;
<<<<<<< HEAD
           Assert::assertInstanceOf(Export::class, $model);
=======
            Assert::assertInstanceOf(Export::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends Filament Export', function () {
            $reflection = new \ReflectionClass(Export::class);
            Assert::assertTrue($reflection->isSubclassOf(\Filament\Actions\Exports\Models\Export::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(Export::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('JobBatch Model', function () {
        it('can be instantiated', function () {
            $model = new JobBatch;
<<<<<<< HEAD
           Assert::assertInstanceOf(JobBatch::class, $model);
=======
            Assert::assertInstanceOf(JobBatch::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(JobBatch::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(JobBatch::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('JobManager Model', function () {
        it('can be instantiated', function () {
            $model = new JobManager;
<<<<<<< HEAD
           Assert::assertInstanceOf(JobManager::class, $model);
=======
            Assert::assertInstanceOf(JobManager::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(JobManager::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(JobManager::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });

    describe('FailedJob Model', function () {
        it('can be instantiated', function () {
            $model = new FailedJob;
<<<<<<< HEAD
           Assert::assertInstanceOf(FailedJob::class, $model);
=======
            Assert::assertInstanceOf(FailedJob::class, $model);
>>>>>>> laraxot/dev
        });

        it('extends BaseModel', function () {
            $reflection = new \ReflectionClass(FailedJob::class);
            Assert::assertTrue($reflection->isSubclassOf(BaseModel::class));
        });

        it('uses strict types', function () {
            $reflection = new \ReflectionClass(FailedJob::class);
            $filename = $reflection->getFileName();
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
        });
    });
});
