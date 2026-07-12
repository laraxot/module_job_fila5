<?php

declare(strict_types=1);

namespace Modules\Job\Models\Policies;

use Modules\Job\Models\Import;
use Modules\Xot\Contracts\UserContract;

class ImportPolicy extends JobBasePolicy
{
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('import.viewAny');
    }

    public function view(UserContract $user, Import $_import): bool
    {
        return $user->hasPermissionTo('import.view');
    }

    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('import.create');
    }

    public function update(UserContract $user, Import $_import): bool
    {
        return $user->hasPermissionTo('import.update');
    }

    public function delete(UserContract $user, Import $_import): bool
    {
        return $user->hasPermissionTo('import.delete');
    }

    public function restore(UserContract $user, Import $_import): bool
    {
        return $user->hasPermissionTo('import.restore');
    }

    public function forceDelete(UserContract $user, Import $_import): bool
    {
        return $user->hasPermissionTo('import.forceDelete');
    }
}
