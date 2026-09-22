# Graph Report - /var/www/_bases/<nome repository>/laravel/Modules/Job  (2026-08-04)

## Corpus Check
- cluster-only mode — file stats not available

## Summary
- 1186 nodes · 1611 edges · 251 communities (214 shown, 37 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 35 edges (avg confidence: 0.8)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `4f8454aa`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- Schedule
- Job
- Illuminate\Database\Seeder
- composer.json
- Illuminate\Database\Eloquent\Factories\Factory
- devDependencies
- Status
- Filament\Schemas\Components\Component
- BroadcastingEvent
- Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist
- Task
- Modules\User\Models\Team
- JobProvidersCoverageTest.php
- JobBasePolicy
- Spatie\QueueableAction\QueueableAction
- JobStatus
- Modules\Xot\Filament\Resources\Pages\XotBaseListRecords
- Modules\Xot\Contracts\UserContract
- ScheduleResource.php
- Illuminate\Console\Command
- TestCase.php
- ScheduleHistory
- TaskComment
- JobManagerResource.php
- TaskCompleted.php
- Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable
- ScheduleArguments
- .artisan
- Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord
- FailedJob.php
- JobModelsCoverageTest.php
- Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord
- ViewSchedule
- ListSchedules
- Modules\Xot\Filament\Resources\XotBaseResource
- ListImports
- Result
- TestCase
- Symfony\Component\Console\Command\Command
- ListJobBatches
- ActionGroup
- ScheduleRequest
- Illuminate\Database\Eloquent\Relations\BelongsTo
- ScheduleArguments
- Filament\Tables\Columns\TextColumn
- BaseModel
- Task.php
- ImportsTable
- JobsTable
- SchedulesTable
- BaseMorphPivot
- ExecuteTaskAction.php
- GetTaskCommandsAction.php
- Repeater
- Repeater
- JobManagersTable
- JobResource
- GetQueueSubcommandsAction
- Dashboard.php
- ImportInfolist.php
- webpack.mix.js
- modal/schedule/create.blade.php
- crud.blade.php
- home.blade.php
- job-status.blade.php
- dispatchFormEvent(
- vite.config.js
- admin/acts/schedule_manager.blade.php
- schedule_status.blade.php
- task.blade.php
- job-monitor.blade.php
- array.blade.php
- array/item.blade.php
- clock-widget.blade.php
- queue-listen.blade.php
- livewire/schedule/create.blade.php
- schedule/status.blade.php

## God Nodes (most connected - your core abstractions)
1. `Task` - 43 edges
2. `Schedule` - 30 edges
3. `Job` - 24 edges
4. `BaseModel` - 19 edges
5. `JobBatch` - 18 edges
6. `JobBasePolicy` - 15 edges
7. `Result` - 13 edges
8. `ScheduleHistory` - 13 edges
9. `JobManager` - 12 edges
10. `TaskComment` - 12 edges

## Surprising Connections (you probably didn't know these)
- `createJobBatch()` --calls--> `JobBatchFactory`  [INFERRED]
  tests/Pest.php → database/factories/JobBatchFactory.php
- `makeJobBatch()` --calls--> `JobBatchFactory`  [INFERRED]
  tests/Pest.php → database/factories/JobBatchFactory.php
- `createJob()` --calls--> `JobFactory`  [INFERRED]
  tests/Pest.php → database/factories/JobFactory.php
- `makeJob()` --calls--> `JobFactory`  [INFERRED]
  tests/Pest.php → database/factories/JobFactory.php
- `JobsWaiting` --inherits--> `Job`  [EXTRACTED]
  app/Models/JobsWaiting.php → app/Models/Job.php

## Import Cycles
- None detected.

## Communities (251 total, 37 thin omitted)

### Community 0 - "Schedule"
Cohesion: 0.05
Nodes (19): GetActiveSchedulesAction, Collection, GetActiveSchedulesAction, Collection, CreateSchedule, EditSchedule, SchedulePolicy, Schedule (+11 more)

### Community 1 - "Job"
Cohesion: 0.05
Nodes (20): JobStatsOverview, ListJobs, JobStatsOverview, JobsWaitingOverview, Job, Attribute, JobBatch, JobManager (+12 more)

### Community 2 - "Illuminate\Database\Seeder"
Cohesion: 0.05
Nodes (17): ExportSeeder, FailedImportRowSeeder, FailedJobSeeder, FrequencySeeder, ImportSeeder, JobBatchSeeder, JobDatabaseSeeder, JobManagerSeeder (+9 more)

### Community 3 - "composer.json"
Cohesion: 0.04
Nodes (47): dealerdirect/phpcodesniffer-composer-installer, pestphp/pest-plugin, phpstan/extension-installer, wikimedia/composer-merge-plugin, authors, autoload, autoload-dev, psr-4 (+39 more)

### Community 4 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.07
Nodes (13): FailedImportRow, Import, JobsWaiting, ExportFactory, FailedImportRowFactory, FailedJobFactory, ImportFactory, JobsWaitingFactory (+5 more)

### Community 5 - "devDependencies"
Cohesion: 0.05
Nodes (36): autoprefixer, axios, cross-env, laravel-mix, laravel-mix-merge-manifest, laravel-vite-plugin, lodash, devDependencies (+28 more)

### Community 6 - "Status"
Cohesion: 0.10
Nodes (8): Broad, Status, Crud, Status, dummyAction(), Illuminate\Contracts\Support\Renderable, Livewire\Component, artisan(

### Community 7 - "Filament\Schemas\Components\Component"
Cohesion: 0.11
Nodes (11): ExportForm, FailedImportRowForm, FailedJobForm, ImportForm, JobBatchForm, JobManagerForm, JobForm, JobForm (+3 more)

### Community 8 - "BroadcastingEvent"
Cohesion: 0.15
Nodes (12): BroadcastingEvent, Event, Executing, PrivateEvent, PublicEvent, TaskEvent, Illuminate\Broadcasting\Channel, Illuminate\Broadcasting\InteractsWithSockets (+4 more)

### Community 9 - "Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist"
Cohesion: 0.10
Nodes (10): ExportInfolist, FailedImportRowInfolist, FailedJobInfolist, JobBatchInfolist, JobManagerInfolist, JobInfolist, JobInfolist, JobsWaitingInfolist (+2 more)

### Community 10 - "Task"
Cohesion: 0.12
Nodes (16): destroy(), execute(), find(), findAll(), findAllActive(), store(), update(), destroy() (+8 more)

### Community 11 - "Modules\User\Models\Team"
Cohesion: 0.14
Nodes (4): FailedJobPolicy, JobPolicy, Modules\User\Models\Policies\UserBasePolicy, Modules\User\Models\Team

### Community 12 - "JobProvidersCoverageTest.php"
Cohesion: 0.12
Nodes (10): Export, EventServiceProvider, AdminPanelProvider, JobServiceProvider, RouteServiceProvider, Filament\Actions\Exports\Models\Export, Illuminate\Foundation\Support\Providers\EventServiceProvider, Modules\Xot\Providers\Filament\XotBasePanelProvider (+2 more)

### Community 13 - "JobBasePolicy"
Cohesion: 0.11
Nodes (10): ExportPolicy, FailedImportRowPolicy, FrequencyPolicy, ImportPolicy, JobBasePolicy, JobManagerPolicy, JobsWaitingPolicy, ParameterPolicy (+2 more)

### Community 14 - "Spatie\QueueableAction\QueueableAction"
Cohesion: 0.14
Nodes (7): ClearScheduleCacheAction, AssertAllowedArtisanCommandAction, GetJobStatusCommandsAction, GetScheduleStatusCommandsAction, DummyAction, ClearScheduleCacheAction, Spatie\QueueableAction\QueueableAction

### Community 15 - "JobStatus"
Cohesion: 0.15
Nodes (6): JobMonitor, JobStatus, ClockWidget, QueueListenWidget, Modules\Xot\Filament\Pages\XotBasePage, Modules\Xot\Filament\Widgets\XotBaseWidget

### Community 16 - "Modules\Xot\Filament\Resources\Pages\XotBaseListRecords"
Cohesion: 0.13
Nodes (6): ListExports, ListFailedImportRows, JobsWaitingResource, ListJobsWaiting, ListJobsWaitings, Modules\Xot\Filament\Resources\Pages\XotBaseListRecords

### Community 17 - "Modules\Xot\Contracts\UserContract"
Cohesion: 0.19
Nodes (3): JobBatchPolicy, TaskPolicy, Modules\Xot\Contracts\UserContract

### Community 18 - "ScheduleResource.php"
Cohesion: 0.18
Nodes (7): GetCommandsAction, CommandData, ScheduleResource, ScheduleForm, Illuminate\Console\Application, Spatie\LaravelData\Data, Spatie\LaravelData\DataCollection

### Community 19 - "Illuminate\Console\Command"
Cohesion: 0.18
Nodes (5): PhpUnitTestJobCommand, ScheduleClearCacheCommand, TestJobCommand, WorkerCheck, Illuminate\Console\Command

### Community 21 - "ScheduleHistory"
Cohesion: 0.17
Nodes (3): ScheduleHistoryPolicy, ScheduleHistory, ScheduleHistoryFactory

### Community 22 - "TaskComment"
Cohesion: 0.19
Nodes (3): TaskCommentPolicy, TaskComment, TaskCommentFactory

### Community 23 - "JobManagerResource.php"
Cohesion: 0.18
Nodes (4): JobManagerResource, CreateJobManager, EditJobManager, ListJobManagers

### Community 24 - "TaskCompleted.php"
Cohesion: 0.21
Nodes (6): Executed, TaskCompleted, Illuminate\Bus\Queueable, Illuminate\Contracts\Queue\ShouldQueue, Illuminate\Notifications\Messages\MailMessage, Illuminate\Notifications\Notification

### Community 25 - "Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable"
Cohesion: 0.21
Nodes (5): ExportsTable, FailedImportRowsTable, JobBatchsTable, JobsWaitingsTable, Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable

### Community 26 - "ScheduleArguments"
Cohesion: 0.21
Nodes (5): static, ScheduleArguments, static, ScheduleOptions, Modules\Xot\Filament\Tables\Columns\XotBaseTextColumn

### Community 27 - ".artisan"
Cohesion: 0.18
Nodes (3): FailedJobsTable, JobBatchesTable, Filament\Notifications\Notification

### Community 28 - "Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord"
Cohesion: 0.29
Nodes (5): CreateExport, CreateImport, CreateJob, CreateJobsWaiting, Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord

### Community 29 - "FailedJob.php"
Cohesion: 0.21
Nodes (3): FailedJobResource, ListFailedJobs, FailedJob

### Community 30 - "JobModelsCoverageTest.php"
Cohesion: 0.18
Nodes (3): Frequency, FrequencyFactory, Illuminate\Database\Eloquent\Relations\HasMany

### Community 31 - "Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord"
Cohesion: 0.22
Nodes (6): EditExport, EditFailedImportRow, EditImport, EditJob, EditJobsWaiting, Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord

### Community 32 - "ViewSchedule"
Cohesion: 0.27
Nodes (6): BoardJobs, ViewSchedule, Filament\Forms\Concerns\InteractsWithForms, Filament\Tables\Concerns\InteractsWithTable, Filament\Tables\Contracts\HasTable, Modules\Xot\Filament\Resources\Pages\XotBaseResourcePage

### Community 33 - "ListSchedules"
Cohesion: 0.24
Nodes (4): ListSchedules, Corn, Closure, Illuminate\Contracts\Validation\ValidationRule

### Community 34 - "Modules\Xot\Filament\Resources\XotBaseResource"
Cohesion: 0.24
Nodes (4): ExportResource, FailedImportRowResource, CreateFailedImportRow, Modules\Xot\Filament\Resources\XotBaseResource

### Community 37 - "TestCase"
Cohesion: 0.20
Nodes (4): Illuminate\Foundation\Application, Illuminate\Foundation\Testing\DatabaseTransactions, Modules\Xot\Tests\XotBaseTestCase, TestCase

### Community 38 - "Symfony\Component\Console\Command\Command"
Cohesion: 0.33
Nodes (3): GetCommandArgumentsActions, GetCommandOptionsActions, Symfony\Component\Console\Command\Command

### Community 40 - "ActionGroup"
Cohesion: 0.43
Nodes (4): ActionGroup, ActionGroup, Filament\Actions\Concerns\InteractsWithRecord, Modules\Xot\Filament\Actions\XotBaseActionGroup

### Community 44 - "Filament\Tables\Columns\TextColumn"
Cohesion: 0.40
Nodes (3): static, ScheduleOptions, Filament\Tables\Columns\TextColumn

### Community 46 - "Task.php"
Cohesion: 0.33
Nodes (3): Illuminate\Notifications\Notifiable, Modules\Job\Models\Traits\FrontendSortable, Modules\Xot\Models\Traits\HasXotFactory

### Community 50 - "BaseMorphPivot"
Cohesion: 0.60
Nodes (3): BaseMorphPivot, Illuminate\Database\Eloquent\Relations\MorphPivot, Modules\Xot\Traits\Updater

## Knowledge Gaps
- **77 isolated node(s):** `name`, `description`, `laraxot`, `laravel`, `filament` (+72 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **37 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `BaseModel` connect `BaseModel` to `Schedule`, `Job`, `Illuminate\Database\Eloquent\Factories\Factory`, `Result`, `Illuminate\Database\Eloquent\Relations\BelongsTo`, `Task`, `ScheduleHistory`, `TaskComment`, `FailedJob.php`, `JobModelsCoverageTest.php`?**
  _High betweenness centrality (0.105) - this node is a cross-community bridge._
- **Why does `ScheduleHistory` connect `ScheduleHistory` to `ViewSchedule`, `Illuminate\Database\Eloquent\Relations\BelongsTo`, `BaseModel`?**
  _High betweenness centrality (0.064) - this node is a cross-community bridge._
- **Why does `Job` connect `Job` to `Illuminate\Database\Eloquent\Factories\Factory`, `Status`, `BaseModel`, `JobsTable`, `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`?**
  _High betweenness centrality (0.061) - this node is a cross-community bridge._
- **What connects `name`, `description`, `laraxot` to the rest of the system?**
  _77 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Schedule` be split into smaller, more focused modules?**
  _Cohesion score 0.0506558118498417 - nodes in this community are weakly interconnected._
- **Should `Job` be split into smaller, more focused modules?**
  _Cohesion score 0.05009920634920635 - nodes in this community are weakly interconnected._
- **Should `Illuminate\Database\Seeder` be split into smaller, more focused modules?**
  _Cohesion score 0.05442176870748299 - nodes in this community are weakly interconnected._