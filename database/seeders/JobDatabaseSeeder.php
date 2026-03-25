<?php

declare(strict_types=1);

namespace Modules\Job\Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;

/**
 * Orchestratore Job — N modelli owner = N {Model}Seeder (regola Laraxot).
 */
class JobDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('JobDatabaseSeeder: entity seeders…');

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

        $this->command->info('JobDatabaseSeeder: completato.');
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class JobDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
>>>>>>> c88446c (.)
    }
}
