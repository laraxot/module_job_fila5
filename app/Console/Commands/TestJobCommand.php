<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Console/Commands/TestJobCommand.php
 */

<<<<<<< HEAD
namespace Modules\Job\Console\Commands;

use Illuminate\Console\Command;
=======
declare(strict_types=1);

namespace Modules\Job\Console\Commands;

use Illuminate\Console\Command;
use Log;
>>>>>>> laraxot/dev

class TestJobCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'schedule:test-job';

    /**
     * The console command description.
     */
    protected $description = 'Command that display a friendly message that is intented to test a job.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Hello the test worked.');
<<<<<<< HEAD
=======
        Log::debug('Hello the test worked.');
>>>>>>> laraxot/dev

        return 0;
    }
}
