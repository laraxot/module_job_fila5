<?php

/**
 * @see https://github.com/mooxphp/jobs/tree/main
 */

declare(strict_types=1);

namespace Modules\Job\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Modules\Job\Database\Factories\JobsWaitingFactory;
use Modules\Xot\Contracts\ProfileContract;

/**
 * Modules\Job\Models\JobsWaiting.
 *
 * @property-read \Modules\WorkOrder\Models\Profile|null $creator
 * @property-read \Modules\WorkOrder\Models\Profile|null $deleter
 * @property-read string|null $display_name
 * @property-read string $status
 * @property-read \Modules\WorkOrder\Models\Profile|null $updater
 * @method static \Modules\Job\Database\Factories\JobsWaitingFactory factory($count = null, $state = [])
 * @method static Builder<static>|JobsWaiting newModelQuery()
 * @method static Builder<static>|JobsWaiting newQuery()
 * @method static Builder<static>|JobsWaiting query()
 * @mixin \Eloquent
 */
class JobsWaiting extends Job {}
