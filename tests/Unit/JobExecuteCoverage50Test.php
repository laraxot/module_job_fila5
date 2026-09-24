<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit;

use Illuminate\Console\Application;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Testing\PendingCommand;
use Illuminate\Translation\PotentiallyTranslatedString;
use Mockery;
use Mockery\Expectation;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use Modules\Job\Actions\Command\GetCommandsAction;
use Modules\Job\Actions\DummyAction;
use Modules\Job\Enums\Status;
use Modules\Job\Events\BroadcastingEvent;
use Modules\Job\Events\PrivateEvent;
use Modules\Job\Events\PublicEvent;
use Modules\Job\Filament\Columns\ActionGroup;
use Modules\Job\Filament\Resources\ExportResource;
use Modules\Job\Filament\Resources\FailedImportRowResource;
use Modules\Job\Filament\Resources\FailedJobResource;
use Modules\Job\Filament\Resources\ImportResource;
use Modules\Job\Filament\Resources\JobBatchResource;
use Modules\Job\Filament\Resources\JobManagerResource;
use Modules\Job\Filament\Resources\JobResource;
use Modules\Job\Filament\Resources\JobsWaitingResource;
<<<<<<< .merge_file_f75mWY
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Http\Livewire\Broad;
=======
<<<<<<< .merge_file_Ssa7Ti
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Http\Livewire\Broad;
=======
<<<<<<< .merge_file_SacQT0
use Modules\Job\Filament\Resources\ScheduleResource;
use Modules\Job\Http\Livewire\Broad;
=======
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
use Modules\Job\Http\Requests\ScheduleRequest;
use Modules\Job\Models\FailedJob;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobBatch;
use Modules\Job\Models\Policies\FailedJobPolicy;
use Modules\Job\Models\Policies\JobBatchPolicy;
use Modules\Job\Models\Policies\JobPolicy;
use Modules\Job\Models\Policies\ResultPolicy;
use Modules\Job\Models\Policies\ScheduleHistoryPolicy;
use Modules\Job\Models\Policies\SchedulePolicy;
use Modules\Job\Models\Policies\TaskCommentPolicy;
use Modules\Job\Models\Policies\TaskPolicy;
use Modules\Job\Models\Result;
use Modules\Job\Models\Schedule;
use Modules\Job\Models\ScheduleHistory;
use Modules\Job\Models\Task;
use Modules\Job\Models\TaskComment;
use Modules\Job\Notifications\TaskCompleted;
use Modules\Job\Observers\ScheduleObserver;
use Modules\Job\Rules\Corn;
use Modules\Job\Tests\TestCase;
use Modules\Job\Traits\FormatSeconds;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

/**
 * Narrows Mockery's shouldReceive() union return type for PHPStan.
 */
function expectMethod(LegacyMockInterface|MockInterface $mock, string $method): Expectation
{
    /** @var Expectation $expectation */
    $expectation = $mock->shouldReceive($method);

    return $expectation;
}

use function Safe\ob_get_clean;
use function Safe\ob_start;

<<<<<<< .merge_file_f75mWY
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
<<<<<<< .merge_file_Ssa7Ti
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
<<<<<<< .merge_file_SacQT0
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
uses(TestCase::class)->group('no-job-db');
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS

afterEach(function (): void {
    Mockery::close();
});

function jobBindArtisan(): void
{
    $kernel = app(Kernel::class);
    $method = new \ReflectionMethod($kernel, 'getArtisan');
    $method->setAccessible(true);
    app()->instance(Application::class, $method->invoke($kernel));
}

/**
 * @return MockInterface&UserContract
 */
function jobUser(bool $superAdmin = false): UserContract
{
    /** @var MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
    $user->shouldIgnoreMissing();
    expectMethod($user, 'hasRole')->with('super-admin')->andReturn($superAdmin);
    expectMethod($user, 'can')->andReturn(true);
    expectMethod($user, 'belongsToTeam')->andReturn(true);
    expectMethod($user, 'ownsTeam')->andReturn(true);
    expectMethod($user, 'hasPermissionTo')->andReturn(true);
    $user->id = '1';

    return $user;
}

describe('Job execute coverage — Filament resources', function (): void {
    test('tutti i getFormSchemaOld eseguono lo schema', function (): void {
        $classi = [
            FailedJobResource::class,
            JobBatchResource::class,
            JobResource::class,
            ExportResource::class,
            FailedImportRowResource::class,
            JobManagerResource::class,
            ImportResource::class,
            JobsWaitingResource::class,
        ];

        foreach ($classi as $classe) {
            $schema = $classe::getFormSchemaOld();
            Assert::assertIsArray($schema);
            Assert::assertNotEmpty($classe::getPages());
            Assert::assertTrue(class_exists($classe::getModel()));
        }
    });

<<<<<<< .merge_file_f75mWY
    
=======
<<<<<<< .merge_file_Ssa7Ti
    
=======
<<<<<<< .merge_file_SacQT0
    
=======
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
});

describe('Job execute coverage — policies', function (): void {
    test('JobBasePolicy before apre super-admin e lascia gli altri', function (): void {
<<<<<<< .merge_file_f75mWY
        $policy = new ResultPolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $policy = new ResultPolicy();
=======
<<<<<<< .merge_file_SacQT0
        $policy = new ResultPolicy();
=======
        $policy = new ResultPolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS

        Assert::assertTrue($policy->before(jobUser(true), 'viewAny'));
        Assert::assertNull($policy->before(jobUser(false), 'viewAny'));
    });

    test('policy foglia si istanziano e before gira su tutte', function (): void {
        foreach ([
            FailedJobPolicy::class,
            JobPolicy::class,
            SchedulePolicy::class,
            TaskPolicy::class,
        ] as $class) {
<<<<<<< .merge_file_f75mWY
            $policy = new $class();
=======
<<<<<<< .merge_file_Ssa7Ti
            $policy = new $class();
=======
<<<<<<< .merge_file_SacQT0
            $policy = new $class();
=======
            $policy = new $class;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
            Assert::assertNull($policy->before(jobUser(false), 'update'));
            Assert::assertTrue($policy->before(jobUser(true), 'delete'));
        }
    });
});

describe('Job execute coverage — Task e notification', function (): void {
    test('compileParameters gestisce null, json e formatter scheduler', function (): void {
<<<<<<< .merge_file_f75mWY
        $task = new Task();
=======
<<<<<<< .merge_file_Ssa7Ti
        $task = new Task();
=======
<<<<<<< .merge_file_SacQT0
        $task = new Task();
=======
        $task = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertSame([], $task->compileParameters());

        $task->parameters = json_encode(['env' => true, 'name' => 'foo'], JSON_THROW_ON_ERROR);
        Assert::assertSame(['env' => true, 'name' => 'foo'], $task->compileParameters(false));
        Assert::assertSame(['env' => '1', 'name' => 'foo'], $task->compileParameters(true));
    });

    test('accessor e routeNotification non toccano il database', function (): void {
<<<<<<< .merge_file_f75mWY
        $task = new Task();
=======
<<<<<<< .merge_file_Ssa7Ti
        $task = new Task();
=======
<<<<<<< .merge_file_SacQT0
        $task = new Task();
=======
        $task = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $task->is_active = 1;
        $task->notification_email_address = 'a@b.c';
        $task->notification_phone_number = '333';
        $task->notification_slack_webhook = 'https://hooks.slack.test';

        Assert::assertTrue($task->activated);
        Assert::assertSame('preso', $task->upcoming);
        Assert::assertSame('a@b.c', $task->routeNotificationForMail());
        Assert::assertSame('333', $task->routeNotificationForNexmo());
        Assert::assertSame('https://hooks.slack.test', $task->routeNotificationForSlack());
        Assert::assertInstanceOf(HasMany::class, $task->frequencies());
        Assert::assertInstanceOf(HasMany::class, $task->results());
    });

    test('TaskCompleted via e toMail coprono i canali configurati', function (): void {
        $notification = new TaskCompleted('done');

<<<<<<< .merge_file_f75mWY
        $empty = new Task();
=======
<<<<<<< .merge_file_Ssa7Ti
        $empty = new Task();
=======
<<<<<<< .merge_file_SacQT0
        $empty = new Task();
=======
        $empty = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $empty->notification_email_address = null;
        $empty->notification_phone_number = null;
        $empty->notification_slack_webhook = '0';
        Assert::assertSame([], $notification->via($empty));

<<<<<<< .merge_file_f75mWY
        $full = new Task();
=======
<<<<<<< .merge_file_Ssa7Ti
        $full = new Task();
=======
<<<<<<< .merge_file_SacQT0
        $full = new Task();
=======
        $full = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $full->description = 'Nightly';
        $full->notification_email_address = 'ops@example.com';
        $full->notification_phone_number = '111';
        $full->notification_slack_webhook = 'https://hooks.example';
        Assert::assertSame(['mail', 'nexmo', 'slack'], $notification->via($full));

        $mail = $notification->toMail($full);
        Assert::assertNotEmpty($mail->subject);
    });

    test('autoCleanup no-op quando num è zero', function (): void {
<<<<<<< .merge_file_f75mWY
        $task = new Task();
=======
<<<<<<< .merge_file_Ssa7Ti
        $task = new Task();
=======
<<<<<<< .merge_file_SacQT0
        $task = new Task();
=======
        $task = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $task->auto_cleanup_num = 0;
        $task->autoCleanup();
        Assert::assertSame(0, $task->auto_cleanup_num);
    });
});

describe('Job execute coverage — events request rules columns', function (): void {
    test('eventi di broadcast espongono i canali', function (): void {
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
<<<<<<< .merge_file_SacQT0
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertSame('public', (new PublicEvent())->broadcastOn()->name);
        Assert::assertStringContainsString('private.', (new PrivateEvent('ciao'))->broadcastOn()->name);

        $task = new Task();
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
=======
        Assert::assertSame('public', (new PublicEvent)->broadcastOn()->name);
        Assert::assertStringContainsString('private.', (new PrivateEvent('ciao'))->broadcastOn()->name);

        $task = new Task;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $event = new BroadcastingEvent($task);
        Assert::assertStringContainsString('task.events', $event->broadcastOn()->name);
        Assert::assertTrue($event->broadcastWhen());
    });

    test('ScheduleRequest authorize rules attributes messages e merge', function (): void {
        $request = ScheduleRequest::create('/job/schedules', 'POST', []);
        $request->setContainer(app())->setRedirector(app('redirect'));

        Assert::assertTrue($request->authorize());
        Assert::assertArrayHasKey('command', $request->rules());
        Assert::assertArrayHasKey('command', $request->attributes());
        Assert::assertArrayHasKey('groups.regex', $request->messages());
    });

    test('Corn valida espressione cron e rifiuta valori non stringa', function (): void {
<<<<<<< .merge_file_f75mWY
        $rule = new Corn();
=======
<<<<<<< .merge_file_Ssa7Ti
        $rule = new Corn();
=======
<<<<<<< .merge_file_SacQT0
        $rule = new Corn();
=======
        $rule = new Corn;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $failed = false;
        $rule->validate('expression', ['not-string'], static function (string $message, ?string $attribute = null) use (&$failed): PotentiallyTranslatedString {
            $failed = true;

            return new PotentiallyTranslatedString($message, app(Translator::class));
        });
        Assert::assertTrue($failed);

        $failed = false;
        $rule->validate('expression', 'not a cron', static function (string $message, ?string $attribute = null) use (&$failed): PotentiallyTranslatedString {
            $failed = true;

            return new PotentiallyTranslatedString($message, app(Translator::class));
        });
        Assert::assertTrue($failed);

        $failed = false;
        $rule->validate('expression', '* * * * *', static function (string $message, ?string $attribute = null) use (&$failed): PotentiallyTranslatedString {
            $failed = true;

            return new PotentiallyTranslatedString($message, app(Translator::class));
        });
        Assert::assertFalse($failed);
    });

    test('ActionGroup getActions è vuoto ma eseguito', function (): void {
        $group = ActionGroup::make([]);
        Assert::assertSame([], $group->getActions());
    });
});

describe('Job execute coverage — actions enums commands livewire', function (): void {
    test('DummyAction e GetCommandsAction eseguono', function (): void {
        ob_start();
<<<<<<< .merge_file_f75mWY
        (new DummyAction())->execute();
=======
<<<<<<< .merge_file_Ssa7Ti
        (new DummyAction())->execute();
=======
<<<<<<< .merge_file_SacQT0
        (new DummyAction())->execute();
=======
        (new DummyAction)->execute();
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $out = (string) ob_get_clean();
        Assert::assertStringContainsString('hello', $out);

        jobBindArtisan();
<<<<<<< .merge_file_f75mWY
        $commands = (new GetCommandsAction())->execute();
=======
<<<<<<< .merge_file_Ssa7Ti
        $commands = (new GetCommandsAction())->execute();
=======
<<<<<<< .merge_file_SacQT0
        $commands = (new GetCommandsAction())->execute();
=======
        $commands = (new GetCommandsAction)->execute();
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertGreaterThan(0, $commands->count());
    });

    test('Status enum espone label color icon tramite EnumTrait', function (): void {
        foreach (Status::cases() as $case) {
            Assert::assertNotSame('', $case->getLabel());
            Assert::assertNotSame('', $case->getColor());
            Assert::assertNotSame('', $case->getIcon());
        }
    });

    test('FormatSeconds copre giorni ore minuti secondi', function (): void {
<<<<<<< .merge_file_f75mWY
        $probe = new class()
=======
<<<<<<< .merge_file_Ssa7Ti
        $probe = new class()
=======
<<<<<<< .merge_file_SacQT0
        $probe = new class()
=======
        $probe = new class
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        {
            use FormatSeconds;
        };

        Assert::assertStringContainsString('d', $probe->formatSeconds(90061));
        Assert::assertSame('1 m 0 s', $probe->formatSeconds(60));
        Assert::assertSame('', $probe->formatSeconds(0));
    });

    test('artisan phpunit:test e schedule:test-job eseguono handle', function (): void {
        $phpunit = $this->artisan('phpunit:test', ['argument' => 'x']);
        $schedule = $this->artisan('schedule:test-job');
        Assert::assertInstanceOf(PendingCommand::class, $phpunit);
        Assert::assertInstanceOf(PendingCommand::class, $schedule);
        $phpunit->assertExitCode(0);
        $schedule->assertExitCode(0);
    });

<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
<<<<<<< .merge_file_SacQT0
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
    test('Livewire Broad try flasha sessione senza dd', function (): void {
        $component = new Broad();
        $component->try();
        Assert::assertTrue(session()->has('message'));
    });

    test('modelli foglia espongono tabella', function (): void {
        Assert::assertSame('jobs', (new Job())->getTable());
        Assert::assertSame('failed_jobs', (new FailedJob())->getTable());
        Assert::assertSame('job_batches', (new JobBatch())->getTable());
        Assert::assertSame('schedules', (new Schedule())->getTable());
        Assert::assertSame('results', (new Result())->getTable());
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
=======
    test('Livewire Broad ritirato: classe e vista assenti', function (): void {
        Assert::assertFalse(class_exists('Modules\\Job\\Http\\Livewire\\Broad', false));
        Assert::assertFileDoesNotExist(base_path('Modules/Job/app/Http/Livewire/Broad.php'));
        Assert::assertFileDoesNotExist(base_path('Modules/Job/resources/views/livewire/broad.blade.php'));
    });

    test('modelli foglia espongono tabella', function (): void {
        Assert::assertSame('jobs', (new Job)->getTable());
        Assert::assertSame('failed_jobs', (new FailedJob)->getTable());
        Assert::assertSame('job_batches', (new JobBatch)->getTable());
        Assert::assertSame('schedules', (new Schedule)->getTable());
        Assert::assertSame('results', (new Result)->getTable());
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
    });

    test('policy CRUD con Team e hasPermissionTo', function (): void {
        $user = jobUser(false);
<<<<<<< .merge_file_f75mWY
        $team = new Team();

        $failed = new FailedJobPolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $team = new Team();

        $failed = new FailedJobPolicy();
=======
<<<<<<< .merge_file_SacQT0
        $team = new Team();

        $failed = new FailedJobPolicy();
=======
        $team = new Team;

        $failed = new FailedJobPolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertFalse($failed->viewAny($user));
        Assert::assertTrue($failed->view($user, $team));
        Assert::assertTrue($failed->create($user));
        Assert::assertFalse($failed->update($user));
        Assert::assertTrue($failed->addTeamMember($user, $team));
        Assert::assertTrue($failed->updateTeamMember($user, $team));
        Assert::assertTrue($failed->removeTeamMember($user, $team));
        Assert::assertTrue($failed->delete($user, $team));

<<<<<<< .merge_file_f75mWY
        $jobPolicy = new JobPolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $jobPolicy = new JobPolicy();
=======
<<<<<<< .merge_file_SacQT0
        $jobPolicy = new JobPolicy();
=======
        $jobPolicy = new JobPolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertFalse($jobPolicy->viewAny($user));
        Assert::assertTrue($jobPolicy->view($user, $team));
        Assert::assertTrue($jobPolicy->create($user));
        Assert::assertFalse($jobPolicy->update($user));
        Assert::assertTrue($jobPolicy->delete($user, $team));

<<<<<<< .merge_file_f75mWY
        $batch = new JobBatchPolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $batch = new JobBatchPolicy();
=======
<<<<<<< .merge_file_SacQT0
        $batch = new JobBatchPolicy();
=======
        $batch = new JobBatchPolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertFalse($batch->viewAny($user));
        Assert::assertTrue($batch->create($user));
        Assert::assertFalse($batch->update($user));

<<<<<<< .merge_file_f75mWY
        $schedule = new Schedule();
        $schedulePolicy = new SchedulePolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $schedule = new Schedule();
        $schedulePolicy = new SchedulePolicy();
=======
<<<<<<< .merge_file_SacQT0
        $schedule = new Schedule();
        $schedulePolicy = new SchedulePolicy();
=======
        $schedule = new Schedule;
        $schedulePolicy = new SchedulePolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertTrue($schedulePolicy->viewAny($user));
        Assert::assertTrue($schedulePolicy->view($user, $schedule));
        Assert::assertTrue($schedulePolicy->create($user));
        Assert::assertTrue($schedulePolicy->update($user, $schedule));
        Assert::assertTrue($schedulePolicy->delete($user, $schedule));
        Assert::assertTrue($schedulePolicy->restore($user, $schedule));
        Assert::assertTrue($schedulePolicy->forceDelete($user, $schedule));

<<<<<<< .merge_file_f75mWY
        $comment = new TaskComment();
        $commentPolicy = new TaskCommentPolicy();
=======
<<<<<<< .merge_file_Ssa7Ti
        $comment = new TaskComment();
        $commentPolicy = new TaskCommentPolicy();
=======
<<<<<<< .merge_file_SacQT0
        $comment = new TaskComment();
        $commentPolicy = new TaskCommentPolicy();
=======
        $comment = new TaskComment;
        $commentPolicy = new TaskCommentPolicy;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $commentPolicy->viewAny($user);
        $commentPolicy->view($user, $comment);
        $commentPolicy->create($user);
        $commentPolicy->update($user, $comment);
        $commentPolicy->delete($user, $comment);
        $commentPolicy->restore($user, $comment);
        $commentPolicy->forceDelete($user, $comment);

<<<<<<< .merge_file_f75mWY
        $historyPolicy = new ScheduleHistoryPolicy();
        $history = new ScheduleHistory();
=======
<<<<<<< .merge_file_Ssa7Ti
        $historyPolicy = new ScheduleHistoryPolicy();
        $history = new ScheduleHistory();
=======
<<<<<<< .merge_file_SacQT0
        $historyPolicy = new ScheduleHistoryPolicy();
        $history = new ScheduleHistory();
=======
        $historyPolicy = new ScheduleHistoryPolicy;
        $history = new ScheduleHistory;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        foreach (['viewAny', 'create'] as $m) {
            if (method_exists($historyPolicy, $m)) {
                $historyPolicy->{$m}($user);
            }
        }
        foreach (['view', 'update', 'delete', 'restore', 'forceDelete'] as $m) {
            if (method_exists($historyPolicy, $m)) {
                $historyPolicy->{$m}($user, $history);
            }
        }
    });

    test('FrontendSortable Job accessors Result e ScheduleObserver', function (): void {
        $q = Task::query()->sortableBy(['description'], ['description' => 'asc']);
        Assert::assertInstanceOf(Builder::class, $q);

<<<<<<< .merge_file_f75mWY
        $job = new Job();
=======
<<<<<<< .merge_file_Ssa7Ti
        $job = new Job();
=======
<<<<<<< .merge_file_SacQT0
        $job = new Job();
=======
        $job = new Job;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $job->setRawAttributes(['reserved_at' => 10, 'payload' => json_encode(['displayName' => 'Foo'], JSON_THROW_ON_ERROR)]);
        Assert::assertSame('running', $job->status);
        Assert::assertSame('Foo', $job->display_name);

<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
<<<<<<< .merge_file_SacQT0
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $waiting = new Job();
        $waiting->setRawAttributes(['reserved_at' => null, 'payload' => json_encode(['displayName' => 'Bar'], JSON_THROW_ON_ERROR)]);
        Assert::assertSame('waiting', $waiting->status);

        $result = new Result();
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
=======
        $waiting = new Job;
        $waiting->setRawAttributes(['reserved_at' => null, 'payload' => json_encode(['displayName' => 'Bar'], JSON_THROW_ON_ERROR)]);
        Assert::assertSame('waiting', $waiting->status);

        $result = new Result;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertInstanceOf(BelongsTo::class, $result->task());
        $result->getLastRun();
        $result->getAverageRunTime();

        config(['job::cache.enabled' => false]);
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
<<<<<<< .merge_file_SacQT0
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        $observer = new ScheduleObserver();
        $observer->created();
        $observer->updated(new Schedule());
        $observer->saved(new Schedule());

        $lw = new \Modules\Job\Http\Livewire\Schedule\Status();
<<<<<<< .merge_file_f75mWY
=======
<<<<<<< .merge_file_Ssa7Ti
=======
=======
        $observer = new ScheduleObserver;
        $observer->created();
        $observer->updated(new Schedule);
        $observer->saved(new Schedule);

        $lw = new \Modules\Job\Http\Livewire\Schedule\Status;
>>>>>>> .merge_file_1zhIRq
>>>>>>> .merge_file_QQgG04
>>>>>>> .merge_file_T9RGSS
        Assert::assertCount(0, $lw->getScheduledJobs());
    });
});
