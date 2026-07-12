<?php

declare(strict_types=1);

namespace Modules\Job\Models\Policies;

use Modules\Job\Models\Export;
use Modules\Xot\Contracts\UserContract;

class ExportPolicy extends JobBasePolicy
{
    public function viewAny(UserContract $user): bool
    {
        return $user->hasPermissionTo('export.viewAny');
    }

    public function view(UserContract $user, Export $_export): bool
    {
        return $user->hasPermissionTo('export.view');
    }

    public function create(UserContract $user): bool
    {
        return $user->hasPermissionTo('export.create');
    }

    public function update(UserContract $user, Export $_export): bool
    {
        return $user->hasPermissionTo('export.update');
    }

    public function delete(UserContract $user, Export $_export): bool
    {
        return $user->hasPermissionTo('export.delete');
    }

    public function restore(UserContract $user, Export $_export): bool
    {
        return $user->hasPermissionTo('export.restore');
    }

    public function forceDelete(UserContract $user, Export $_export): bool
    {
        return $user->hasPermissionTo('export.forceDelete');
    }
}
