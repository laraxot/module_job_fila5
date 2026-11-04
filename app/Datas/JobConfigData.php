<?php

declare(strict_types=1);

namespace Modules\Job\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Config tenant per la SettingPage di Job, senza chiavi esposte al form. */
class JobConfigData extends Data
{
    use MakesFromTenantConfig;
}
