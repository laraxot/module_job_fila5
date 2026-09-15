<?php

declare(strict_types=1);

namespace Modules\Job\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Orchestratore Job — N modelli owner = N {Model}Seeder (regola Laraxot).
 */
class JobDatabaseSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        $this->command->info('JobDatabaseSeeder: entity seeders…');
=======
        $this->command?->info('JobDatabaseSeeder: entity seeders…');
>>>>>>> af4545e (.)

        $this->call([
            ExportSeeder::class,
            FailedImportRowSeeder::class,
            FailedJobSeeder::class,
            FrequencySeeder::class,
            ImportSeeder::class,
            JobSeeder::class,
            JobBatchSeeder::class,
            JobManagerSeeder::class,
            JobsWaitingSeeder::class,
            ParameterSeeder::class,
            ResultSeeder::class,
            ScheduleSeeder::class,
            ScheduleHistorySeeder::class,
            TaskSeeder::class,
            TaskCommentSeeder::class,
        ]);

<<<<<<< HEAD
        $this->command->info('JobDatabaseSeeder: completato.');
=======
        $this->command?->info('JobDatabaseSeeder: completato.');
>>>>>>> af4545e (.)
    }
}
