<<<<<<< .merge_file_KR59wk
<<<<<<< .merge_file_CtBtJa
---
title: "Job — Brainstorming BMAD (indice e decisioni)"
type: note
module: Job
tags:
  - bmad
  - job
  - brainstorming
  - decisioni
created: 2026-09-28
updated: 2026-09-28
qmd: "job brainstorming decisioni aperte scartate livewire queue"
related:
  - architecture.md
  - brainstorming/livewire-to-page.md
  - epics/job-queue-observability.md
---

# Job — Brainstorming

> **SUMMARY** — Decisioni prese, questioni aperte e opzioni scartate del modulo `Job`,
> ancorate a file e simboli reali. Il brainstorming di area (Livewire) e' negli shard.

## Shard

| Shard | Path |
|-------|------|
| Da widget Livewire a pagina Filament | [brainstorming/livewire-to-page.md](brainstorming/livewire-to-page.md) |
| Opportunita di modulo | [brainstorming/module-opportunities.md](brainstorming/module-opportunities.md) |

Pack di prodotto collegati: `livewire-widget-product-brief.md`, `livewire-widget-prd.md`,
`livewire-widget-ux.md`, `livewire-widget-tech-spec.md`, `livewire-widget-decision-log.md`,
`livewire-widget-epics.md` (stessa directory).

## Decisioni prese (verificate nel codice)

| Decisione | Dove e verificata |
|----------|-------------------|
| La logica di business sta in Spatie Queueable Action con `->execute()` | `QueueableAction` in `app/Actions/GetActiveSchedulesAction.php`, `Schedule/ClearScheduleCacheAction.php` |
| I comandi artisan eseguibili sono in whitelist | `app/Actions/Console/AssertAllowedArtisanCommandAction.php` (`final class`, `execute(string $command, array $allowed)`) |
| La cache delle schedulazioni e' opt-in e silenziosamente disattivabile | `GetActiveSchedulesAction::execute()` legge `config('job::cache.enabled')` |
| Store e chiave di cache vengono validati, non assunti | `app/Services/ScheduleService.php`: `Assert::string(config('job::cache.store'))`, `Assert::string(config('job::cache.key'))` |
| Il modello schedulazione e' risolto da config e verificato per tipo | `ScheduleService::__construct()` con `Assert::isInstanceOf($model, Schedule::class)` |
| La cache si invalida dagli eventi del modello, non a mano | `app/Observers/ScheduleObserver.php` su created/updated/deleted/restored/saved |
| Il ciclo di esecuzione e' osservabile tramite eventi | `app/Events/Executing.php`, `Executed.php`, `TaskEvent.php` |
| L'interfaccia di gestione task e' dichiarata da contratto | `app/Contracts/TaskContract.php` / `TaskInterface.php` |

## Questioni aperte

| Questione | Evidenza |
|-----------|----------|
| `ExecuteTaskAction::execute()` non e' implementato | `app/Actions/ExecuteTaskAction.php`: `throw new BadMethodCallException(...)` con rimando a `ROADMAP-2026.md` (file non presente nel modulo) |
| Le chiavi config usate dal codice non esistono | `config/config.php` e `config/Config/config.php` sono `[]`, ma il codice legge `job::model`, `job::cache.*` |
| Esistono due copie di `ClearScheduleCacheAction` e `GetActiveSchedulesAction` | `app/Actions/ClearScheduleCacheAction.php` vs `app/Actions/Schedule/ClearScheduleCacheAction.php` (identiche salvo namespace) |
| Esistono due copie delle colonne Filament riusabili | `app/Filament/Columns/ActionGroup.php` vs `app/Filament/Tables/Columns/ActionGroup.php` (contenuti diversi) |
| `TaskContract` e `TaskInterface` dichiarano la stessa API | `app/Contracts/TaskContract.php`, `app/Contracts/TaskInterface.php` |
| Directory dei test con casing duplicato | `tests/Unit/` e `tests/unit/`, `tests/Feature/` e `tests/feature/` con file omonimi |
| Coesistono `app/entities/` e `app/Entities/` | due directory con nomi diversi solo per casing |
| `WorkerCheck.php` e `app/Phpstan/FormatSecondsPhpstanProbe.php` hanno ruolo non documentato | `app/Console/Commands/WorkerCheck.php`, `app/Phpstan/FormatSecondsPhpstanProbe.php` |

## Opzioni scartate

| Opzione | Motivo dello scarto (dal codice/pack) |
|---------|----------------------------------------|
| Comandi artisan invocabili liberamente dal pannello | esiste `AssertAllowedArtisanCommandAction` con whitelist esplicita |
| Cache sempre attiva delle schedulazioni | il percorso e' condizionato a `config('job::cache.enabled')` per non mascherare i test |
| Un'unica Action per schedulazioni, in un solo namespace | la duplicazione esiste ma non e' ancora stata ricondotta: scelta pendente |
| Widget Livewire per monitor e stato | pack `livewire-widget-*.md` e [brainstorming/livewire-to-page.md](brainstorming/livewire-to-page.md) sul passaggio a pagine Filament |
=======
=======
>>>>>>> .merge_file_tzokqW
# Brainstorming - Modulo Job

## Idee iniziali

- [IDEA 1]
- [IDEA 2]
- [IDEA 3]

## Problemi da risolvere

- [PROBLEMA 1]
- [PROBLEMA 2]

## Soluzioni proposte

- [SOLUZIONE 1]
- [SOLUZIONE 2]

## Domande aperte

- [DOMANDA 1]
- [DOMANDA 2]
<<<<<<< .merge_file_KR59wk
>>>>>>> .merge_file_x9KSvW
=======
>>>>>>> .merge_file_tzokqW
