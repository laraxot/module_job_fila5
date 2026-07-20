---
title: "Job — ScheduleService → Actions"
type: concept
tags: [job, actions, queueable-action, schedule, migration]
created: 2026-07-13
updated: 2026-07-13
qmd: "Job module ScheduleService to QueueableAction schedule cache active schedules"
related:
  - ../../../Xot/docs/wiki/concepts/queueable-action-trait-mandatory.md
  - ../../../User/docs/wiki/concepts/no-app-support-queueable-actions.md
---

# Job — `ScheduleService` → Actions

## Mapping

| Legacy `app/Services/ScheduleService.php` | Action (actual namespace) | Pattern |
|---|---|---|
| `getActives()` (+ private `getFromCache()`) | `Modules\Job\Actions\Schedule\GetActiveSchedulesAction::execute()` | `QueueableAction`, cache read via `Cache::store()->rememberForever()` |
| `clearCache()` | `Modules\Job\Actions\Schedule\ClearScheduleCacheAction::execute()` | `QueueableAction`, `Cache::store()->forget()` |

Both actions live under `app/Actions/Schedule/` (namespace `Modules\Job\Actions\Schedule`), use `Spatie\QueueableAction\QueueableAction`, and expose a single public `execute()`.

## Callers updated

- `Modules\Job\Observers\ScheduleObserver::clearCache()` → `app(\Modules\Job\Actions\Schedule\ClearScheduleCacheAction::class)->execute()`
- `Modules\Job\Console\Commands\ScheduleClearCacheCommand::handle()` → `app(\Modules\Job\Actions\Schedule\ClearScheduleCacheAction::class)->execute()` (previously dead/commented-out code)

No caller of `getActives()` existed outside the service itself; `GetActiveSchedulesAction` (in `Actions/Schedule/`) is available for future use (e.g. schedule listing/dashboard widgets).

## Tests

- `Modules/Job/tests/Unit/Actions/Schedule/ScheduleActionsTest.php` — covers both `Actions/Schedule/*` classes (the ones with real callers).

Legacy `app/Services/ScheduleService.php` and its test (`tests/Unit/Services/ScheduleServiceTest.php`) were renamed to `.bak` (never `git rm`, per repo policy) once no code referenced them.

## Unresolved duplication (root `app/Actions/`)

Two orphan classes with the same short names exist directly in `app/Actions/` (namespace `Modules\Job\Actions`, no `Schedule` sub-namespace): `GetActiveSchedulesAction.php` and `ClearScheduleCacheAction.php`. They are not used by `ScheduleObserver` or `ScheduleClearCacheCommand`, but each has its own passing test (`tests/Unit/Actions/GetActiveSchedulesActionTest.php`, `tests/Unit/Actions/ClearScheduleCacheActionTest.php`), which is why the duplication survived review. See "Duplicati orfani non risolti" in [no-services-no-support-queueable-actions.md](no-services-no-support-queueable-actions.md) for detail. Treat `Actions/Schedule/*` as the canonical pair; do not delete either side without re-checking callers first.
