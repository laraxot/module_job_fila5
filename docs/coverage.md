---
title: "Code Coverage: Job"
module: "Job"
type: concept
tags: [coverage]
created: 2026-07-14
updated: 2026-09-07
qmd: "coverage"
related:
  - "./phpstan-fixes-archive-2.md"
  - "./stories/01.Job-phpstan-fix.story.md"
  - "./stories/4.31.constant-type-coverage-schedule.story.md"
---

## 2026-09-07 — JOB-4.31: `Schedule` constants type declarations (typeCoverage campaign)

Scope: `app/Models/Schedule.php`, `STATUS_INACTIVE`/`STATUS_ACTIVE`/`STATUS_TRASHED`
da `public const` senza tipo a `public const int`. Dettaglio completo:
`docs/stories/4.31.constant-type-coverage-schedule.story.md`.

- **PHPStan** `analyse Modules/Job --no-progress --memory-limit=-1`: 0 errori prima,
  0 errori dopo (scoped al modulo — il bucket `typeCoverage.constantTypeCoverage` e'
  una percentuale calcolata sull'intero albero `Modules/`, non visibile scoped a un
  modulo; non rieseguito su `analyse Modules` intero in questa story per il costo/la
  contesa multi-agente osservata, ma il fix e' corretto per costruzione — type
  declaration reale, non `@var`, verificato contro il pattern noto in
  `docs/chat/typecoverage-constant-wrong-var-list-string-regression.md`).
- **PHPMD** `tools/phpmd.sh Modules/Job/app text phpmd.xml`: 100 righe di output
  prima e dopo (confronto isolato con `git stash`/`git stash pop` mirato sul solo
  `app/Models/Schedule.php`), stesso identico set di violazioni preesistenti, nessuna
  nuova, nessuna sulle righe delle 3 costanti.
- **PHPInsights** `tools/phpinsights.sh analyse Modules/Job/app --no-interaction`:
  Code 84.5, Complexity 97.3, Architecture 76.5, Style 83.1 — tutte le segnalazioni su
  `Models/Schedule.php` cadono su `getArguments()`/`getOptions()` (cyclomatic
  complexity, lunghezza funzione) e `empty()` a riga 230, nessuna sulle righe 100-106
  (le 3 costanti). Debito preesistente, non regredito da questa story.
- **Pest** `XDEBUG_MODE=coverage ./vendor/bin/pest "Modules/Job/tests/" --configuration
  phpunit.xml --no-coverage`: **303 passed, 44 failed (1148 assertions)**, durata
  2947s (~49 min, quasi interamente dovuta a contesa multi-agente sullo stesso DB
  MySQL `workorder_data_test` — piu' sessioni con `pest`/`phpstan` attive in
  parallelo durante il run, confermato con `ps aux`). Le 44 failure sono state
  ispezionate una per una e sono **tutte preesistenti, indipendenti da questa
  story**:
  - `JobBatchBusinessLogicTest`/`ScheduleBusinessLogicTest` (13+9): `QueryException`
    — `SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value:
    'active' for column schedules.status` — la colonna DB e' ancora `int` ma il
    model castsa `status` a `Status::class` (enum backed string) via `casts()`:
    disallineamento schema/model preesistente, non toccato da questa story (le 3
    costanti `STATUS_*` tipizzate qui non sono piu' usate per il cast della colonna,
    solo dentro `scopeActive()`/`scopeInactive()`).
  - `JobExecuteCoverage50Test`/`JobPolicyBehaviorTest`/`JobPolicyTest`/
    `ScheduleFormCoverage100Test`/`JobScheduleFormCoverageTest` (~19): `TypeError`
    nell'helper di test condiviso `expectMethod()`
    (`tests/Unit/JobExecuteCoverage50Test.php:70`) — `Mockery\CompositeExpectation`
    ritornato invece di `Mockery\Expectation`, bug nell'helper di test, non nel
    codice applicativo.
  - `StatusTest` (2): asserzioni su chiavi di traduzione che tornano prefissate
    `fix:job::status...` invece del valore atteso — traduzioni mancanti/rotte,
    preesistente.
  - `JobModelsCoverageTest` (1): asserisce che `Task::class` usi ancora
    `HasXotFactory` — trait rimosso intenzionalmente in un commit precedente
    (`08cd299 chore(job): remove redundant use HasXotFactory on Task`, vedi memoria
    second-brain `pattern_redundant_hasxotfactory_trait_cleanup`), test non
    aggiornato di conseguenza.

  Nessuna delle 44 failure esegue o dipende dalle righe 100-106 di `Schedule.php`
  (le 3 costanti). `tests/Unit/Models/JobModelsCoverageTest.php` include comunque
  3 test verdi specifici su `Schedule Model` (`can be instantiated`, `extends
  BaseModel`, `uses strict types`) — tutti passati. Non e' stato rieseguito un run
  completo "prima" per confronto diretto (costo ~49 min con la stessa contesa, non
  ripetibile in tempi ragionevoli in questa sessione): il confronto e' fatto per
  ispezione di ogni failure, tutte riconducibili a cause indipendenti dalle 3 righe
  modificate.

## 2026-09-06 — PHPStan zero-errors pass (this session)

Scope: `app/Filament/Columns/ScheduleArguments.php`,
`app/Filament/Resources/JobManagerResource/Widgets/JobStatsOverview.php`,
`app/Filament/Resources/ScheduleResource.php`,
`app/Filament/Resources/ScheduleResource/Schemas/ScheduleForm.php`,
`app/Models/JobBatch.php`, `app/Models/Task.php`. Full detail:
`docs/stories/01.Job-phpstan-fix.story.md`.

- Targeted test files that directly cover the changed code:
  `tests/Unit/Filament/Columns/ScheduleArgumentsTest.php` — **11/11 passed** (ran
  clean, confirms `getTags()`/`formatArrayTags()`/`withValue()` behavior unchanged
  after switching to `SafeStringCastAction::cast()`).
- `tests/Feature/JobBatchBusinessLogicTest.php`, `tests/Feature/TaskBusinessLogicTest.php`,
  `tests/Unit/ScheduleFormCoverage100Test.php`, `tests/Unit/JobScheduleFormCoverageTest.php`,
  `tests/Unit/Models/JobModelsCoverageTest.php`: **could not run** — Pest bootstraps
  the whole monorepo (all Filament panels across all `Modules/*`), and
  `Modules/Platform/app/Filament/Resources/AuditLogResource.php` was mid-refactor by
  another agent for the entire session (locked via `bashscripts/lock`, `LOCKED at
  2026-09-06T22:04:52+02:00`, 23+ minutes), causing a fatal
  `Could not check compatibility between
  Modules\Platform\Filament\Resources\AuditLogResource::table(...)` on every
  full-app bootstrap attempt (reproduced twice). Not caused by, or fixable from,
  this Job-module story — flagging as an environment blocker for whoever owns
  Platform's concurrent refactor. Full-tree run for `Modules/Job/tests` (background
  PID 2140515) also never completed in this session due to the same shared-bootstrap
  contention plus general system load from the many concurrent agents active on this
  repo (dozens of other `pest`/`phpstan` processes observed running in parallel via
  `ps aux` throughout this session).
- PHPStan (`clear-result-cache` + `analyse Modules/Job`, module-scoped, not affected
  by the Platform bootstrap issue): **15 -> 0 errors**, reverified 3 times.
- No behavior change intended or expected in any of the 5 untested files: JobBatch's
  fix is a pure refactor from `$this->attributes[...]` to the model's own typed
  accessor (documented in `docs/typed-model-properties-over-raw-attributes.md` as
  runtime-equivalent); `ScheduleResource`/`ScheduleForm`'s fix
  (`->toCollection()->where()->first()`) is exactly Spatie's own documented
  replacement for the deprecated `DataCollection::where()/first()`; `Task::compileParameters()`
  and `JobStatsOverview` now delegate to the same `SafeStringCastAction`/
  `SafeEloquentCastAction` helpers already used elsewhere in this module for
  identical semantics.

# Code Coverage: Job

**Lines Coverage:** N/A (Failed to parse)
**Test Exit Code:** 2

## Output

```text
▕             }
    1119▕         }
    1120▕ 
## Status

**2026-09-06**: philosophy.md created. PHPStan analyzed (OK). Pest suite (TBD). Coverage target: +5% per module.

    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:204

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:211

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Feature\TaskFrequenciesIntegr…  BindingResolutionException   
  Target class [config] does not exist.

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1122
    1118▕             }
    1119▕         }
    1120▕ 
    1121▕         try {
  ➜ 1122▕             $reflector = new ReflectionClass($concrete);
    1123▕         } catch (ReflectionException $e) {
    1124▕             throw new BindingResolutionException("Target class [$concrete] does not exist.", 0, $e);
    1125▕         }
    1126▕

      [2m+7 vendor frames [22m
  8   Modules/Job/tests/Feature/TaskFrequenciesIntegrationTest.php:229

  ──────────────────────────────────────────────────────────────────────────────────────  
   FAILED  Modules\Job\tests\Unit\Models\BaseModelTest > b…  BindingResolutionException   
  Unresolvable dependency resolving [Parameter #0 [ <required> string $storedEventRepository ]] in class Spatie\EventSourcing\StoredEvents\EventSubscriber

  at vendor/laravel/framework/src/Illuminate/Container/Container.php:1429
    1425▕     protected function unresolvablePrimitive(ReflectionParameter $parameter)
    1426▕     {
    1427▕         $message = "Unresolvable dependency resolving [$parameter] in class {$parameter->getDeclaringClass()->getName()}";
    1428▕ 
  ➜ 1429▕         throw new BindingResolutionException($message);
    1430▕     }
    1431▕ 
    1432▕     /**
    1433▕      * Register a new before resolving callback for all types.

      [2m+15 vendor frames [22m
  16  Modules/Job/app/Models/BaseModel.php:72
  17  Modules/Job/tests/Unit/Models/BaseModelTest.php:11


  Tests:    26 failed, 11 warnings, 38 skipped, 20 passed (47 assertions)
  Duration: 9.72s


```
