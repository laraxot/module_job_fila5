---
<<<<<<< .merge_file_kXvr3N
title: "Job — Quick Reference"
type: note
module: Job
tags:
  - bmad
  - job
  - quick-reference
created: 2026-09-28
updated: 2026-09-28
qmd: "job quick reference action risorse filament test queue"
related:
  - README.md
  - architecture.md
  - setup-guide.md
---

# Job — Quick Reference

> **SUMMARY** — Riferimento rapido del modulo `Job`: dove sta cosa, quali simboli usare,
> quali test leggere prima di toccare il codice. Paths relativi a `laravel/Modules/Job`.

## Action (punto di ingresso della logica)

| Action | Path |
|--------|------|
| Esecuzione task (non implementata) | `app/Actions/ExecuteTaskAction.php` |
| Schedulazioni attive | `app/Actions/GetActiveSchedulesAction.php` e `app/Actions/Schedule/GetActiveSchedulesAction.php` |
| Svuoto cache schedulazioni | `app/Actions/ClearScheduleCacheAction.php` e `app/Actions/Schedule/ClearScheduleCacheAction.php` |
| Whitelist comandi artisan | `app/Actions/Console/AssertAllowedArtisanCommandAction.php` |
| Comandi stato job | `app/Actions/Console/GetJobStatusCommandsAction.php` |
| Sotto-comandi queue | `app/Actions/Console/GetQueueSubcommandsAction.php` |
| Comandi stato schedulazioni | `app/Actions/Console/GetScheduleStatusCommandsAction.php` |
| Elenco comandi | `app/Actions/Command/GetCommandsAction.php` |
| Argomenti comando | `app/Actions/Command/GetCommandArgumentsActions.php` |
| Opzioni comando | `app/Actions/Command/GetCommandOptionsActions.php` |
| Comandi di una task | `app/Actions/GetTaskCommandsAction.php` |
| Frequenze di una task | `app/Actions/GetTaskFrequenciesAction.php` |

## Servizio e observer

| File | Metodi |
|------|--------|
| `app/Services/ScheduleService.php` | `getActives()`, `clearCache()` |
| `app/Observers/ScheduleObserver.php` | `created()`, `updated()`, `deleted()`, `restored()`, `saved()` |

## Modelli

| Modello | Path |
|---------|------|
| Job | `app/Models/Job.php` |
| Task | `app/Models/Task.php` |
| Schedule | `app/Models/Schedule.php` |
| Result | `app/Models/Result.php` |
| Frequency | `app/Models/Frequency.php` |
| Parameter | `app/Models/Parameter.php` |
| Batch / waiting / failed | `app/Models/JobBatch.php`, `JobsWaiting.php`, `FailedJob.php` |
| Import / export | `app/Models/Import.php`, `FailedImportRow.php`, `Export.php` |
| Storico e commenti | `app/Models/ScheduleHistory.php`, `TaskComment.php` |

## Contratti, eventi, notifiche

- `app/Contracts/TaskContract.php`, `app/Contracts/TaskInterface.php`
- `app/Events/`: `Event.php`, `TaskEvent.php`, `Executing.php`, `Executed.php`,
  `BroadcastingEvent.php`, `PublicEvent.php`, `PrivateEvent.php`
- `app/Notifications/TaskCompleted.php`

## Filament

| Area | Path |
|------|------|
| Risorse | `app/Filament/Resources/` (`JobResource`, `ScheduleResource`, `JobBatchResource`, `JobsWaitingResource`, `FailedJobResource`, `JobManagerResource`, `ImportResource`, `FailedImportRowResource`, `ExportResource`) |
| Pagine | `app/Filament/Pages/JobMonitor.php`, `JobStatus.php`, `Dashboard.php` |
| Widget | `app/Filament/Widgets/ClockWidget.php`, `QueueListenWidget.php` |
| Colonne riusabili | `app/Filament/Tables/Columns/ActionGroup.php`, `ScheduleArguments.php`, `ScheduleOptions.php` |
| Campi riusabili | `app/Filament/Fields/Repeater.php`, `app/Filament/Forms/Components/Repeater.php` |

## Console

`app/Console/Commands/TestJobCommand.php`, `PhpUnitTestJobCommand.php`,
`ScheduleClearCacheCommand.php`, `WorkerCheck.php`.

## Config

`config/config.php` e `config/Config/config.php` sono entrambi `[]`; le chiavi lette a runtime
sono `job::model`, `job::cache.enabled`, `job::cache.store`, `job::cache.key`.

## Test da leggere prima di toccare il codice

| Test | Path |
|------|------|
| Schedulazioni | `tests/Unit/Actions/GetActiveSchedulesActionTest.php` |
| Cache schedulazioni | `tests/Unit/Actions/ClearScheduleCacheActionTest.php` |
| Action schedulazione | `tests/Unit/Actions/Schedule/ScheduleActionsTest.php` |
| Servizio | `tests/Unit/Services/ScheduleServiceTest.php` |
| Esecuzione task | `tests/Unit/Actions/ExecuteTaskActionTest.php` |
| Enum stato | `tests/Unit/Enums/StatusTest.php` |
| Eventi | `tests/Unit/Events/` |
| Policy | `tests/Unit/JobPolicyTest.php`, `JobPolicyBehaviorTest.php` |
| Risorse Filament | `tests/Unit/JobFilamentSchemaCoverageTest.php`, `JobScheduleFormCoverageTest.php`, `ScheduleFormCoverage100Test.php` |
| Provider | `tests/Unit/Providers/JobProvidersCoverageTest.php` |
| Modelli | `tests/unit/models/BaseModelTest.php` |
| Integrazione frequenze | `tests/feature/GetTaskFrequenciesActionIntegrationTest.php` |
=======
title: "Job — BMAD Quick Reference"
description: "Comandi rapidi BMAD per il modulo Job"
module: "Job"
alias: "job"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Job — BMAD Quick Reference

## Comandi Rapidi

### Help

```bash
bmad-help
```

### Workflow Job

```bash
# Phase 1
bmad-domain-research      # Studio dominio: code, code di stato, code pianificate
bmad-technical-research   # Fattibilità monitoraggio queue e scheduler

# Phase 2
bmad-create-prd           # PRD: gestione job, batch, import/export, pianificazioni
bmad-create-architecture  # Architettura code, task, frequenze, risultati

# Phase 3
bmad-create-epics-and-stories            # Epic: job, batch, schedule, import/export
bmad-check-implementation-readiness      # Quality gate

# Phase 4
bmad-sprint-planning      # Sprint iniziale
bmad-create-story         # Story: modello Task, migrazione
bmad-dev-story            # Implementazione
bmad-code-review          # Review con focus code, retry, pianificazioni
```

### Agenti per Job

| Agente | Skill | Scopo |
|--------|-------|-------|
| Mary (analyst) | `skill: "bmad-agent-analyst"` | ricerca code e pianificazioni |
| John (pm) | `skill: "bmad-agent-pm"` | PRD gestione job |
| Winston (architect) | `skill: "bmad-agent-architect"` | architettura code e scheduler |
| Amelia (dev) | `skill: "bmad-agent-dev"` | implementazione Actions/widgets |
| Quinn (qa) | `skill: "bmad-agent-qa"` | test code, worker, retry |

## Comandi Artisan del Modulo

```bash
php artisan schedule:clear-cache   # Svuota la cache delle pianificazioni
php artisan schedule:test-job      # Esegue un job pianificato di prova
php artisan worker:check           # Verifica lo stato del worker
php artisan phpunit:test {arg} {argWithDefault=Default value} {optional?}
```

## Classi Chiave

### Contracts (`app/Contracts/`)

| Contract | Ruolo |
|---|---|
| `TaskInterface` | Interfaccia minima di un task pianificato |
| `TaskContract` | Contratto pubblico esposto agli host |

### Enums (`app/Enums/`)

`Status` → `active`, `inactive`, `trashed`.

### Actions (`app/Actions/`)

- **Root**: `ExecuteTaskAction`, `GetActiveSchedulesAction`, `GetTaskCommandsAction`,
  `GetTaskFrequenciesAction`, `ClearScheduleCacheAction`, `DummyAction`
- **`Actions/Command/`**: `GetCommandsAction`, `GetCommandArgumentsActions`, `GetCommandOptionsActions`
- **`Actions/Console/`**: `AssertAllowedArtisanCommandAction`, `GetJobStatusCommandsAction`,
  `GetQueueSubcommandsAction`, `GetScheduleStatusCommandsAction`
- **`Actions/Schedule/`**: `ClearScheduleCacheAction`, `GetActiveSchedulesAction`

### Models (`app/Models/`)

`Job`, `JobBatch`, `JobsWaiting`, `FailedJob`, `JobManager`, `Task`, `TaskComment`,
`Schedule`, `ScheduleHistory`, `Frequency`, `Parameter`, `Result`, `Import`,
`FailedImportRow`, `Export` — tutti da `BaseModel`; pivot da `BaseMorphPivot`.

### Filament 5

- **Resources**: `JobManagerResource`, `JobResource`, `JobBatchResource`, `JobsWaitingResource`,
  `FailedJobResource`, `ImportResource`, `FailedImportRowResource`, `ExportResource`, `ScheduleResource`
- **Widgets**: `JobStatusWidget`, `QueueListenWidget`, `ScheduleCrudWidget`,
  `ScheduleStatusWidget`, `ClockWidget`

## Pattern del Modulo

- `app/Actions/Console/` è l'unica fonte dei comandi ammessi: mai eseguire comandi arbitrari
- `AssertAllowedArtisanCommandAction` è il gate di sicurezza: ogni comando passa da lì
- Un `Task` è una pianificazione: frequenza + comando + parametri, esiti in `Result`
- Import/export hanno tabelle dedicate con righe di errore (`FailedImportRow`)

## Verifica

```bash
cd laravel

php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Job
./vendor/bin/pest Modules/Job
./vendor/bin/pint
```

## Quick Flow

```bash
bmad-quick-dev "Aggiungi filtro per stato job nella tabella"
bmad-quick-spec "Specifica retry automatico dei job falliti"
```

---

*Job · BMAD Quick Reference · data 2026-09-29*
>>>>>>> .merge_file_oyQc9G
