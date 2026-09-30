---
title: "Epic 5.249 — Job: config dichiarate, azioni duplicate e osservabilita' queue"
type: epic
module: Job
status: active
tags:
  - bmad
  - epic
  - job
  - queue
  - config
created: 2026-09-28
updated: 2026-09-28
qmd: "job epic queue config azioni duplicate osservabilita"
related:
  - ../architecture.md
  - ../brainstorming.md
  - ../quick-reference.md
---

# Epic 5.249 — Job: config dichiarate, azioni duplicate e osservabilita' queue

> **SUMMARY** — Epic di allineamento del modulo `Job`: dichiarare le chiavi config che il
> codice gia' legge, ricondurre le Action duplicate a un solo namespace e rendere
> l'osservabilita' di queue e schedulazioni verificabile con test.

## Perche ora

Il modulo ha tre difetti verificabili:

1. `config/config.php` e `config/Config/config.php` sono `[]`, ma
   `app/Services/ScheduleService.php` e `app/Actions/GetActiveSchedulesAction.php` leggono
   `job::model`, `job::cache.enabled`, `job::cache.store`, `job::cache.key`.
2. `ClearScheduleCacheAction` e `GetActiveSchedulesAction` esistono due volte
   (`app/Actions/` e `app/Actions/Schedule/`), con contenuti identici salvo namespace.
3. `ExecuteTaskAction::execute()` lancia `BadMethodCallException`: il ciclo di esecuzione task
   non e' chiuso.

## Scope

In scope:
- dichiarare in `config/config.php` le chiavi effettivamente lette, con valori di default espliciti;
- scegliere il namespace canonico per le Action schedulazione e rimuovere l'altro (o viceversa);
- copertura Pest di `ScheduleService`, `GetActiveSchedulesAction` e `AssertAllowedArtisanCommandAction`;
- allineamento di `tests/unit/` e `tests/feature/` con `tests/Unit/` e `tests/Feature/`;
- documentare il ruolo di `app/Console/Commands/WorkerCheck.php`.

Out of scope:
- scrivere l'implementazione di `ExecuteTaskAction` (richiede story separata e gate Pest);
- introdurre dashboard nuove;
- toccare le concrete di task in altri moduli.

## Acceptance criteria

| # | AC | Verifica |
|---|----|----------|
| 1 | `job::model`, `job::cache.enabled`, `job::cache.store`, `job::cache.key` sono dichiarati in `config/config.php` | lettura config |
| 2 | Esiste una sola Action per schedulazioni cache | `grep -rn "class ClearScheduleCacheAction"` |
| 3 | `ScheduleService::getActives()` e `clearCache()` coperti da test | `tests/Unit/Services/ScheduleServiceTest.php` |
| 4 | `GetActiveSchedulesAction` coperta con cache on e cache off | `tests/Unit/Actions/GetActiveSchedulesActionTest.php` |
| 5 | Whitelist comandi coperta da test | `tests/Unit/Actions/Console/` |
| 6 | Nessuna directory di test duplicata per casing | `find tests -type d` |
| 7 | `ExecuteTaskAction` ha una story che dichiara lo scope dell'implementazione | `docs/sprint-status.yaml` |

## Rischio

Dichiarare chiavi config con default sbagliato cambia il comportamento di `ScheduleService`
in produzione: i default devono essere allineati ai valori usati oggi (cache disattivata,
modello `Schedule`) e la modifica deve passare dal gate Pest.
