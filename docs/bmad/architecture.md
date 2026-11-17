---
title: "Architettura — Job"
type: architecture
status: active
updated: 2026-11-16
module: Job
qmd: "architettura Job connessione job scheduler Task Schedule monitor code Filament widget Artisan allowlist stato reale"
related:
  - ./purpose.md
  - ./audits/job-audit.md
  - ./decision-log.md
  - ./architecture/job-module.md
  - ./livewire-widget-architecture.md
  - ../architecture.md
---

# Architettura — Job

SSoT modulo (chiude il circolo `docs/architecture.md` ↔ `bmad/architecture/job-module.md`).
Descrive **ciò che il codice fa oggi** (verificato 2026-11-16), non ciò che la roadmap promette.

## Identità

- `module.json`: alias `job`, priority/order 20, provider `JobServiceProvider` e `Filament\AdminPanelProvider`.
- Connessione DB dedicata `job` (`app/Models/BaseModel.php:34`); modello configurabile via `job::model`.
- Dipendenze: Xot (base class, `SuperAdminOnlyTrait`), User (policy), UI. Nessun altro modulo importa `Modules\Job` (`rg`).

## Tre sottosistemi

### 1. Monitor delle code (funziona)

`JobResource`, `JobsWaitingResource`, `JobBatchResource`, `FailedJobResource`, `JobManagerResource` leggono le tabelle di Laravel (`jobs`, `job_batches`, `failed_jobs`) più `job_managers`. Widget di conteggio (`JobStatsOverview`, `JobsWaitingOverview`) con aggregati costanti. Azioni: `queue:retry all`, `queue:prune-batches` (`FailedJobsTable.php`, `JobBatchesTable.php`).

### 2. Console operativa (funziona, solo super-admin)

`JobStatus` (pagina) e `JobStatusWidget`: `SuperAdminOnlyTrait`, autorizzazione ripetuta nel metodo Livewire, allowlist a match esatto (`Actions/Console/AssertAllowedArtisanCommandAction`, `GetJobStatusCommandsAction`, `GetQueueSubcommandsAction`), scrittura di `QUEUE_CONNECTION` validata contro `config('queue.connections')`. È il pattern di riferimento del modulo.

### 3. Scheduler su DB (NON eseguito)

Modelli: `Schedule`, `ScheduleHistory`, `Task`, `Frequency`, `Parameter`, `Result`, `TaskComment`; UI: `ScheduleResource` (nessuna `TaskResource`); regola `Rules/Corn`; observer `ScheduleObserver`; eventi `Executing`/`Executed`/`TaskEvent`.
Manca il collegamento: `JobServiceProvider::registerSchedule` e `registerQueue` sono commentati (`:38`, `:48-66`), `ExecuteTaskAction` lancia `BadMethodCallException` (`:18`), `GetActiveSchedulesAction` non ha caller. Vedi [audit P0-2](./audits/job-audit.md#p0-2--lo-scheduler-su-db-non-esegue-nulla) e [D-2](./decision-log.md).

## Import / Export

`ImportResource`, `ExportResource`, `FailedImportRowResource` su `imports`, `exports`, `failed_import_rows`; `Import::polymorphicUserRelationship()` e `Export::…` in `JobServiceProvider::boot`. `FailedImportRow` serve a mostrare **quale riga** è fallita ([purpose](./purpose.md)).

## Autorizzazione

| Policy | Base | Note |
|---|---|---|
| 13 (`Schedule`, `Task`, `Result`, `Import`, `Export`, …) | `JobBasePolicy` | `before()` → `true` per `super-admin` e `job::admin`; senza abilità proprie = deny-by-default |
| `Job`, `FailedJob`, `JobBatch` | `UserBasePolicy` | boilerplate Team, `create()` = true: **da correggere** ([P0-1](./audits/job-audit.md#p0-1--un-utente-qualsiasi-può-creare-righe-nella-tabella-jobs)) |

## Superficie legacy da ritirare

`app/Http/Livewire/{Broad,Job/Status,Schedule/Status,Schedule/Crud}.php` + `_components.json`: sostituiti dai widget Filament (vedi [livewire-widget-architecture](./livewire-widget-architecture.md)) ma ancora su disco e senza guard.

## Flussi

1. **Fallimento di un job:** worker → `failed_jobs` → `FailedJobResource` (retry singolo/`retry all`). Nessuna notifica al richiedente (idea in [purpose](./purpose.md) § 1, non implementata).
2. **Comando operativo:** pulsante → metodo Livewire → `canAccess()` → allowlist → `Artisan::call`.
3. **Pianificazione:** UI → riga `schedules` → *(interrotto)*.

## Pattern

Action Queueable (`execute()`), Resource con `Schemas/` e `Tables/`, base `XotBase*`, array una chiave per riga. 1 Service residuo (`ScheduleService`, morto).
