<<<<<<< .merge_file_eTOkBB
<<<<<<< .merge_file_JhYAhI
---
title: "Job — Architettura BMAD"
type: note
module: Job
tags:
  - bmad
  - job
  - architettura
created: 2026-09-28
updated: 2026-09-28
qmd: "job architettura queue schedule task model risorse filament"
related:
  - README.md
  - module-boundary.md
  - ../brainstorming.md
  - ../epics/job-queue-observability.md
---

# Job — Architettura

> **SUMMARY** — Mappa verificata del modulo `Job`: modelli, action, servizio cache,
> observer, eventi, risorse Filament e contratti. I dettagli di confine stanno in
> [architecture/module-boundary.md](architecture/module-boundary.md).

## Shard

| Shard | Path |
|-------|------|
| Confini di modulo | [architecture/module-boundary.md](architecture/module-boundary.md) |
| Puntatore SSoT (documento storico) | [architecture/job-module.md](architecture/job-module.md) |

## Modelli e responsabilita

| File | Responsabilita |
|------|----------------|
| `app/Models/Job.php` | job in coda |
| `app/Models/Task.php` | task pianificabile: `compileParameters()`, `frequencies()`, `results()`, `getLastResultAttribute()`, `getAverageRuntimeAttribute()`, `getActivatedAttribute()`, `getUpcomingAttribute()`, `autoCleanup()`, routing notifiche |
| `app/Models/Schedule.php` | schedulazione attiva, usata da `ScheduleService` e `ScheduleObserver` |
| `app/Models/Result.php` | esito di una task |
| `app/Models/Frequency.php` | frequenza di una task (figlia di `Task` via `frequencies()`) |
| `app/Models/Parameter.php` | parametri di frequenza |
| `app/Models/JobBatch.php` | batch di job |
| `app/Models/JobsWaiting.php` | job in attesa |
| `app/Models/FailedJob.php` | job falliti |
| `app/Models/Import.php`, `FailedImportRow.php` | importazione massiva e righe fallite |
| `app/Models/Export.php` | esportazione |
| `app/Models/TaskComment.php` | commenti alla task |
| `app/Models/ScheduleHistory.php` | storico schedulazioni |
| `app/Models/JobManager.php` | gestione aggregata |
| `app/Models/BaseModel.php`, `app/Models/BaseMorphPivot.php` | basi |
| `app/Models/Traits/FrontendSortable.php` | ordinamento lato frontend |

## Action

| File | Ruolo |
|------|-------|
| `app/Actions/ExecuteTaskAction.php` | esecuzione task; **oggi lancia `BadMethodCallException`** con rimando a `ROADMAP-2026.md` (file non presente nel modulo) |
| `app/Actions/GetActiveSchedulesAction.php` | schedulazioni attive con cache opzionale |
| `app/Actions/ClearScheduleCacheAction.php` | svuota la cache schedulazioni |
| `app/Actions/Schedule/GetActiveSchedulesAction.php` | secondo path per la stessa azione (namespace `Actions\Schedule`) |
| `app/Actions/Schedule/ClearScheduleCacheAction.php` | secondo path per la stessa azione |
| `app/Actions/Command/GetCommandsAction.php` | elenco comandi artisan |
| `app/Actions/Command/GetCommandArgumentsActions.php` / `GetCommandOptionsActions.php` | metadati comandi |
| `app/Actions/Console/AssertAllowedArtisanCommandAction.php` | whitelist comandi ammessi |
| `app/Actions/Console/GetJobStatusCommandsAction.php` | comandi di stato job |
| `app/Actions/Console/GetQueueSubcommandsAction.php` | sotto-comandi queue |
| `app/Actions/Console/GetScheduleStatusCommandsAction.php` | comandi di stato schedulazioni |
| `app/Actions/GetTaskCommandsAction.php`, `GetTaskFrequenciesAction.php` | comandi e frequenze delle task |
| `app/Actions/DummyAction.php` | azione di prova |

Le action usano il trait `QueueableAction` (Spatie): coerente con la regola del progetto
"logica di business in Spatie Queueable Action con `->execute()`".

## Servizio, observer, eventi

| File | Ruolo |
|------|-------|
| `app/Services/ScheduleService.php` | `getActives()`, `clearCache()` su store/chiave di `job::cache`; usa `config('job::model')` e valida che sia `Schedule` |
| `app/Observers/ScheduleObserver.php` | `created()`, `updated()`, `deleted()`, `restored()`, `saved()` → `clearCache()` via `ClearScheduleCacheAction` |
| `app/Events/Event.php`, `TaskEvent.php`, `Executing.php`, `Executed.php` | eventi del ciclo di esecuzione |
| `app/Events/BroadcastingEvent.php`, `PublicEvent.php`, `PrivateEvent.php` | eventi broadcast |
| `app/Notifications/TaskCompleted.php` | notifica di task completata |

## Contratti

- `app/Contracts/TaskContract.php` e `app/Contracts/TaskInterface.php` espongono la stessa
  API: `builder()`, `find()`, `findAll()`, `findAllActive()`, `store()`, `update()`,
  `destroy()`, `execute()`.

## Filament

| Risorsa | Path |
|---------|------|
| Job | `app/Filament/Resources/JobResource.php` (+ `Pages/BoardJobs.php`, `Schemas/`, `Tables/`, `Widgets/JobStatsOverview.php`) |
| Schedule | `app/Filament/Resources/ScheduleResource.php` (+ `Pages/ViewSchedule.php`) |
| Batch | `app/Filament/Resources/JobBatchResource.php` |
| In attesa | `app/Filament/Resources/JobsWaitingResource.php` |
| Falliti | `app/Filament/Resources/FailedJobResource.php` |
| Manager | `app/Filament/Resources/JobManagerResource.php` (+ `Widgets/JobStatsOverview.php`) |
| Import | `app/Filament/Resources/ImportResource.php`, `FailedImportRowResource.php` |
| Export | `app/Filament/Resources/ExportResource.php` |
| Pagine dedicate | `app/Filament/Pages/JobMonitor.php`, `JobStatus.php`, `Dashboard.php` |
| Widget | `app/Filament/Widgets/ClockWidget.php`, `QueueListenWidget.php` |
| Colonne riusabili | `app/Filament/Tables/Columns/ActionGroup.php`, `ScheduleArguments.php`, `ScheduleOptions.php` (e duplicati in `app/Filament/Columns/`) |

## Componenti Livewire

`app/Http/Livewire/Job/Status.php`, `app/Http/Livewire/Schedule/Crud.php`,
`app/Http/Livewire/Schedule/Status.php`, `app/Http/Livewire/Broad.php`.

## Config

`config/config.php` e `config/Config/config.php` restituiscono entrambi `[]`.
Il codice pero' legge `job::model`, `job::cache.enabled`, `job::cache.store`, `job::cache.key`
(`app/Services/ScheduleService.php`, `app/Actions/GetActiveSchedulesAction.php`):
le chiavi non sono dichiarate nel modulo. Punto aperto tracciato in
[epics/job-queue-observability.md](epics/job-queue-observability.md).

## Test

`tests/Unit/` e `tests/Feature/` coprono action, enum, eventi, policy, provider, risorse
Filament, `ScheduleService` e `FormatSeconds`. Esistono directory `tests/unit/` e
`tests/feature/` (minuscole) in aggiunta a `tests/Unit/` e `tests/Feature/`, con file
duplicati per differenza di casing.
=======
=======
>>>>>>> .merge_file_SXg8Bw
# Architettura del modulo Job

## Overview

[DA COMPLETARE]

## Componenti principali

### Actions
Azioni eseguibili (Queueable Actions) per la logica di business.

### Resources
Risorse Filament per il pannello di amministrazione.

### Widget
Widget Filament per dashboard e pannelli.

### Models
Modelli Eloquent per l'interazione con il database.

### Contracts
Interfacce per l'iniezione di dipendenze.

## Flussi di dati

[DA COMPLETARE]

## Pattern utilizzati

- Action invece di Service
- Filament Widget invece di Livewire
- Array una chiave per riga
- Schema-driven Forms (XotBaseSchemaWidget)
<<<<<<< .merge_file_eTOkBB
>>>>>>> .merge_file_Hhql2f
=======
>>>>>>> .merge_file_SXg8Bw
