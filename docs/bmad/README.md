<<<<<<< .merge_file_Sk6Jll
---
title: "Job — indice BMAD"
type: note
module: Job
tags:
  - bmad
  - job
  - indice
created: 2026-09-28
updated: 2026-09-28
qmd: "job bmad indice documentazione queue schedule task"
related:
  - architecture.md
  - architecture/module-boundary.md
  - brainstorming.md
  - epics/job-queue-observability.md
  - quick-reference.md
  - setup-guide.md
---

# Job — indice BMAD

> **SUMMARY** — Indice dei documenti BMAD del modulo `Job` (`laravel/Modules/Job`).
> Il modulo gestisce code, task pianificati, batch, import/export e monitoraggio da pannello
> Filament, con cache delle schedulazioni e observer dedicato.
> I path sono relativi a `laravel/Modules/Job/docs/bmad/`.

## Documenti canonici

| Documento | Path |
|-----------|------|
| Architettura | [architecture.md](architecture.md) |
| Architettura — confini di modulo | [architecture/module-boundary.md](architecture/module-boundary.md) |
| Brainstorming (indice) | [brainstorming.md](brainstorming.md) |
| Epic — osservabilita' queue | [epics/job-queue-observability.md](epics/job-queue-observability.md) |
| Epic — Livewire | [epics/livewire.md](epics/livewire.md) |
| Epic — roadmap | [epics/module-roadmap.md](epics/module-roadmap.md) |
| Quick reference | [quick-reference.md](quick-reference.md) |
| Setup guide | [setup-guide.md](setup-guide.md) |

## Documenti storici sul widget Livewire (non canonici)

`livewire-inventory.md`, `livewire-widget-architecture.md`, `livewire-widget-brainstorming.md`,
`livewire-widget-conversion.md`, `livewire-widget-decision-log.md`, `livewire-widget-epics.md`,
`livewire-widget-prd.md`, `livewire-widget-product-brief.md`, `livewire-widget-project-context.md`,
`livewire-widget-tech-spec.md`, `livewire-widget-ux.md` — pack di lavoro sul passaggio da
widget Livewire a pagine Filament; lo stato corrente e' in [livewire-inventory.md](livewire-inventory.md).

## Codice del modulo in mappa rapida

| Area | Path |
|------|------|
| Modelli | `app/Models/` — `Job.php`, `Task.php`, `Schedule.php`, `Result.php`, `Frequency.php`, `Parameter.php`, `JobBatch.php`, `JobsWaiting.php`, `FailedJob.php`, `FailedImportRow.php`, `Import.php`, `Export.php`, `TaskComment.php`, `ScheduleHistory.php`, `JobManager.php`, `BaseModel.php`, `BaseMorphPivot.php` |
| Policies | `app/Models/Policies/` — 15 policy (una per modello piu `JobBasePolicy.php`) |
| Action | `app/Actions/ExecuteTaskAction.php`, `app/Actions/Command/` (3), `app/Actions/Console/` (4), `app/Actions/Schedule/` (2), `app/Actions/GetTaskCommandsAction.php`, `GetTaskFrequenciesAction.php`, `ClearScheduleCacheAction.php`, `DummyAction.php` |
| Services | `app/Services/ScheduleService.php` |
| Observer | `app/Observers/ScheduleObserver.php` |
| Events | `app/Events/` — `Event.php`, `Executed.php`, `Executing.php`, `TaskEvent.php`, `BroadcastingEvent.php`, `PublicEvent.php`, `PrivateEvent.php` |
| Contratti | `app/Contracts/TaskContract.php`, `app/Contracts/TaskInterface.php` |
| Console | `app/Console/Commands/` — `TestJobCommand.php`, `PhpUnitTestJobCommand.php`, `ScheduleClearCacheCommand.php`, `WorkerCheck.php` |
| Filament | `app/Filament/Resources/` — `JobResource`, `ScheduleResource`, `JobBatchResource`, `JobsWaitingResource`, `FailedJobResource`, `JobManagerResource`, `ImportResource`, `FailedImportRowResource`, `ExportResource`; pagine `JobMonitor.php`, `JobStatus.php`; widget `ClockWidget.php`, `QueueListenWidget.php` |
| Livewire | `app/Http/Livewire/Job/Status.php`, `app/Http/Livewire/Schedule/Crud.php`, `Schedule/Status.php`, `Broad.php` |
| Provider | `app/Providers/JobServiceProvider.php`, `Filament/AdminPanelProvider.php`, `RouteServiceProvider.php`, `EventServiceProvider.php` |
| Config | `config/config.php`, `config/Config/config.php` |
| Lang | `lang/it/` (chiave `job`, `schedule`, `task`, `job_status`, `job_monitor`, `job_batch`, `jobs_waiting`, `import`, `export`, `failed_job`, ...) |
| Test | `tests/Unit/` e `tests/Feature/` (presenti sia `Unit` che `unit`/`Feature` che `feature`) |

## Metodo di riferimento

- [../../../Xot/docs/bmad-method.md](../../../Xot/docs/bmad-method.md)
- [../../../Xot/docs/bmad/stories/5.249-bmad-docs-fleet-completion.story.md](../../../Xot/docs/bmad/stories/5.249-bmad-docs-fleet-completion.story.md)
=======
# Job Module

Modulo del sistema PTVX per la gestione delle risorse umane e valutazione delle performance nelle pubbliche amministrazioni.

## Descrizione

Il modulo Job si occupa di [DESCRIZIONE DA COMPLETARE].

## Dipendenze

- Xot (core)
- User (gestione utenti)
- Lang (internazionalizzazione)

## Come contribuire

1. Fork del repository
2. Creare un branch per la feature/fix
3. Seguire le convenzioni di codifica (PSR-12, array una chiave per riga)
4. Eseguire i test: 
5. Aprire una pull request

## Struttura

- `app/`: Codice sorgente (azioni, risorse, widget, ecc.)
- `database/`: Migrazioni e seeders
- `resources/`: Viste, lang, assets
- `docs/`: Documentazione (questo file)
- `tests/`: Test unitari e di integrazione

## Licenza

Proprietario - Laraxot
>>>>>>> .merge_file_W6NafN
