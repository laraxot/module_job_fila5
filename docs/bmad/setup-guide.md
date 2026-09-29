---
<<<<<<< .merge_file_HHOtXF
title: "Job — Setup Guide"
type: note
module: Job
tags:
  - bmad
  - job
  - setup
created: 2026-09-28
updated: 2026-09-28
qmd: "job setup provider config queue worker test"
related:
  - README.md
  - quick-reference.md
---

# Job — Setup Guide

> **SUMMARY** — Come si porta il modulo `Job` in un ambiente funzionante: provider da
> registrare, chiavi config richieste dal codice, worker, cache schedulazioni e test.
> Comandi da eseguire dalla root di `laravel/`.

## 1. Registrazione provider

Dichiarati in `module.json` e `composer.json` (`extra.laravel.providers`):

- `Modules\Job\Providers\JobServiceProvider`
- `Modules\Job\Providers\Filament\AdminPanelProvider`

`composer.json` richiede `php: ^8.3` e ha repository path verso `../User`, `../Tenant`, `../Xot`.

## 2. Config: chiavi lette ma non dichiarate

`config/config.php` e `config/Config/config.php` restituiscono `[]`. Il codice del modulo
richiede pero' queste chiavi:

| Chiave | Letta in |
|--------|----------|
| `job::model` | `app/Services/ScheduleService.php`, `app/Actions/GetActiveSchedulesAction.php` |
| `job::cache.enabled` | `app/Actions/GetActiveSchedulesAction.php` |
| `job::cache.store` | `app/Services/ScheduleService.php`, `GetActiveSchedulesAction.php` |
| `job::cache.key` | `app/Services/ScheduleService.php`, `GetActiveSchedulesAction.php` |

`ScheduleService::__construct()` usa `Assert::string(...)` su `job::model`, quindi senza la
chiave il servizio fallisce all'istanza. Dichiarare le chiavi e' il primo AC di
[epics/job-queue-observability.md](epics/job-queue-observability.md).

## 3. Cache delle schedulazioni

`GetActiveSchedulesAction::execute()` usa la cache solo se `job::cache.enabled` e' vero;
in caso contrario interroga `$this->model->active()->get()`.
`ScheduleService::clearCache()` e `ScheduleObserver` invalidano la cache a ogni evento del
modello `Schedule`.

## 4. Comandi console

| Comando | Path |
|---------|------|
| Esecuzione job di prova | `app/Console/Commands/TestJobCommand.php` |
| Esecuzione via PHPUnit | `app/Console/Commands/PhpUnitTestJobCommand.php` |
| Svuoto cache schedulazioni | `app/Console/Commands/ScheduleClearCacheCommand.php` |
| Verifica worker | `app/Console/Commands/WorkerCheck.php` |

I comandi eseguibili dal pannello passano da
`app/Actions/Console/AssertAllowedArtisanCommandAction.php`: la whitelist e' esplicita.

## 5. Osservabilita' dal pannello

- `app/Filament/Pages/JobMonitor.php`, `app/Filament/Pages/JobStatus.php`
- `app/Filament/Resources/JobResource/Widgets/JobStatsOverview.php`,
  `app/Filament/Resources/JobManagerResource/Widgets/JobStatsOverview.php`,
  `app/Filament/Resources/JobsWaitingResource/Widgets/JobsWaitingOverview.php`
- `app/Filament/Widgets/QueueListenWidget.php`, `app/Filament/Widgets/ClockWidget.php`

## 6. Stato noto

`app/Actions/ExecuteTaskAction.php::execute()` lancia `BadMethodCallException` con il rimando a
`ROADMAP-2026.md` (file non presente nel modulo): l'esecuzione task non e' implementata nel modulo.

## 7. Test

Da `laravel/`:

```bash
./vendor/bin/pest --filter=Job
./vendor/bin/pest Modules/Job
```

Attenzione: nel modulo coesistono `tests/Unit/` e `tests/unit/`, `tests/Feature/` e
`tests/feature/`, con file omonimi per differenza di casing. Verificare quale directory
usa il `phpunit.xml` del progetto prima di aggiungere test.

Nota di progetto: sull'host `10.100.200.15` non si lanciano test (dati sacri).
=======
title: "Job — BMAD Setup Guide"
description: "Setup e configurazione BMAD per il modulo Job"
module: "Job"
alias: "job"
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
---

# Job — BMAD Setup Guide

## Scopo

Rendere ripetibile e verificabile l'uso del BMAD Method per il modulo Job.

## Passi di Setup

```bash
# 1. Dipendenze (da laravel/)
composer install

# 2. Queue driver in .env
QUEUE_CONNECTION=database

# 3. Worker
php artisan queue:work --tries=3

# 4. Scheduler
php artisan schedule:run
php artisan schedule:clear-cache

# 5. Provider (da composer.json extra.laravel.providers)
#    Modules\Job\Providers\JobServiceProvider
#    Modules\Job\Providers\RouteServiceProvider
#    Modules\Job\Providers\Filament\AdminPanelProvider
```

Dipendenze runtime: solo PHP `^8.3`.

> **Dati sacri**: mai `migrate:fresh`, mai `--force`, mai `RefreshDatabase`.
> Solo migrate additivi. Su host `10.100.200.15` non si lanciano test Pest.

## Cosa è "BMAD" qui (Business Logic)

In questo modulo, BMAD serve a:
- **Garantire eseguibilità**: un comando schedulato che esce dal gate non parte mai
- **Supportare il code review**: ogni comando Artisan eseguibile è tracciato in `Actions/Console/`
- **Abilitare il debug**: `Result` e `FailedJob` ricostruiscono cosa è successo
- **Governare l'evoluzione**: nuovi comandi = nuova Action + nuovo widget, mai codice inline

## Best Practices (Pratiche Giuste)

- Documentare prima di implementare: PRD prima di codice
- Estendere XotBase: modelli da `BaseModel`, pivot da `BaseMorphPivot`
- Actions, non Services: logica in `Actions/` con `execute()`
- PHPStan Level max: nessun `ignoreErrors`
- Traduzioni dai file: mai label hardcoded
- Array PHP: una chiave per riga
- Tipizzare sui **contratti** (`TaskContract`), mai su classi astratte

## Bad Practices (Pratiche Sbagliate — Mai Fare)

- Mai estendere Filament direttamente
- Mai silenziare PHPStan
- Mai hardcode label
- Mai creare Services
- Mai modificare `phpstan.neon`
- Mai eseguire un comando Artisan senza passare da `AssertAllowedArtisanCommandAction`
- Mai lasciare `queue.pid` committato

## False Friends (Falsi Amici)

| Termine | Sembra Significare | In Realtà Significa |
|---|---|---|
| **Job** | Processo | Record in tabella `jobs` con stato e payload |
| **Task** | Job | Pianificazione ricorrente (frequenza + comando) |
| **JobBatch** | Lotto | Raggruppamento di job con stato aggregato |
| **DummyAction** | Codice morto | Action scheletro per estendere il pattern |
| **Service** | Servizio generico | **Vietato** in Xot — usare `Actions` |

## Struttura Directory (Canonical)

- **`app/Contracts/`**: `TaskInterface`, `TaskContract` — da preferire nelle firme
- **`app/Actions/{Command,Console,Schedule}/`**: un Action per sorgente di comando
- **`app/Enums/Status.php`**: `active` / `inactive` / `trashed`
- **`app/Console/Commands/`**: `PhpUnitTestJobCommand`, `ScheduleClearCacheCommand`,
  `TestJobCommand`, `WorkerCheck`
- **`app/Filament/`**: 9 Resource + 5 Widget (`Forms/`, `Tables/`, `Columns/`, `Fields/`)
- **`app/Models/`**: code, task, schedule, import/export + `Traits/FrontendSortable`
- **`app/Entities/`, `app/Datas/`, `app/Rules/`, `app/Observers/`**: strutture di supporto
- **`docs/bmad/`**: questa documentazione

---

*Job · BMAD Setup Guide · data 2026-09-29*
>>>>>>> .merge_file_P9C69j
