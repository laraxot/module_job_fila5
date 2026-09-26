<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit;

use Mockery;
use Mockery\MockInterface;
use Modules\Job\Models\Policies\FailedImportRowPolicy;
use Modules\Job\Models\Policies\FailedJobPolicy;
use Modules\Job\Models\Policies\ImportPolicy;
use Modules\Job\Models\Policies\JobBatchPolicy;
use Modules\Job\Models\Policies\JobPolicy;
use Modules\Job\Models\Policies\ScheduleHistoryPolicy;
use Modules\Job\Models\Policies\SchedulePolicy;
use Modules\Job\Models\Policies\TaskCommentPolicy;
use Modules\Job\Models\Policies\TaskPolicy;
use Modules\Job\Models\Schedule;
use Modules\Job\Models\ScheduleHistory;
use Modules\Job\Models\Task;
use Modules\Job\Models\TaskComment;
use Modules\Job\Tests\TestCase;
use Modules\User\Models\Team;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
<<<<<<< .merge_file_F4rHQG
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
<<<<<<< .merge_file_pf8Axe
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
=======
uses(TestCase::class)->group('no-job-db');
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
uses(\Modules\Job\Tests\TestCase::class)->group('no-job-db');
>>>>>>> laraxot/dev

/**
 * @param  list<string>  $permissions
 * @param  list<string>  $roles
 * @return MockInterface&UserContract
 */
function jobFakeUser(array $permissions = [], bool $ownsTeam = false, bool $belongsToTeam = false, array $roles = []): UserContract
{
    /** @var MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
    expectMethod($user, 'hasPermissionTo')
        ->andReturnUsing(static fn (string $permission): bool => in_array($permission, $permissions, true));
    expectMethod($user, 'hasRole')
        ->andReturnUsing(static function (array|string $richiesti) use ($roles): bool {
            /** @var list<string> $normalizzati */
            $normalizzati = is_array($richiesti) ? $richiesti : [$richiesti];

            return array_intersect($normalizzati, $roles) !== [];
        });
    expectMethod($user, 'ownsTeam')->andReturn($ownsTeam);
    expectMethod($user, 'belongsToTeam')->andReturn($belongsToTeam);

    return $user;
}

afterEach(function (): void {
    Mockery::close();
});

test('TaskPolicy richiede permessi task.*', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
    $policy = new TaskPolicy();
    $task = new Task();
=======
<<<<<<< .merge_file_F4rHQG
    $policy = new TaskPolicy();
    $task = new Task();
=======
<<<<<<< .merge_file_pf8Axe
    $policy = new TaskPolicy();
    $task = new Task();
=======
    $policy = new TaskPolicy;
    $task = new Task;
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
    $policy = new TaskPolicy();
    $task = new Task();
>>>>>>> laraxot/dev

    Assert::assertTrue($policy->viewAny(jobFakeUser(['task.viewAny'])));
    Assert::assertTrue($policy->view(jobFakeUser(['task.view']), $task));
    Assert::assertTrue($policy->create(jobFakeUser(['task.create'])));
    Assert::assertTrue($policy->update(jobFakeUser(['task.update']), $task));
    Assert::assertTrue($policy->delete(jobFakeUser(['task.delete']), $task));
});

test('SchedulePolicy e ScheduleHistoryPolicy espongono CRUD', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
=======
<<<<<<< .merge_file_F4rHQG
=======
<<<<<<< .merge_file_pf8Axe
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
>>>>>>> laraxot/dev
    $schedulePolicy = new SchedulePolicy();
    $schedule = new Schedule();
    Assert::assertTrue($schedulePolicy->viewAny(jobFakeUser(['schedule.viewAny'])));
    Assert::assertTrue($schedulePolicy->view(jobFakeUser(['schedule.view']), $schedule));

    $historyPolicy = new ScheduleHistoryPolicy();
    $history = new ScheduleHistory();
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
=======
<<<<<<< .merge_file_F4rHQG
=======
=======
    $schedulePolicy = new SchedulePolicy;
    $schedule = new Schedule;
    Assert::assertTrue($schedulePolicy->viewAny(jobFakeUser(['schedule.viewAny'])));
    Assert::assertTrue($schedulePolicy->view(jobFakeUser(['schedule.view']), $schedule));

    $historyPolicy = new ScheduleHistoryPolicy;
    $history = new ScheduleHistory;
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
>>>>>>> laraxot/dev
    Assert::assertTrue($historyPolicy->viewAny(jobFakeUser(['schedule_history.viewAny'])));
    Assert::assertTrue($historyPolicy->view(jobFakeUser(['schedule_history.view']), $history));
});

test('TaskCommentPolicy espone CRUD', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
    $policy = new TaskCommentPolicy();
    $comment = new TaskComment();
=======
<<<<<<< .merge_file_F4rHQG
    $policy = new TaskCommentPolicy();
    $comment = new TaskComment();
=======
<<<<<<< .merge_file_pf8Axe
    $policy = new TaskCommentPolicy();
    $comment = new TaskComment();
=======
    $policy = new TaskCommentPolicy;
    $comment = new TaskComment;
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
    $policy = new TaskCommentPolicy();
    $comment = new TaskComment();
>>>>>>> laraxot/dev

    Assert::assertTrue($policy->create(jobFakeUser(['task_comment.create'])));
    Assert::assertTrue($policy->update(jobFakeUser(['task_comment.update']), $comment));
});

test('JobPolicy delega su Team', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
    $policy = new JobPolicy();
    $team = new Team();
=======
<<<<<<< .merge_file_F4rHQG
    $policy = new JobPolicy();
    $team = new Team();
=======
<<<<<<< .merge_file_pf8Axe
    $policy = new JobPolicy();
    $team = new Team();
=======
    $policy = new JobPolicy;
    $team = new Team;
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
    $policy = new JobPolicy();
    $team = new Team();
>>>>>>> laraxot/dev

    Assert::assertFalse($policy->viewAny(jobFakeUser()));
    Assert::assertTrue($policy->view(jobFakeUser(belongsToTeam: true), $team));
    Assert::assertTrue($policy->create(jobFakeUser()));
    Assert::assertTrue($policy->delete(jobFakeUser(ownsTeam: true), $team));
});

test('FailedJobPolicy e JobBatchPolicy espongono metodi team', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
    foreach ([new FailedJobPolicy(), new JobBatchPolicy()] as $policy) {
        $team = new Team();
=======
<<<<<<< .merge_file_F4rHQG
    foreach ([new FailedJobPolicy(), new JobBatchPolicy()] as $policy) {
        $team = new Team();
=======
<<<<<<< .merge_file_pf8Axe
    foreach ([new FailedJobPolicy(), new JobBatchPolicy()] as $policy) {
        $team = new Team();
=======
    foreach ([new FailedJobPolicy, new JobBatchPolicy] as $policy) {
        $team = new Team;
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
    foreach ([new FailedJobPolicy(), new JobBatchPolicy()] as $policy) {
        $team = new Team();
>>>>>>> laraxot/dev
        Assert::assertFalse($policy->viewAny(jobFakeUser()));
        Assert::assertTrue($policy->addTeamMember(jobFakeUser(ownsTeam: true), $team));
    }
});

test('policy stub ereditano JobBasePolicy', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_XDaTQx
    foreach ([new ImportPolicy(), new FailedImportRowPolicy()] as $policy) {
=======
<<<<<<< .merge_file_F4rHQG
    foreach ([new ImportPolicy(), new FailedImportRowPolicy()] as $policy) {
=======
<<<<<<< .merge_file_pf8Axe
    foreach ([new ImportPolicy(), new FailedImportRowPolicy()] as $policy) {
=======
    foreach ([new ImportPolicy, new FailedImportRowPolicy] as $policy) {
>>>>>>> .merge_file_W6xPQW
>>>>>>> .merge_file_l4Jvxp
>>>>>>> .merge_file_OnOhQp
=======
    foreach ([new ImportPolicy(), new FailedImportRowPolicy()] as $policy) {
>>>>>>> laraxot/dev
        Assert::assertTrue($policy->before(jobFakeUser(), 'viewAny') === null);
    }
});
