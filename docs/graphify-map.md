# Job Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Job | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Job

Il modulo **Job** gestisce l'esecuzione asincrona e la pianificazione di task lunghe:

- **Queue Management** — Job e batch processing con Redis/Database
- **Task Scheduling** — Cron-like scheduling con espressioni cron, frequencies, parametri
- **Import/Export** — Importazione bulk dati da file e export CSV/PDF con monitoraggio
- **Job Monitoring** — Dashboard Filament per monitoraggio job, failed jobs, retry
- **Async Task Execution** — Queueable actions, event-driven execution, result tracking
- **Failure Handling** — Failed jobs, error recovery, webhook/email notifications

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `Job` | `app/Models/Job.php` |
| **Model** | `Schedule` | `app/Models/Schedule.php` |
| **Model** | `Task` | `app/Models/Task.php` |
| **Model** | `JobBatch` | `app/Models/JobBatch.php` |
| **Model** | `Import` | `app/Models/Import.php` |
| **Model** | `Export` | `app/Models/Export.php` |
| **Model** | `FailedJob` | `app/Models/FailedJob.php` |
| **Model** | `Result` | `app/Models/Result.php` |
| **Model** | `ScheduleHistory` | `app/Models/ScheduleHistory.php` |
| **Model** | `TaskComment` | `app/Models/TaskComment.php` |
| **Action** | `ExecuteTaskAction` | `app/Actions/ExecuteTaskAction.php` |
| **Action** | `GetActiveSchedulesAction` | `app/Actions/Schedule/GetActiveSchedulesAction.php` |
| **Action** | `ClearScheduleCacheAction` | `app/Actions/Schedule/ClearScheduleCacheAction.php` |
| **Event** | `Executing` | `app/Events/Executing.php` |
| **Event** | `Executed` | `app/Events/Executed.php` |
| **Event** | `TaskEvent` | `app/Events/TaskEvent.php` |
| **Service** | `ScheduleService` | `app/Services/ScheduleService.php` |
| **Filament** | `JobManagerResource` | `app/Filament/Resources/JobManagerResource.php` |
| **Filament** | `ScheduleResource` | `app/Filament/Resources/ScheduleResource.php` |
| **Filament** | `ImportResource` | `app/Filament/Resources/ImportResource.php` |
| **Filament** | `ExportResource` | `app/Filament/Resources/ExportResource.php` |
| **Filament** | `FailedJobResource` | `app/Filament/Resources/FailedJobResource.php` |
| **Command** | `WorkerCheck` | `app/Console/Commands/WorkerCheck.php` |
| **Command** | `TestJobCommand` | `app/Console/Commands/TestJobCommand.php` |
| **Listener** | `EventServiceProvider` | `app/Providers/EventServiceProvider.php` |

### Dependencies (Incoming)

```
Media → Job (Media conversione job dispatch)
Notify → Job (Notification queue dispatch)
Xot → Job (Base framework, lifecycle hooks)
```

### Dependencies (Outgoing)

```
Job → User (Polymorphic user_id, creator/updater relationships)
Job → Xot (XotBaseServiceProvider, ProfileContract, XotBaseMigration)
Job → Laravel\Framework (Queue infrastructure, Illuminate\Queue)
Job → Filament (Admin panel, resources, widgets)
Job → Spatie (QueueableAction, Laravel-Actions)
```

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Job module models and actions"
# Risposta attesa: Job, Schedule, Task, Import, Export, FailedJob, Result, 
# ExecuteTaskAction, GetActiveSchedulesAction, ClearScheduleCacheAction
```

### Tracciare Flusso Principale (Job Dispatch)

```bash
graphify path --from "Dispatching Application Code" --to "Job::handle()"
# Workflow: App → Queue::dispatch($job) → Job Model → Queue Table → Worker → handle()
```

### Tracciare Flusso Task/Schedule

```bash
graphify path --from "Schedule::execute()" --to "Task Result Stored"
# Workflow: Schedule → GetActiveSchedulesAction → ExecuteTaskAction → TaskEvent 
#           → Executed event → Result model created
```

### Trovare Job Retries

```bash
graphify query "Job retry mechanism and failed jobs handling"
# Risposta attesa: Failed jobs table, retry logic, FailedJob model
```

### Trovare Dipendenze

```bash
graphify query "Job module dependencies and relationships"
# Risposta attesa: User (polymorphic), Xot (base), Media (conversione)
```

---

## 🔗 Relazioni Dati (Schema Logico)

### Tabelle Principali

```
jobs (Laravel queue table)
  ├── id (PK)
  ├── queue (index)
  ├── payload (JSON serialized job data)
  ├── attempts
  ├── reserved_at
  ├── available_at
  ├── created_at, updated_at, created_by, updated_by
  └── timestamps

schedules
  ├── id (PK)
  ├── command
  ├── expression (cron)
  ├── parameters (JSON)
  ├── options (JSON)
  ├── is_active (bool)
  ├── timezone
  └── timestamps (soft deletes)

tasks
  ├── id (PK)
  ├── description
  ├── command
  ├── parameters
  ├── expression (cron)
  ├── is_active (bool)
  ├── run_in_background (bool)
  ├── auto_cleanup_num, auto_cleanup_type
  └── timestamps (soft deletes)

imports
  ├── id (PK)
  ├── file_path
  ├── total_rows
  ├── processed_rows
  ├── failed_rows
  ├── status (completed, processing, failed)
  ├── user_id (FK → users)
  └── timestamps

exports
  ├── id (PK)
  ├── status (processing, completed, failed)
  ├── file_path
  ├── user_id (FK → users)
  └── timestamps

job_batches (batch processing)
  ├── id (PK)
  ├── name
  ├── total_jobs
  ├── pending_jobs
  ├── failed_jobs
  ├── failed_job_ids
  ├── options
  └── timestamps

failed_jobs
  ├── id (PK)
  ├── uuid (unique)
  ├── connection
  ├── queue
  ├── payload (JSON)
  ├── exception (error message)
  ├── failed_at
  └── timestamps

results
  ├── id (PK)
  ├── task_id (FK → tasks)
  ├── duration (milliseconds)
  ├── result (output, JSON)
  └── timestamps

schedule_histories
  ├── id (PK)
  ├── schedule_id (FK → schedules)
  ├── executed_at
  ├── duration
  ├── output (JSON)
  └── timestamps

task_comments
  ├── id (PK)
  ├── task_id (FK → tasks)
  ├── user_id (FK → users)
  ├── content (text)
  └── timestamps
```

### Relazioni Modello

```
Schedule ──1:N──> ScheduleHistory
          ──1:N──> Result

Task ──1:N──> Result
     ──1:N──> TaskComment
     ──*:1──> User (creator via creator relationship)

Job ──*:1──> User (creator via polymorphic creator)
    ──*:1──> User (updater via polymorphic updater)

JobBatch ──1:N──> Job

Import ──*:1──> User
       ──1:N──> FailedImportRow

Export ──*:1──> User

FailedJob (no relations, audit table)
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Creating and Dispatching a Job

**Domanda Graphify:**
```bash
graphify query "How to create and dispatch a queueable job in Job module"
```

**Workflow:**
1. Extend `QueueableAction` or implement `ShouldQueue`
2. Implement `handle()` method with business logic
3. Call `dispatch()` or queue via `Queue::dispatch()`
4. Worker processes job from queue table
5. On success: Job removed, Result stored via event
6. On failure: Moved to failed_jobs, exception logged

**Entry Points:**
- `Modules\Job\Actions\ExecuteTaskAction` (template for queueable actions)
- `Modules\Job\Models\Job` (queue table model)
- `app/Jobs/*` (application job classes using QueueableAction)

---

### Task 2: Scheduling Tasks with Cron Expressions

**Domanda Graphify:**
```bash
graphify query "Schedule model and cron task execution pipeline"
```

**Workflow:**
1. Create `Schedule` record with cron expression + command
2. `GetActiveSchedulesAction` reads schedules from DB
3. Register with Laravel `Schedule` via `registerSchedule()` in ServiceProvider
4. On schedule time: Laravel Scheduler triggers → `ExecuteTaskAction`
5. `Executed` event fired → `ScheduleHistory` + `Result` created
6. Notifications sent via webhook/email if configured

**Entry Points:**
- `Modules\Job\Models\Schedule` (cron definition)
- `Modules\Job\Actions\Schedule\GetActiveSchedulesAction` (discovery)
- `Modules\Job\Actions\ExecuteTaskAction` (execution)
- `Modules\Job\Events\Executed` (result capture)
- `Modules\Job\Services\ScheduleService` (service layer)

---

### Task 3: Importing Bulk Data

**Domanda Graphify:**
```bash
graphify query "Import workflow, job dispatch, and failed row tracking"
```

**Workflow:**
1. User uploads file → `Import` model created
2. Dispatch `ImportJob` to queue
3. Worker processes rows, marks as processed
4. On row failure: `FailedImportRow` created with error details
5. User can retry failed rows
6. On completion: Import marked complete, notification sent

**Entry Points:**
- `Modules\Job\Models\Import` (import record)
- `Modules\Job\Models\FailedImportRow` (failed row audit)
- `Modules\Job\Filament\Resources\ImportResource` (UI for imports)
- Laravel's `Maatwebsite\Excel` integration (file parsing)

---

### Task 4: Monitoring Failed Jobs and Retries

**Domanda Graphify:**
```bash
graphify query "Failed job handling, FailedJob model, retry mechanisms"
```

**Workflow:**
1. Job fails after max attempts → `FailedJob` record created
2. Exception + payload logged
3. Dashboard shows failed job details
4. Admin can retry from Filament UI
5. Retry re-queues job with same/modified payload
6. On success: `FailedJob` marked as retried or deleted

**Entry Points:**
- `Modules\Job\Models\FailedJob` (failed job audit)
- `Modules\Job\Filament\Resources\FailedJobResource` (UI)
- Laravel's `Queue::failing()` hook (event listener)
- Retry commands via Artisan

---

### Task 5: Batch Processing with Progress Tracking

**Domanda Graphify:**
```bash
graphify query "JobBatch model, batch processing, progress tracking"
```

**Workflow:**
1. Create batch via `Bus::batch()` with multiple jobs
2. Track `pending_jobs`, `failed_jobs`, `failed_job_ids`
3. Dispatch jobs to queue
4. Workers process, update progress
5. On batch completion: Execute `finally()` callback
6. Webhook/notification sent

**Entry Points:**
- `Modules\Job\Models\JobBatch` (batch aggregation)
- Laravel's `Illuminate\Bus\Batch` (batch API)
- `Bus::batch()` helper

---

## 📋 Test Coverage Map

### Queries per Coverage

```bash
graphify query "Job module test coverage and test files"
```

### Checklist Copertura

- [ ] `app/Models/Job.php` → `tests/Feature/Models/JobTest.php`
- [ ] `app/Models/Schedule.php` → `tests/Feature/Models/ScheduleTest.php`
- [ ] `app/Models/Task.php` → `tests/Feature/Models/TaskTest.php`
- [ ] `app/Models/Import.php` → `tests/Feature/Models/ImportTest.php`
- [ ] `app/Models/Export.php` → `tests/Feature/Models/ExportTest.php`
- [ ] `app/Models/FailedJob.php` → `tests/Feature/Models/FailedJobTest.php`
- [ ] `app/Actions/ExecuteTaskAction.php` → `tests/Feature/Actions/ExecuteTaskActionTest.php`
- [ ] `app/Actions/Schedule/GetActiveSchedulesAction.php` → `tests/Feature/Actions/GetActiveSchedulesActionTest.php`
- [ ] `app/Events/Executed.php` → `tests/Feature/Events/ExecutedTest.php`
- [ ] `app/Services/ScheduleService.php` → `tests/Feature/Services/ScheduleServiceTest.php`
- [ ] `app/Filament/Resources/JobManagerResource.php` → `tests/Feature/Filament/JobManagerResourceTest.php`
- [ ] `app/Filament/Resources/ScheduleResource.php` → `tests/Feature/Filament/ScheduleResourceTest.php`

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura del modulo
graphify query "Job module architecture and entry points"

# Trova job creation e dispatching patterns
graphify query "Job dispatch patterns and queueable actions"

# Test coverage analysis
graphify query "Job module test coverage"

# Complexity analysis
graphify query "Job module high complexity areas"

# Schedule + Task relationship
graphify query "Schedule and Task execution pipeline"

# Import/Export workflows
graphify query "Import export batch processing"

# Failure handling
graphify query "Job failure handling and recovery"

# Monitoring e dashboard
graphify query "Job monitoring filament resources"
```

---

## 📚 Riferimenti

- **Job Module Docs:** `docs/` directory (INDEX.md, ARCHITECTURE.md, PATTERNS.md)
- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`
- **Laravel Queue:** [Laravel Queues Documentation](https://laravel.com/docs/11/queues)
- **Filament Admin:** [Filament Documentation](https://filamentphp.com/)
- **Spatie QueueableAction:** [Spatie Laravel-Actions](https://spatie.be/docs/laravel-actions)

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02 | **Status:** Ready for Graphify Integration
