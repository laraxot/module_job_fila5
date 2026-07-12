<?php

declare(strict_types=1);

namespace Modules\Job\Models\Policies;

use Modules\Job\Models\FailedJob;
use Modules\Xot\Contracts\UserContract;

class FailedJobPolicy extends JobBasePolicy
{
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('failed_job.viewAny');
    }

    public function view(UserContract $user, FailedJob $_failedJob): bool
    {
        return $user->hasPermissionTo('failed_job.view');
    }

    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('failed_job.create');
    }

    public function update(UserContract $user, FailedJob $_failedJob): bool
    {
        return $user->hasPermissionTo('failed_job.update');
    }

    public function delete(UserContract $user, FailedJob $_failedJob): bool
    {
        return $user->hasPermissionTo('failed_job.delete');
    }
}
