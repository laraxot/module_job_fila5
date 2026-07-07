<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Models;
<<<<<<< HEAD

=======
use function Safe\class_uses;
>>>>>>> origin/dev
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
<<<<<<< HEAD
=======
use Modules\Job\Tests\TestCase;
use PHPUnit\Framework\Assert;
use function Safe\file_get_contents;

uses(\Modules\Job\Tests\TestCase::class);
>>>>>>> origin/dev

describe('Job Models Coverage', function () {
    describe('Task Model', function () {
        it('can be instantiated', function () {
            $task = new Task;
<<<<<<< HEAD
            expect($task)->toBeInstanceOf(Task::class);
        });

        it('uses HasXotFactory trait', function () {
            expect(in_array('Modules\Xot\Models\Traits\HasXotFactory', class_uses(Task::class)))->toBeTrue();
        });

        it('uses FrontendSortable trait', function () {
            expect(in_array('Modules\Job\Models\Traits\FrontendSortable', class_uses(Task::class)))->toBeTrue();
        });

        it('uses Notifiable trait', function () {
            expect(in_array('Illuminate\Notifications\Notifiable', class_uses(Task::class)))->toBeTrue();
=======
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
>>>>>>> origin/dev
        });

        it('has fillable fields defined', function () {
            $task = new Task;
<<<<<<< HEAD
            expect($task->getFillable())->toContain('command');
            expect($task->getFillable())->toContain('description');
            expect($task->getFillable())->toContain('expression');
=======
            Assert::assertContains('command', $task->getFillable());
            Assert::assertContains('description', $task->getFillable());
            Assert::assertContains('expression', $task->getFillable());
>>>>>>> origin/dev
        });

        it('has appends defined', function () {
            $task = new Task;
<<<<<<< HEAD
            expect($task->getAppends())->toContain('activated');
            expect($task->getAppends())->toContain('upcoming');
            expect($task->getAppends())->toContain('average_runtime');
        });

        it('has frequencies relationship', function () {
            $task = new Task;
            expect(method_exists($task, 'frequencies'))->toBeTrue();
        });

        it('has results relationship', function () {
            $task = new Task;
            expect(method_exists($task, 'results'))->toBeTrue();
        });

        it('has compileParameters method', function () {
            $task = new Task;
            expect(method_exists($task, 'compileParameters'))->toBeTrue();
        });

        it('has autoCleanup method', function () {
            $task = new Task;
            expect(method_exists($task, 'autoCleanup'))->toBeTrue();
        });

        it('has notification routing methods', function () {
            $task = new Task;
            expect(method_exists($task, 'routeNotificationForMail'))->toBeTrue();
            expect(method_exists($task, 'routeNotificationForNexmo'))->toBeTrue();
            expect(method_exists($task, 'routeNotificationForSlack'))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Task::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
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
        Assert::assertNotFalse($filename);
        $content = file_get_contents($filename);
            Assert::assertStringContainsString('', $content);
>>>>>>> origin/dev
        });
    });

    describe('Frequency Model', function () {
        it('can be instantiated', function () {
            $model = new Frequency;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(Frequency::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(Frequency::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Frequency::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(Frequency::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('Result Model', function () {
        it('can be instantiated', function () {
            $model = new Result;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(Result::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(Result::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Result::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(Result::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('Schedule Model', function () {
        it('can be instantiated', function () {
            $model = new Schedule;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(Schedule::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(Schedule::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Schedule::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(Schedule::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('Import Model', function () {
        it('can be instantiated', function () {
            $model = new Import;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(Import::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(Import::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Import::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(Import::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('Export Model', function () {
        it('can be instantiated', function () {
            $model = new Export;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(Export::class);
        });

        it('extends Filament Export', function () {
            $reflection = new ReflectionClass(Export::class);
            expect($reflection->isSubclassOf(\Filament\Actions\Exports\Models\Export::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(Export::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(Export::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('JobBatch Model', function () {
        it('can be instantiated', function () {
            $model = new JobBatch;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(JobBatch::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(JobBatch::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(JobBatch::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(JobBatch::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('JobManager Model', function () {
        it('can be instantiated', function () {
            $model = new JobManager;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(JobManager::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(JobManager::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(JobManager::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(JobManager::class, $model);
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
>>>>>>> origin/dev
        });
    });

    describe('FailedJob Model', function () {
        it('can be instantiated', function () {
            $model = new FailedJob;
<<<<<<< HEAD
            expect($model)->toBeInstanceOf(FailedJob::class);
        });

        it('extends BaseModel', function () {
            $reflection = new ReflectionClass(FailedJob::class);
            expect($reflection->isSubclassOf(BaseModel::class))->toBeTrue();
        });

        it('uses strict types', function () {
            $reflection = new ReflectionClass(FailedJob::class);
            $content = file_get_contents($reflection->getFileName());
            expect($content)->toContain('');
=======
            Assert::assertInstanceOf(FailedJob::class, $model);
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
>>>>>>> origin/dev
        });
    });
});
